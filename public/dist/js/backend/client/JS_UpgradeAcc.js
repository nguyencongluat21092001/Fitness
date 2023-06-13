function JS_UpgradeAcc(baseUrl, module, controller) {
    this.module = module;
    this.baseUrl = baseUrl;
    this.controller = controller;
    NclLib.menuActive('.link-privileges');
    this.urlPath = baseUrl + '/' + module + '/' + controller;
}
/**
 * Hàm load các sử kiện cho màn hình index
 *
 * @return void
 */
JS_UpgradeAcc.prototype.loadIndex = function () {
    var myClass = this;
    // var oForm = 'form#frmLoadlist_library';
    myClass.loadList(oForm);
    // $(oForm).find('#txt_search').click(function () {
    //     /* ENTER PRESSED*/
    //         var page = $(oForm).find('#limit').val();
    //         var perPage = $(oForm).find('#cbo_nuber_record_page').val();
    //         myClass.loadList(oForm, page, perPage);
    //         // return false;
        
    // });
}
/**
 * Load màn hình danh sách
 *
 * @param oForm (tên form)
 *
 * @return void
 */
JS_UpgradeAcc.prototype.loadList = function (oForm) {
    var myClass = this;
    var url = this.urlPath + '/loadList';
    var data = $(oForm).serialize();
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        success: function (arrResult) {
            $("#table-container-library").html(arrResult);
        }
    });
}
/**
 * Hàm hiển thị modal
 *
 * @param oForm (tên form)
 *
 * @return void
 */
JS_UpgradeAcc.prototype.seeVideo = function (id) {
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