<?php 
use Modules\Client\Page\Notification\Models\ReadNotificationModel;
use Modules\Client\Page\Notification\Models\NotificationModel;

$idRead = ReadNotificationModel::select('notification_id')->where('user_id', $_SESSION['id'])->get()->toArray();
$notification = NotificationModel::select('*')->whereNotIn('id', $idRead)->get();

?>
<form action="" method="POST" id="frmLoadlist_box">
    <div id="form_chat">
        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
        <span class="form-group input-group" style="align-items: center;">
            <div id="alertNotifi" class="form-control alertNotifi" @if(count($notification) <= 0) hidden @endif>
                <span>Bạn có {{count($notification)}} thông báo mới</span>
            </div>
            <div class="input-group-btn" onclick="readNotification()">
                <label class="icon" for="checkbox1" style="border-radius:50px;background:#25aa33e8;">
                    <i style="color:#ffd00f;padding:13px" class="far fa-bell fa-3x py-2"></i>
                    <!-- <img width="90px" height="90px" style="background-color: none"
                    src="https://vcdn.subiz-cdn.com/file/fiqtarohdurccuocnccb-27.png" alt=""> -->
                </label>
            </div>
            <div>
                <input hidden type="checkbox" id="checkbox1" checked />
            </div>
        </span>
        <section class="avenue-messenger transform" id="pDetails">
            <div class="menu">
                <div class="button" style="padding-right: 15px;padding-top: 5px;">
                    <div>
                        <label for="checkbox1">
                            <i class="fa fa-window-close fa-xs" aria-hidden="true" 
                                style="color: rgb(255, 255, 255);"></i>
                        </label>
                    </div>
                    <div>
                        <input hidden type="checkbox" id="checkbox1" checked />
                    </div>
                </div>
                <!-- <div class="agent-face">
                    <div class="half">
                        <img class="agent circle"
                            src="https://vcdn.subiz-cdn.com/widget-v4/public/assets/img/default_avatar.5b74dc1.png"
                            alt="Jesse Tino">
                    </div>
                </div> -->
            </div>
            <div class="chat">
                <div class="chat-title">
                    <span style="color: #ffd2c4;font-size: 17px;letter-spacing: 1px;font-family: Trocchi, serif;">Khuyến nghị VIP</span>
                </div>
                <!-- Màn hình danh sách -->
                <div class="table-responsive">
                    <div id="table-container-box"></div>
                </div> 
            </div>
        </section>
    </div>
</form>
<script type="text/javascript" src="{{ URL::asset('dist\js\backend\client\DataFinancial\JS_Recommendations.js') }}"></script>
<script>
      var baseUrl = '{{ url('') }}';
        var JS_Recommendations = new JS_Recommendations(baseUrl, 'client', 'datafinancial');
        $(document).ready(function($) {
            JS_Recommendations.loadList_box(baseUrl);
        })
</script>
