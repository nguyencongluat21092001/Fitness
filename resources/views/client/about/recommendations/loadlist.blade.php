<style>
#messages {
  overflow: auto;
  bottom: 0;
  width: 100%;
  max-height: 600px;
}
</style>
    <div id="form_chat">
        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
        <div class="chat">
            <div  id="messages">
                @foreach ($datas as $key => $data)
                <div class="d-flex flex-row justify-content-start mb-4 avatarMessage">
                    <img src="../clients/img/LogoFinTop_red.png"
                        alt="avatar 1" style="width: 30px; height: 100%;">
                    @if($data->type == 'MUA')
                    <div class=" d-flex p-3 ms-3" style="border-radius: 15px; background-color: #2a3546;color:#ffd743;width:80%;font-family:auto">
                    @else
                    <div class=" d-flex p-3 ms-3" style="border-radius: 15px; background-color: #861515;color:white;width:80%;font-family:auto">
                    @endif
                       <div style="width:30%">
                        <img src="{{url('/file-image-client/blogs/2023_05_10_1353000000541828!~!image_background.png')}}"
                            alt="avatar 1" style="height: 150px;width: 250px;object-fit: cover;">
                       </div>
                       <div style="padding-left:30px">
                        <h4>{{ $data->title }}</h4>
                        <span>Giá mua: {{ $data->price_buy }}</span> <br>
                        <span>Mục tiêu: {{ $data->target }}</span> <br>
                        <span>Dừng lỗ:  {{ $data->stop_loss }}</span> <br>
                        <span>Thời gian: {{date('H:i:s d-m-Y', strtotime($data->created_at))}}</span>
                       </div>
                        
                        <!-- <p style="font-size:14px" class="small mb-0">Chào Anh/Chị, chúng tôi có thể hỗ trợ gì cho Anh/chị ạ?</p> -->
                    </div>
                </div>
                @endforeach
            </div>
            </div>
        </div>
        <div id="message-alert" class="content">
            <h4 class="m-0 p-0"><strong><i id="message-icon"></i> <span id="message-label"></span></strong></h4>
            <span id="message-infor"></span>
        </div>
    </div>

