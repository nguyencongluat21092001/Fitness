function JS_Signal(baseUrl, module, controller) {
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
JS_Signal.prototype.loadIndex = function () {
    var myClass = this;
    NclLib.menuActive('.link-signal');
    NclLib.menuActive_child('.link-signal');
    var oForm = 'form#frmLoadlist_signal';
    myClass.loadList(oForm);
}
/**
 * Load màn hình danh sách
 *
 * @param oForm (tên form)
 *
 * @return void
 */
JS_Signal.prototype.loadList = function (oForm) {
    var myClass = this;
    var url = this.urlPath + '/loadList_signal';
    var data = $(oForm).serialize();
    data += '&_token=' +  $('#_token').val();
    data += '&limit=' +  5;
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        success: function (arrResult) {
            $("#table-container-signal").html(arrResult);
            // myClass.loadList(oForm);
        }
    });
}