function NclLib(options = null) {

}
// loadding image index
NclLib.prototype.successLoadding = function () {
  $('#imageLoading').even().removeClass( "loader_bg_of" );
    setTimeout(() => {
       $('#imageLoading').addClass("loader_bg_of");
    }, 100)
}
// alerMesage thông báo sau khi có sự kiện
NclLib.prototype.alerMesage = function(nameMessage,icon,color){
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
NclLib.prototype.alertMessageBackend = function(type, label, message, s = 30000) {
    $.toast({
        title: label,
        content: message,
        type: type,
        delay: s,
        dismissible: true,
        positionDefaults: 'top-left'
    });
}
// add class hiển thị đang ở page nào 
NclLib.prototype.menuActive = function(nameMenu){
  $(nameMenu).addClass("active-menuClient");
}

NclLib = new NclLib();

function checkallper(obj, name) {
  if (obj.checked) {
    $('input[name="' + name + '"]').prop('checked', true);
  } else {
    $('input[name="' + name + '"]').prop('checked', false);
  }
}

var set_checked_checbox = function (obj) {
  var sValue = '';
  var oTable = $(obj).parent().parent().parent();
  // Duyet update
  oTable.find('.checkvaluemark:checked').each(function () {
    sValue += $(this).val() + ',';
  })
  var id = $(obj).attr('id-value')
  sValue = sValue.substr(0, sValue.length - 1);
  $("#" + id).val(sValue);
}