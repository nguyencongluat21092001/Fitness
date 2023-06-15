function JS_Register(baseUrl, module, controller) {
    this.module = module;
    this.baseUrl = baseUrl;
    this.controller = controller;
    this.urlPath = baseUrl + '/' + module + '/' + controller;
}

/**
 * Hàm load các sử kiện cho màn hình index
 *
 * @return void
 */
JS_Register.prototype.loadIndex = function () {
    var myClass = this;
    var oForm = 'form#frmSend_Otp';
}
/**
 * Hàm hiển thị modal
 *
 * @param oForm (tên form)
 *
 * @return void
 */
JS_Register.prototype.getFonmPhone = function (oForm) {
    var oForm = 'form#frmSend_Otp';
    var url = this.urlPath + '/view_OTP';
    var myClass = this;
    var data = 'phoneChange=' + $('#frmSend_Otp #phone').val();
    $("#show_Otp").removeClass("hidden");
}
/**
 * Hàm hiển thị modal
 *
 * @param oForm (tên form)
 *
 * @return void
 */
JS_Register.prototype.getOtp = function (oForm) {
    var oForm = 'form#frmSend_Otp';
    var url = this.urlPath + '/sent_OTP';
    var myClass = this;
    var data = $(oForm).serialize();
    $.ajax({
        url: url,
        type: "POST",
        //cache: true,
        data: data,
        success: function (arrResult) {
            if (arrResult['success'] == true) {
                Swal.fire({
                    position: 'top-end',
                    icon: 's',
                    title: arrResult.message,
                    showConfirmButton: false,
                    background:'rgb(255 238 67 / 87%)',
                    timer: 5000
                  })
          } else {
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: arrResult.message,
                showConfirmButton: false,
                timer: 5000
              })
          }

        }
    });
}
/**
 * Hàm hiển thêm mới
 *
 * @param oFormCreate (tên form)
 *
 * @return void
 */
JS_Register.prototype.store = function (oFormCreate) {
    var url = this.urlPath + '/checkLogin';
    console.log(url)

    var myClass = this;
    var data = $(oFormCreate).serialize();
    if ($("#email").val() == '') {
        var nameMessage = 'Email không được để trống!';
        var icon = 'warning';
        var color = '#f5ae67';
        this.alerMesage(nameMessage,icon,color);
        return false;
    }
    if ($("#password").val() == '') {
        var nameMessage = 'Mật khẩu không được để trống!';
        var icon = 'warning';
        var color = '#f5ae67';
        this.alerMesage(nameMessage,icon,color);
        return false;
    }
    $.ajax({
        url: url,
        type: "POST",
        //cache: true,
        data: data,
        success: function (arrResult) {
            if (arrResult['success'] == true) {
                Swal.fire({
                    position: 'top-start',
                    icon: 'success',
                    title: 'Cập nhật thành công',
                    showConfirmButton: false,
                    timer: 3000
                  })
               $('#editmodal').modal('hide');
               myClass.loadList(oFormCreate);

            } else {
                Swal.fire({
                    position: 'top-start',
                    icon: 'error',
                    title: 'Cập nhật thất bại',
                    showConfirmButton: false,
                    timer: 3000
                  })
            }
        }
    });
}
/**
 * lấy thông tin nhân viên giới thiệu
 *
 * @param oForm (tên form)
 *
 * @return void
 */
JS_Register.prototype.getUser = function (oForm) {
    var oForm = 'form#frmSend_Otp';
    var url = this.urlPath + '/getUser';
    var myClass = this;
    var data = $(oForm).serialize();
    $.ajax({
        url: url,
        type: "POST",
        //cache: true,
        data: data,
        success: function (arrResult) {
            if (arrResult['success'] == true) {
                console.log(arrResult)
                var html = '<div class="form-wrapper" id="iss"><label for="">Tên nhân viên</label><input disabled placeholder="'+ arrResult['data']['name'] + '"  type="text" class="form-control"  value="'+ arrResult['data']['name'] + '"></div>'
                console.log(html)
                // var html = '<span>Gới thiệu từ nhân viên: '+ arrResult['data']['name'] + '</span>';
                $("#iss").html(html);
                Swal.fire({
                    position: 'top-end',
                    icon: 's',
                    title: arrResult.message,
                    showConfirmButton: false,
                    // background:'#06ff00',
                    timer: 3000
                  })
          } else if (arrResult['success'] == false) {
            Swal.fire({
                position: 'top-end',
                icon: 's',
                title: arrResult.message,
                showConfirmButton: false,
                timer: 3000
              })
          }

        }
    });
}