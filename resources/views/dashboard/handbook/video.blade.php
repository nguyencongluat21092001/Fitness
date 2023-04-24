<style>
    .animate-charcter
    {
    text-transform: uppercase;
    background-image: linear-gradient(
        -225deg,
        #231557 0%,
        #44107a 29%,
        #ff1361 67%,
        #231557 100%
    );
    background-size: auto auto;
    background-clip: border-box;
    background-size: 200% auto;
    color: #fff;
    background-clip: text;
    text-fill-color: transparent;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: textclip 2s linear infinite;
    display: inline-block;
    }

    @keyframes textclip {
    to {
        background-position: 200% center;
    }
}
</style>
<form id="frmVideo"  role="form" action="" method="GET" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color:#293251">
            <div class="modal-header">
                <h5 class="modal-title">{{$data['name_handbook']}}</h5>
                <button type="button" class="btn btn-sm" data-bs-dismiss="modal">
                    X
                </button>
            </div>
            @if(!empty($data['type_handbook'] == 'VIDEO'))
                <iframe height="620" src="{{$data['url_link']}}?autoplay=1&mute=1" 
                    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                    allowfullscreen>
                </iframe>
                @endif
                @if(!empty($data['type_handbook'] == 'LINK_LIEN_KET'))
            <div class="modal-body" style="padding:15px">
                <div>
                    <div class="row form-group" id="div_hinhthucgiai">
                        <label class="col-md-3 control-label required">Đường dẫn (Link) </label>
                        <div class="col-md-8 ">
                            <a href="{{$data['url_link']}}"><button type="button" class="btn btn-light" data-bs-dismiss="modal"><i class="fab fa-twitter-square"></i>
                                <div class="animate-charcter">
                                {{$data['url_link']}}
                                </div>
                            </button></a>
                        </div>
                    </div>
                </div>
                @endif
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-bs-dismiss="modal">
                        Đóng
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
