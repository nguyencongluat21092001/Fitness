function JS_Recommendations(baseUrl, module, controller) {
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
JS_Recommendations.prototype.loadIndex = function () {
    var myClass = this;
    NclLib.menuActive('.link-recommendations');
    var oForm = 'form#frmLoadlist_recommendations';
    myClass.loadList(oForm);
}
/**
 * Load màn hình danh sách
 *
 * @param oForm (tên form)
 *
 * @return void
 */
JS_Recommendations.prototype.loadList = function (oForm) {
    var myClass = this;
    var url = this.urlPath + '/loadList_recommendations';
    var data = $(oForm).serialize();
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        success: function (arrResult) {
            $("#table-container-recommendations").html(arrResult);
            $('#messages').scrollTop($('#messages')[0].scrollHeight);
          
            setTimeout(function() { 
                JS_Recommendations.loadList(oForm)
            }, 30000);
        }
    });
}