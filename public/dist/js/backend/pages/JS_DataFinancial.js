function JS_DataFinancial(baseUrl, module, controller) {
    this.module = module;
    this.baseUrl = baseUrl;
    this.controller = controller;
    NclLib.menuActive('.link-datafinancial');
    this.urlPath = baseUrl + '/' + module + '/' + controller;
}

/**
 * Hàm load các sử kiện cho màn hình index
 *
 * @return void
 */
JS_DataFinancial.prototype.loadIndex = function () {
    var myClass = this;
    $('.chzn-select').chosen({ height: '100%', width: '100%' });
    var oForm = 'form#frmDataFinancial_index';
    var oFormCreate = 'form#frmAdd';
    myClass.loadList(oForm);

    // $(oForm).find('#btn_add').click(function () {
    //     myClass.add(oForm);
    // });
    $(oForm).find('#btn_add').click(function () {
        var id = '';
        myClass.changeUpdate(id);
    });
    $('form#frmAdd').find('#btn_create').click(function () {
        myClass.store('form#frmAdd');
    })
    
    $(oForm).find('#btn_edit').click(function () {
        myClass.edit(oForm);
    });
     // form load
     $(oForm).find('#code_category').change(function () {
        var page = $(oForm).find('#limit').val();
        var perPage = $(oForm).find('#cbo_nuber_record_page').val();
        myClass.loadList(oForm, page, perPage);
    });
     // form load
     $(oForm).find('#act').change(function () {
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
JS_DataFinancial.prototype.loadevent = function (oForm) {
    var myClass = this;
    $('form#frmAdd').find('#btn_create').click(function () {
        myClass.store('form#frmAdd');
    })
    $('form#frmVideo').find('#btn_create').click(function () {
        myClass.store('form#frmVideo');
    })
}
/**
 * Hàm hiển thị modal
 *
 * @param oForm (tên form)
 *
 * @return void
 */
JS_DataFinancial.prototype.add = function (oForm) {
    var url = this.urlPath + '/createForm';
    var myClass = this;
    var data = $(oForm).serialize();
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
/**
 * Hàm hiển thị modal sửa cp
 *
 * @param oForm (tên form)
 *
 * @return void
 */
JS_DataFinancial.prototype.changeUpdate = function (id) {
    var url = this.urlPath + '/changeUpdate';
    var oForm = 'form#frmDataFinancial_index';
    var myClass = this;
    var data = '&id='+ '';
    if(id != ''){
        var data = '&id=' + id;
    }
    $.ajax({
        url: url,
        type: "GET",
        //cache: true,
        data: data,
        success: function (arrResult) {
            $('#changeUpdateModal').html(arrResult);
            $('#changeUpdateModal').modal('show');
            myClass.loadevent(oForm);

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
JS_DataFinancial.prototype.store = function (oFormCreate) {
    var url = this.urlPath + '/create';
    var myClass = this;
    var data = $(oFormCreate).serialize();
    var oForm = 'form#frmDataFinancial_index';
    var check = myClass.checkValidate();
    if(check == false){
        return false;
    }
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        success: function (arrResult) {
            if (arrResult['success'] == true) {
                NclLib.alertMessageBackend('success', 'Thông báo', 'Cập nhật thành công');
                $('#editmodal').modal('hide');
                $('#changeUpdateModal').modal('hide');
                myClass.loadList(oForm);
                var loadding = NclLib.successLoadding();
            } else {
                NclLib.alertMessageBackend('danger', 'Lỗi', 'Cập nhật thất bại');
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
JS_DataFinancial.prototype.loadList = function (oForm, numberPage = 1, perPage = 15) {
    var myClass = this;
    // var loadding = NclLib.loadding();
    var url = this.urlPath + '/loadList';
    var data = $(oForm).serialize();
    data += '&offset=' + numberPage;
    data += '&limit=' + perPage;
    $.ajax({
        url: url,
        type: "GET",
        // cache: true,
        data: data,
        success: function (arrResult) {
            $("#table-container").html(arrResult);
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
JS_DataFinancial.prototype.edit = function (id) {
    var url = this.urlPath + '/changeUpdate';
    var myClass = this;
    var data = '_token=' + $('#frmDataFinancial_index #_token').val();
    data += '&id=' + id;
    $.ajax({
        url: url,
        type: "GET",
        //cache: true,
        data: data,
        success: function (arrResult) {
            $('#editmodal').html(arrResult);
            $('.chzn-select').chosen({ height: '100%', width: '100%' });
            $('#status').attr('checked', true);
            $('#editmodal').modal('show');
            $('form#frmAdd').find('#btn_create').click(function () {
                myClass.store('form#frmAdd');
            })
        }
    });
}
// Xoa mot doi tuong
JS_DataFinancial.prototype.delete = function (oForm) {
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
        NclLib.alertMessageBackend('warning', 'Cảnh báo', 'Bạn chưa chọn đối tượng để xóa!');
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
/**
 * Hàm hiển thị modal
 *
 * @param oForm (tên form)
 *
 * @return void
 */
JS_DataFinancial.prototype.seeVideo = function (id) {
    var url = this.urlPath + '/seeVideo';
    var myClass = this;
    var data = 'id=' + id;
    $.ajax({
        url: url,
        type: "GET",
        //cache: true,
        data: data,
        success: function (arrResult) {
            $('#videomodal').html(arrResult);
            $('#videomodal').modal('show');
        }
    });
}
/**
 * Thêm một dòng mới trên danh sách
 */
JS_DataFinancial.prototype.addrow = function() {
    var numberRow = $("#body_data tr").length;
    var id = broofa();
    var html = '';
    html += '<tr>';
    // checkbox
    html += '<td align="center"><input type="checkbox" name="chk_item_id" value="' + id + '"></td>';
    // stt
    html += '<td align="center">' + (parseInt(numberRow) + 1) + '</td>';
    // code_cp
    html += '<td class="td_code_cp_' + id + '" onclick="{select_row(this);}" ondblclick="click2(\'' + id + '\', \'code_cp\')">';
    html += '<span id="span_code_cp_' + id + '" class="span_code_cp_' + id + '"></span>';
    html += '</td>';
    // exchange
    html += '<td class="td_exchange_' + id + '" onclick="{select_row(this);}" ondblclick="click2(\'' + id + '\', \'exchange\')">';
    html += '<span id="span_exchange_' + id + '" class="span_exchange_' + id + '"></span>';
    html += '</td>';
    // code_category
    html += '<td class="td_code_category_' + id + '" onclick="{select_row(this);}" ondblclick="click2(\'' + id + '\', \'code_category\')">';
    html += '<span id="span_code_category_' + id + '" class="span_code_category_' + id + '"></span>';
    html += '</td>';
    // user_id
    html += '<td></td>';
    // created_at
    html += '<td class="td_created_at_' + id + '" onclick="{select_row(this);}" ondblclick="click2(\'' + id + '\', \'created_at\')">';
    html += '<span id="span_created_at_' + id + '" class="span_created_at_' + id + '"></span>';
    html += '</td>';
    // ratings_TA
    html += '<td class="td_ratings_TA_' + id + '" onclick="{select_row(this);}" ondblclick="click2(\'' + id + '\', \'ratings_TA\')">';
    html += '<span id="span_ratings_TA_' + id + '" class="span_ratings_TA_' + id + '"></span>';
    html += '</td>';
    // identify_trend
    html += '<td class="td_identify_trend_' + id + '" onclick="{select_row(this);}" ondblclick="click2(\'' + id + '\', \'identify_trend\')">';
    html += '<span id="span_identify_trend_' + id + '" class="span_identify_trend_' + id + '"></span>';
    html += '</td>';
    // act
    html += '<td class="td_act_' + id + '" onclick="{select_row(this);}" ondblclick="click2(\'' + id + '\', \'act\')">';
    html += '<span id="span_act_' + id + '" class="span_act_' + id + '"></span>';
    html += '</td>';
    // trading_price_range
    html += '<td class="td_trading_price_range_' + id + '" onclick="{select_row(this);}" ondblclick="click2(\'' + id + '\', \'trading_price_range\')">';
    html += '<span id="span_trading_price_range_' + id + '" class="span_trading_price_range_' + id + '"></span>';
    html += '</td>';
    // stop_loss_price_zone
    html += '<td class="td_stop_loss_price_zone_' + id + '" onclick="{select_row(this);}" ondblclick="click2(\'' + id + '\', \'stop_loss_price_zone\')">';
    html += '<span id="span_stop_loss_price_zone_' + id + '" class="span_stop_loss_price_zone_' + id + '"></span>';
    html += '</td>';
    // ratings_FA
    html += '<td class="td_ratings_FA_' + id + '" onclick="{select_row(this);}" ondblclick="click2(\'' + id + '\', \'ratings_FA\')">';
    html += '<span id="span_ratings_FA_' + id + '" class="span_ratings_FA_' + id + '"></span>';
    html += '</td>';
    // url_link
    html += '<td class="td_url_link_' + id + '" onclick="{select_row(this);}" ondblclick="click2(\'' + id + '\', \'url_link\')">';
    html += '<span id="span_url_link_' + id + '" class="span_url_link_' + id + '"></span>';
    html += '</td>';
    // status
    // html += '<td onclick="{select_row(this);}" align="center">';
    // html += '<label class="custom-control custom-checkbox p-0 m-0 pointer " style="cursor: pointer;">';
    // html += '<input type="checkbox" hidden class="custom-control-input toggle-status" id="status_' + id + '" data-id="' + id + '" checked>';
    // html += '<span class="custom-control-indicator p-0 m-0" onclick="JS_DataFinancial.changeStatus(\'' + id + '\')"></span>';
    // html += '</label></td>';
    // edit
    html += '<td align="center"><span class="text-cursor text-warning" onclick="JS_DataFinancial.edit(\'' + id + '\')"><i class="fas fa-edit"></i></span></td>';
    html += '</tr>';
    $("#body_data").append(html);
    // JS_DataFinancial.loadEvent();
}
/**
 * Tạo một id mới ngẫu nhiên
 */
function broofa() {
    return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
        var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
        return v.toString(16);
    });
}
/**
 * Sự kiện khi nhấn 2 lần vào dòng td để sửa
 */
function click2(id, type) {
    $(".td_"+type+"_" + id).removeAttr('ondblclick');
    var text = $("#span_"+type+"_" + id).html();
    $("#"+type+"_" + id).removeAttr('hidden');
    $("#span_"+type+"_" + id).html('<textarea name="'+type+'" id="'+type+'_' + id + '" rows="3">'+text+'</textarea>');
    $("#"+type+"_" + id).focus();
    $("#span_"+type+"_" + id).removeAttr('id');
    $("#"+type+"_" + id).focusout(function(){
        $(".td_"+type+"_" + id).attr('ondblclick', "click2('"+id+"', '"+type+"')");
        $("#"+type+"_" + id).attr('hidden', true);
        $(".span_"+type+"_" + id).attr('id', 'span_'+type+'_' + id);
        $(".span_"+type+"_" + id).html($("#"+type+"_" + id).val());
        if(text != $(".span_" + type + '_' + id).html()){
            JS_DataFinancial.updateDataFinancial(id, type, $(".span_" + type + '_' + id).html());
        }
    })
}
/**
 * Cập nhật khi ở màn hình hiển thị danh sách
 */
JS_DataFinancial.prototype.updateDataFinancial = function(id, column, value = '') {
    var myClass = this;
    var url = myClass.urlPath + '/updateDataFinancial';
    var data = 'id=' + id;
    data += '&_token=' + $('#frmDataFinancial_index').find('#_token').val();
    if(column == 'code_cp'){ data += '&code_cp=' + (column == 'code_cp' ? value : ""); }
    else if(column == 'exchange') {data += '&exchange=' + value}
    else if(column == 'code_category') {data += '&code_category=' + value}
    else if(column == 'ratings_TA') {data += '&ratings_TA=' + value}
    else if(column == 'identify_trend') {data += '&identify_trend=' + value}
    else if(column == 'act') {data += '&act=' + value}
    else if(column == 'trading_price_range') {data += '&trading_price_range=' + value}
    else if(column == 'stop_loss_price_zone') {data += '&stop_loss_price_zone=' + value}
    else if(column == 'ratings_FA') {data += '&ratings_FA=' + value}
    else if(column == 'url_link') {data += '&url_link=' + value}
    else if(column == 'status') {data += '&status=' + value}
    $.ajax({
        url: url,
        data: data,
        type: "POST",
        success: function (arrResult) {
            if (arrResult['success'] == true) {
                NclLib.alertMessageBackend('success', 'Thông báo', arrResult['message']);
                if(column == 'order'){
                    JS_DataFinancial.loadList();
                }
            } else {
                NclLib.alertMessageBackend('danger', 'Lỗi', arrResult['message']);
                JS_DataFinancial.loadList();
            }
        }, error: function(e){
            console.log(e);
            NclLib.successLoadding();
        }
    });
    $("#" + id).prop('readonly');
}
/**
 * Check validate
 */
JS_DataFinancial.prototype.checkValidate = function(){
    if ($("#frmAdd #code_cp").val() == '') {
        NclLib.alertMessageBackend('warning', 'Cảnh báo', 'Mã cổ phiếu không được để trống!');
        $("#frmAdd #code_cp").focus();
        return false;
    }
    if ($("#frmAdd #exchange").val() == '') {
        var nameMessage = 'Sàn không được để trống!';
        NclLib.alertMessageBackend('warning', 'Cảnh báo', nameMessage);
        $("#frmAdd #exchange").focus();
        return false;
    }
    if ($("#frmAdd #code_category option:selected").val() == '') {
        var nameMessage = 'Nhóm ngành HĐKD không được để trống!';
        NclLib.alertMessageBackend('warning', 'Cảnh báo', nameMessage);
        $("#frmAdd #code_category").focus();
        return false;
    }
    if ($("#frmAdd #ratings_TA").val() == '') {
        var nameMessage = 'Xếp hạng không được để trống!';
        NclLib.alertMessageBackend('warning', 'Cảnh báo', nameMessage);
        $("#frmAdd #ratings_TA").focus();
        return false;
    }
    if ($("#frmAdd #identify_trend").val() == '') {
        var nameMessage = 'Nhận định TA - xu hướng CP không được để trống!';
        NclLib.alertMessageBackend('warning', 'Cảnh báo', nameMessage);
        $("#frmAdd #identify_trend").focus();
        return false;
    }
    if ($("#frmAdd #act").val() == '') {
        var nameMessage = 'Hành động không được để trống!';
        NclLib.alertMessageBackend('warning', 'Cảnh báo', nameMessage);
        $("#frmAdd #act").focus();
        return false;
    }
    if ($("#frmAdd #trading_price_range").val() == '') {
        var nameMessage = 'Vùng giá giao dịch không được để trống!';
        NclLib.alertMessageBackend('warning', 'Cảnh báo', nameMessage);
        $("#frmAdd #trading_price_range").focus();
        return false;
    }
    if ($("#frmAdd #stop_loss_price_zone").val() == '') {
        var nameMessage = 'Vùng giá cắt lỗ không được để trống!';
        NclLib.alertMessageBackend('warning', 'Cảnh báo', nameMessage);
        $("#frmAdd #stop_loss_price_zone").focus();
        return false;
    }
    if ($("#frmAdd #ratings_FA").val() == '') {
        var nameMessage = 'Xếp hạng không được để trống!';
        NclLib.alertMessageBackend('warning', 'Cảnh báo', nameMessage);
        $("#frmAdd #ratings_FA").focus();
        return false;
    }
    if ($("#frmAdd #order").val() == '') {
        var nameMessage = 'Số thứ tự không được để trống!';
        NclLib.alertMessageBackend('warning', 'Cảnh báo', nameMessage);
        $("#frmAdd #order").focus();
        return false;
    }
}