<?php 
use Modules\Client\Page\Notification\Models\ReadNotificationModel;
use Modules\Client\Page\Notification\Models\NotificationModel;

if(isset($_SESSION['id'])){
    $idRead = ReadNotificationModel::select('notification_id')->where('user_id', $_SESSION['id'])->get()->toArray();
    $notification = NotificationModel::select('*')->whereNotIn('id', $idRead)->get();
}

?>
<style>
    .animate {
        cursor: pointer;
        transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -webkit-transition: all 0.2s ease-in-out;
        animation: road-animates 1s linear infinite;
        -webkit-animation: swing 1s linear infinite;
        -moz-animation: swing 1s linear infinite;
        -o-animation: swing 1s linear infinite;
        transform-origin: center top;
        -moz-transform-origin: center top;
        -webkit-transform-origin: center top;
    }

    @-webkit-keyframes swing {
        0% {
            -webkit-transform: rotateZ(-5deg);
            transform: rotateZ(-5deg);
        }

        50% {
            -webkit-transform: rotateZ(5deg);
            transform: rotateZ(5deg);
        }

        100% {
            transform: rotateZ(-5deg);
            -webkit-transform: rotateZ(-5deg);
        }
    }

    @keyframes swing {
        0% {
            transform: rotateZ(-5deg);
        }

        50% {
            transform: rotateZ(5deg);
        }

        100% {
            transform: rotateZ(-5deg);
        }
    }

    @-moz-keyframes swing {
        0% {
            transform: rotate(-5deg);
        }

        50% {
            transform: rotate(5deg);
        }

        100% {
            transform: rotate(-5deg);
        }
    }
</style>
<form action="" method="POST" id="frmLoadlist_box">
    <div id="form_chat">
        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
        <span class="form-group input-group" style="align-items: center;">
            @if(isset($notification))
            <div id="alertNotifi" class="form-control alertNotifi" @if(count($notification) <= 0) hidden @endif>
                <span>Bạn có {{count($notification)}} thông báo mới</span>
            </div>
            @endif
            <div class="input-group-btn" onclick="readNotification()">
                <label class="icon" for="checkbox1" style="border-radius:50px;background:#25aa33e8;">
                    <i style="color:#ffd00f;padding:13px" id="icon-bell" class="far fa-bell fa-3x py-2 @if(isset($notification) && count($notification) > 0) animate @endif "></i>
                </label>
            </div>
            <!-- <div>
                <input hidden type="checkbox" id="checkbox1" checked />
            </div> -->
        </span>
        
        <section class="avenue-messenger " id="pDetails">
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
