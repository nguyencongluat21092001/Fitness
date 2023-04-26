function JS_CategoryCate(baseUrl, module, controller) {
    this.module = module;
    this.baseUrl = baseUrl;
    this.controller = controller;
    NclLib.menuActive('.link-category');
    this.urlPath = baseUrl + '/' + module + '/' + controller;//Biên public lưu tên module
}

/**
 * Hàm load các sử kiện cho màn hình index
 *
 * @return void
 */
JS_CategoryCate.prototype.loadIndex = function () {
    var myClass = this;
    // $('.chzn-select').chosen({ height: '100%', width: '100%' });
    var oForm = 'form#frmCategoryCate_index';
    var oFormCreate = 'form#frmAdd';
    myClass.loadList(oForm);

    $(oForm).find('#btn_add').click(function () {
        myClass.add(oForm);
    });
    $('form#frmAddCategory').find('#btn_create').click(function () {
        myClass.store('form#frmAddCategory');
    })
    $(oForm).find('#btn_edit').click(function () {
        myClass.edit(oForm);
    });
     // form load
     $(oForm).find('#cate').change(function () {
        var page = $(oForm).find('#limit').val();
        var perPage = $(oForm).find('#cbo_nuber_record_page').val();
        myClass.loadList(oForm, page, perPage);
    });
    $(oForm).find('#txt_search').click(function () {
        /* ENTER PRESSED*/
            var page = $(oForm).find('#limit').val();
            var perPage = $(oForm).find('#cbo_nuber_record_page').val();
            myClass.loadList(oForm, page, perPage);
            // return false;
        
    });
    // Xoa doi tuong
    $(oForm).find('#btn_delete').click(function () {
        myClass.delete(oForm)
    });
}
JS_CategoryCate.prototype.loadevent = function (oForm) {
    var myClass = this;
    $('form#frmAddCategory').find('#btn_create').click(function () {
        myClass.store('form#frmAddCategory');
    })
}
/**
 * Hàm hiển thị modal
 *
 * @param oForm (tên form)
 *
 * @return void
 */
JS_CategoryCate.prototype.add = function (oForm) {
    var url = this.urlPath + '/createFormCategory';
    var myClass = this;
    var data = $(oForm).serialize();
    $.ajax({
        url: url,
        type: "POST",
        //cache: true,
        data: data,
        success: function (arrResult) {
            $('#editmodalCategory').html(arrResult);
            $('#editmodalCategory').modal('show');
            myClass.loadevent(oForm);

        }
    });
}
/**
 * Hàm thêm mới
 *
 * @param oFormCreate (tên form)
 *
 * @return void
 */
JS_CategoryCate.prototype.store = function (oFormCreate) {
    var url = this.urlPath + '/createCategory';
    var myClass = this;
    var data = $(oFormCreate).serialize();
    if ($("#code_cate").val() == '') {
        var nameMessage = 'Danh mục không được để trống!';
        var icon = 'warning';
        var color = '#f5ae67';
        NclLib.alerMesage(nameMessage,icon,color);
        return false;
    }
    if ($("#name_category").val() == '') {
        var nameMessage = 'Tên thể loại không được để trống!';
        var icon = 'warning';
        var color = '#f5ae67';
        NclLib.alerMesage(nameMessage,icon,color);
        return false;
    }
    if ($("#code_category").val() == '') {
        var nameMessage = 'Mã thể loại không được để trống!';
        var icon = 'warning';
        var color = '#f5ae67';
        NclLib.alerMesage(nameMessage,icon,color);
        return false;
    }
    $.ajax({
        url: url,
        type: "POST",
        //cache: true,
        data: data,
        success: function (arrResult) {
            if (arrResult['success'] == true) {
                  var nameMessage = 'Cập nhật thành công!';
                  var icon = 'success';
                  var color = '#f5ae67';
                  NclLib.alerMesage(nameMessage,icon,color);
                  $('#editmodalCategory').modal('hide');
                  myClass.loadList(oFormCreate);
            } else {
                  var nameMessage = 'Cập nhật thất bại!';
                  var icon = 'error';
                  var color = '#f5ae67';
                  NclLib.alerMesage(nameMessage,icon,color);
            }
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
JS_CategoryCate.prototype.loadList = function (oForm, numberPage = 1, perPage = 15) {
    var myClass = this;
    var url = this.urlPath + '/loadListCategory';
    var data = $(oForm).serialize();
    data += '&offset=' + numberPage;
    data += '&limit=' + perPage;
    $.ajax({
        url: url,
        type: "GET",
        // cache: true,
        data: data,
        success: function (arrResult) {
            $("#table-container-category").html(arrResult);
            // phan trang
            $(oForm).find('.main_paginate .pagination a').click(function () {
                var page = $(this).attr('page');
                var perPage = $('#cbo_nuber_record_page').val();
                myClass.loadList(oForm, page, perPage);
            });
            $(oForm).find('#cbo_nuber_record_page').change(function () {
                var page = $(oForm).find('#_currentPage').val();
                var perPages = $(oForm).find('#cbo_nuber_record_page').val();
                myClass.loadList(oForm, page, perPages);
            });
            $(oForm).find('#cbo_nuber_record_page').val(perPage);
            var loadding = NclLib.successLoadding();
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
JS_CategoryCate.prototype.edit = function (oForm) {
    var url = this.urlPath + '/editCategory';
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
        var nameMessage = 'Bạn chưa chọn thể loại!';
        var icon = 'warning';
        var color = '#f5ae67';
        NclLib.alerMesage(nameMessage,icon,color);
        return false;
    }
    if (i > 1) {
        var nameMessage = 'Bạn chỉ được chọn một thể loại!';
        var icon = 'warning';
        var color = '#f5ae67';
        NclLib.alerMesage(nameMessage,icon,color);
        return false;
    }
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        success: function (arrResult) {
            $('#editmodalCategory').html(arrResult);
            $('#editmodalCategory').modal('show');
            myClass.loadevent(oForm);

        }
    });
}
// Xoa mot doi tuong
JS_CategoryCate.prototype.delete = function (oForm) {
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
        var nameMessage = 'Bạn chưa chọn thể loại để xóa!';
        var icon = 'warning';
        var color = '#f5ae67';
        NclLib.alerMesage(nameMessage,icon,color);
        return false;
    }
    var data = $(oForm).serialize();
    // var url = this.urlPath + "/recordtype/" + listitem;
    var url = this.urlPath + '/deleteCategory';
    Swal.fire({
        title: 'Bạn có chắc chắn xóa vĩnh viễn thể loại này không?',
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
                            var nameMessage = 'Xóa thành công!';
                            var icon = 'success';
                            var color = '#f5ae67';
                            NclLib.alerMesage(nameMessage,icon,color);
                            myClass.loadList(oForm);
                          }
                    } else {
                        if (result.isConfirmed) {
                            var nameMessage = 'Quá trình xóa đã xảy ra lỗi!';
                            var icon = 'error';
                            var color = '#f5ae67';
                            NclLib.alerMesage(nameMessage,icon,color);
                          }
                    }
                }
            });
        }
      })
}