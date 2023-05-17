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
                <div class="d-flex flex-row justify-content-start mb-4 avatarMessage">
                    <img src="../clients/img/LogoFinTop_red.png"
                        alt="avatar 1" style="width: 30px; height: 100%;">
                    <div class=" d-flex p-3 ms-3" style="border-radius: 15px; background-color: #e1ebe6;width:80%;font-family:auto">
                       <div style="width:30%">
                        <img src="{{url('/file-image-client/blogs/2023_05_10_1353000000541828!~!image_background.png')}}"
                            alt="avatar 1" style="height: 150px;width: 250px;object-fit: cover;">
                       </div>
                       <div style="padding-left:30px">
                        <h4>MUA XXX 20% NAV (tài sản)</h4>
                        <p>Giá mua: 56.2 - 57.</p>
                        <p>Mục tiêu: 60 - 62 - 64</p>
                        <p>Dừng lỗ:  54</p>
                       </div>
                        
                        <!-- <p style="font-size:14px" class="small mb-0">Chào Anh/Chị, chúng tôi có thể hỗ trợ gì cho Anh/chị ạ?</p> -->
                    </div>
                </div>
                <div class="d-flex flex-row justify-content-start mb-4 avatarMessage">
                    <img src="../clients/img/LogoFinTop_red.png"
                        alt="avatar 1" style="width: 30px; height: 100%;">
                    <div class=" d-flex p-3 ms-3" style="border-radius: 15px; background-color: #e1ebe6;width:80%;font-family:auto">
                       <div style="width:30%">
                        <img src="{{url('/file-image-client/blogs/2023_05_10_1353000000541828!~!image_background.png')}}"
                            alt="avatar 1" style="height: 150px;width: 250px;object-fit: cover;">
                       </div>
                       <div style="padding-left:30px">
                        <h4>MUA XXX 20% NAV (tài sản)</h4>
                        <p>Giá mua: 56.2 - 57.</p>
                        <p>Mục tiêu: 60 - 62 - 64</p>
                        <p>Dừng lỗ:  54</p>
                       </div>
                        
                        <!-- <p style="font-size:14px" class="small mb-0">Chào Anh/Chị, chúng tôi có thể hỗ trợ gì cho Anh/chị ạ?</p> -->
                    </div>
                </div>
                <div class="d-flex flex-row justify-content-start mb-4 avatarMessage">
                    <img src="../clients/img/LogoFinTop_red.png"
                        alt="avatar 1" style="width: 30px; height: 100%;">
                    <div class=" d-flex p-3 ms-3" style="border-radius: 15px; background-color: #e1ebe6;width:80%;font-family:auto">
                       <div style="width:30%">
                        <img src="{{url('/file-image-client/blogs/2023_05_10_1353000000541828!~!image_background.png')}}"
                            alt="avatar 1" style="height: 150px;width: 250px;object-fit: cover;">
                       </div>
                       <div style="padding-left:30px">
                        <h4>MUA XXX 20% NAV (tài sản)</h4>
                        <p>Giá mua: 56.2 - 57.</p>
                        <p>Mục tiêu: 60 - 62 - 64</p>
                        <p>Dừng lỗ:  54</p>
                       </div>
                        
                        <!-- <p style="font-size:14px" class="small mb-0">Chào Anh/Chị, chúng tôi có thể hỗ trợ gì cho Anh/chị ạ?</p> -->
                    </div>
                </div>
                <div class="d-flex flex-row justify-content-start mb-4 avatarMessage">
                    <img src="../clients/img/LogoFinTop_red.png"
                        alt="avatar 1" style="width: 30px; height: 100%;">
                    <div class=" d-flex p-3 ms-3" style="border-radius: 15px; background-color: #e1ebe6;width:80%;font-family:auto">
                       <div style="width:30%">
                        <img src="{{url('/file-image-client/blogs/2023_05_10_1353000000541828!~!image_background.png')}}"
                            alt="avatar 1" style="height: 150px;width: 250px;object-fit: cover;">
                       </div>
                       <div style="padding-left:30px">
                        <h4>MUA XXX 20% NAV (tài sản)</h4>
                        <p>Giá mua: 56.2 - 57.</p>
                        <p>Mục tiêu: 60 - 62 - 64</p>
                        <p>Dừng lỗ:  54</p>
                       </div>
                        
                        <!-- <p style="font-size:14px" class="small mb-0">Chào Anh/Chị, chúng tôi có thể hỗ trợ gì cho Anh/chị ạ?</p> -->
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div id="message-alert" class="content">
            <h4 class="m-0 p-0"><strong><i id="message-icon"></i> <span id="message-label"></span></strong></h4>
            <span id="message-infor"></span>
        </div>
    </div>

