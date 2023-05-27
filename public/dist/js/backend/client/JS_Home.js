function JS_Home(baseUrl, module, controller) {
    this.module = module;
    this.baseUrl = baseUrl;
    this.controller = controller;
    NclLib.menuActive('.link-home');
    this.urlPath = baseUrl + '/' + module + '/' + controller;//Biên public lưu tên module
}
JS_Home.prototype.alerMesage = function(nameMessage,icon,color){
    Swal.fire({
        position: 'top-start',
        icon: icon,
        title: nameMessage,
        color: color,
        showConfirmButton: false,
        width:'30%',
        timer: 2500
      })
}

/**
 * Hàm load màn hình index
 *
 * @return void
 */
JS_Home.prototype.loadIndex = function () {
    var myClass = this;
    var oForm = 'form#frmLoadlist_list_tap1';
    var oFormBlog = 'form#frmLoadlist_blog';
    NclLib.menuActive('.link-index');
    NclLib.menuActive_child('.link-index');

    myClass.loadListChartNen();
    //lấy 4 chỉ số đứng top
    myClass.loadListTop();
    //lấy tất cả chỉ số theo tiêu thức lọc
    myClass.loadList();
    //lấy danh sách bà viết
    myClass.loadListBlog(oFormBlog);
    //lấy chỉ số chứng khoán ngân hàng
    myClass.loadListTap1(oForm);

    
    $('form#frmAdd').find('#btn_create').click(function () {
        myClass.store('form#frmAdd');
    })
     // form load
     $('form#frmLoadlist_list').find('#type_code').change(function () {
        myClass.loadList();
    });
     // form load
     $('form#frmLoadlist_list').find('#limit').change(function () {
        myClass.loadList();
    });
     // form load
     $('form#frmLoadlist_Bank').find('#type_code').change(function () {
        myClass.loadListTap1();
    });
    // form load
    $(oFormBlog).find('#category').change(function () {
        myClass.loadListBlog(oFormBlog);
    });
    $('form#frmLoadlist_list').find('#txt_search').click(function () {
            myClass.loadList();
    });
}
JS_Home.prototype.loadevent = function (oForm) {
    var myClass = this;
    $('form#frmAdd').find('#btn_create').click(function () {
        myClass.store('form#frmAdd');
    })
}
/**
 * Load màn hình danh sách
 *
 * @param oForm (tên form)
 *
 * @return void
 */
JS_Home.prototype.loadList = function () {
    var myClass = this;
    var oForm = 'form#frmLoadlist_list';
    // var loadding = NclLib.loadding();
    var url = this.urlPath + '/loadList';
    var data = $(oForm).serialize();
    $.ajax({
        url: url,
        type: "GET",
        // cache: true,
        data: data,
        success: function (arrResult) {
            $("#table-container").html(arrResult);
            myClass.loadevent(oForm);
        }
    });
}
/**
 * Load màn hình chỉ số top
 *
 * @param oForm (tên form)
 *
 * @return void
 */
JS_Home.prototype.loadListChartNen = function () {
    var myClass = this;
    var oForm = 'form#frmLoadlist_chart_nen';
    var url = this.urlPath + '/loadListChartNen';
    var data = $(oForm).serialize();
    $.ajax({
        url: url,
        type: "GET",
        data: data,
        success: function (arrResult) {
            $("#table-container-chart_nen").html(arrResult);
            myClass.loadevent(oForm);
        }
    });
}
/**
 * Load màn hình chỉ số top
 *
 * @param oForm (tên form)
 *
 * @return void
 */
JS_Home.prototype.loadListTop = function () {
    var myClass = this;
    var oForm = 'form#frmLoadlist_list';
    var url = this.urlPath + '/loadListTop';
    $.ajax({
        url: url,
        type: "GET",
        success: function (arrResult) {
            $("#table-container-loadListTop").html(arrResult);
            myClass.loadevent(oForm);
        }
    });
}
/**
 * Load màn hình danh sách
 *
 * @param oForm (tên form)
 *
 * @return void
 */
JS_Home.prototype.loadListBlog = function (oFormBlog,numberPage = 1, perPage = 15) {
    var myClass = this;
    var url = this.urlPath + '/loadListBlog';
    var data = $(oFormBlog).serialize();
    data += '&offset=' + numberPage;
    data += '&limit=' + perPage;
    $.ajax({
        url: url,
        type: "GET",
        data: data,
        success: function (arrResult) {
            $("#table-blog-container").html(arrResult);
            $(oFormBlog).find('.main_paginate .pagination a').click(function () {
                var page = $(this).attr('page');
                var perPage = $('#cbo_nuber_record_page').val();
                myClass.loadListBlog(oFormBlog, page, perPage);
            });
            $(oFormBlog).find('#cbo_nuber_record_page').change(function () {
                var page = $(oFormBlog).find('#_currentPage').val();
                var perPages = $(oFormBlog).find('#cbo_nuber_record_page').val();
                myClass.loadListBlog(oFormBlog, page, perPages);
            });
            myClass.loadevent(oFormBlog);
        }
    });
}
/**
 * Load màn hình danh sách
 *
 * @param oForm (tên form)
 *
 * @return void
 */
JS_Home.prototype.loadListTap1 = function (oForm, numberPage = 1, perPage = 15) {
    var myClass = this;
    // var loadding = NclLib.loadding();
    var url = this.urlPath + '/loadListTap1';
    data = 'offset=' + numberPage;
    data += '&limit=' + perPage;
    var oForm = 'form#frmLoadlist_Bank'
    var data = $(oForm).serialize();
    $.ajax({
        url: url,
        type: "GET",
        // cache: true,
        data: data,
        success: function (arrResult) {
            $("#table-container-bank").html(arrResult);
            // phan trang
            $(oForm).find('.main_paginate .pagination a').click(function () {
                var page = $(this).attr('page');
                var perPage = $('#cbo_nuber_record_page').val();
                myClass.loadListTap1(oForm, page, perPage);
            });
            $(oForm).find('#cbo_nuber_record_page').change(function () {
                var page = $(oForm).find('#_currentPage').val();
                var perPages = $(oForm).find('#cbo_nuber_record_page').val();
                myClass.loadListTap1(oForm, page, perPages);
            });
            // loadding.go(100);
            myClass.loadevent(oForm);
        }
    });
}
/**
 * Hàm hiển thị modal edit
 *
 * @param oForm (tên form)
 *
 * @return void
 */
JS_Home.prototype.edit = function (oForm) {
    var url = this.urlPath + '/edit';
    var myClass = this;
    var data = $(oForm).serialize();
    var listitem = '';
    var i = 0;
    var p_chk_obj = $('#table-data').find('input[name="chk_item_id"]');
    $(p_chk_obj).each(function () {
        if ($(this).is(':checked')) {
            if (listitem !== '') {
                listitem += ',' + $(this).val();
            } else {
                listitem = $(this).val();
            }
            i++;
        }
    });
    if (listitem == '') {
        // EfyLib.alertMessage('danger', "Chưa chọn hồ sơ để chuyển xử lý");
        Swal.fire({
            position: 'top-start',
            icon: 'warning',
            title: 'Bạn chưa chọn đối tượng!',
            color: '#f5ae67',
            showConfirmButton: false,
            width:'30%',
            timer: 2500
          })
        return false;
    }
    if (i > 1) {
        Swal.fire({
            position: 'top-start',
            icon: 'warning',
            title: 'Bạn chỉ được chọn một đối tượng!',
            color: '#f5ae67',
            showConfirmButton: false,
            width:'30%',
            timer: 2500
          })
        return false;
    }
    $.ajax({
        url: url,
        type: "POST",
        //cache: true,
        data: data,
        success: function (arrResult) {
            $('#editmodal').html(arrResult);
            $('#editmodal').modal('show');
            myClass.loadevent(oForm);

        }
    });
}
// Xoa mot doi tuong
JS_Home.prototype.delete = function (oForm) {
    var myClass = this;
    var listitem = '';
    var p_chk_obj = $('#table-data').find('input[name="chk_item_id"]');
    $(p_chk_obj).each(function () {
        if ($(this).is(':checked')) {
            if (listitem !== '') {
                listitem += ',' + $(this).val();
            } else {
                listitem = $(this).val();
            }
        }
    });
    if (listitem == '') {
        Swal.fire({
            position: 'top-start',
            icon: 'warning',
            title: 'Bạn chưa chọn đối tượng để xóa!',
            color: '#f5ae67',
            showConfirmButton: false,
            width:'30%',
            timer: 2500
          })
        return false;
    }
    var data = $(oForm).serialize();
    var url = this.urlPath + '/delete';
    Swal.fire({
        title: 'Bạn có chắc chắn xóa vĩnh viễn người dùng này không?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#34bd57',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xác nhận'
      }).then((result) => {
        if(result.isConfirmed == true){
            $.ajax({
                url: url,
                type: "POST",
                dataType: 'json',
                data: {
                    _token: $('#_token').val(),
                    listitem: listitem,
                },
                success: function (arrResult) {
                    if (arrResult['success'] == true) {
                        if (result.isConfirmed) {
                            Swal.fire({
                                position: 'top-start',
                                icon: 'success',
                                title: 'Xóa thành công',
                                showConfirmButton: false,
                                timer: 3000
                              })
                              myClass.loadList(oForm);
                          }
                    } else {
                        if (result.isConfirmed) {
                            Swal.fire({
                                position: 'top-start',
                                icon: 'error',
                                title: 'Quá trình xóa đã xảy ra lỗi',
                                showConfirmButton: false,
                                timer: 3000
                              })
                          }
                    }
                }
            });
        }
      })
}