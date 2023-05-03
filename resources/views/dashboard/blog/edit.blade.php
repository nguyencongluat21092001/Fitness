<form id="frmAdd"  role="form" action="" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" id="id" value="{{!empty($data['id'])?$data['id']:''}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card"> 
            <div class="modal-header">
                <h5 class="modal-title">Cập nhật bài viết</h5>
                <button type="button" class="btn btn-sm" data-bs-dismiss="modal" style="background: #f1f2f2;">
                    X
                </button>
            </div>
              <div class="card-body">
                <!-- <p class="text-uppercase text-sm">Thông tin cơ bản</p> -->
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group">
                      <p for="example-text-input" class="form-control-label">Thể loại</p>
                      <select class="form-control input-sm chzn-select" name="code_category"
                            id="code_category">
                            <option value=''>-- Chọn thể loại --</option>
                            @if(!empty($data['code_category']))
                                @foreach($data['category'] as $item){
                                    <option 
                                    {{!empty($data['code_category'] == $item['code_category']) ? 'selected' :''}}
                                    value="{{$item['code_category']}}">{{$item['name_category']}}</option>
                                }
                                @endforeach
                            @else 
                                @foreach($data['category'] as $item){
                                    <option value="{{$item['code_category']}}">{{$item['name_category']}}</option>
                                }
                                @endforeach
                            @endif
                        </select>
                    </div>
                  </div>
                  <div class="col-md-11">
                    <div class="form-group">
                      <p for="example-text-input" class="form-control-label">Tên bài viết</p>
                      <input class="form-control" type="text" value="{{!empty($data['title'])?$data['title']:''}}" name="title" id="title"
                            placeholder="Nhập tiêu đề..." />
                    </div>
                  </div>
                 
                <!-- <hr class="horizontal dark"> -->
                <!-- <p class="text-uppercase text-sm">Thông tin liên lạc</p> -->
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <p for="example-text-input" class="form-control-label">Nội dung</p>
                      <textarea class="form-control" type="text" value="" name="decision" id="decision"
                            placeholder="Nhập nội dung..." >{{!empty($data['decision'])?$data['decision']:''}}</textarea>
                    </div>
                  </div>
                </div>
                {{-- trạng thái --}}
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label required">Trạng thái</span>
                    <div class="col-md-8">
                        @if(!empty($data['status']))
                        <input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status" {{($data['status'] == '1') ? 'checked' : ''}}/>
                        <span for="is_checkbox_status">Hoạt động</span> <br>
                        @else
                        <input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/>
                        <span for="is_checkbox_status">Hoạt động</span> <br>
                        @endif
                    </div>
                </div>
                <div>
                    <input type="file" name="upload_image" id="upload_image" multiple>
                </div>
                <?php 
                            $arr = array(1,2,3,4);
                        ?>
                        <div class="row projects gx-lg-5">
                        @foreach ($arr as $key => $value)
                             <span id="uploadimage{{$value}}" style="display:none;padding-top:50px" class="col-sm-6 col-lg-6 text-decoration-none project marketing social business">
                                <div class="service-work overflow-hidden card mb-5 mx-5 mt-5 m-sm-0">
                                    <div class="card-img-top" id="image_demo{{$value}}" style="width:350px,margin-top:30px"></div>
                                </div>
                            </span>
                        @endforeach
                        </div>

                    <!-- 3 ảnh hàng trên -->
                    <!-- <div style="display:flex">
                        <?php 
                            $arr = array(1,2);
                        ?>
                        @foreach ($arr as $key => $value) 
                            <div id="uploadimage{{$value}}" style="display:none">
                                <div class="card-body">
                                    <div id="image_demo{{$value}}" style="width:350px,margin-top:30px"></div>
                                </div>
                            </div>
                        
                        @endforeach
                    </div> -->
                    <!-- 3 ảnh hàng dưới -->
                    <!-- <div style="display:flex">
                        <?php 
                            $arr = array(3,4);
                        ?>
                        @foreach ($arr as $key => $value) 
                            <div id="uploadimage{{$value}}" style="display:none">
                                <div class="card-body">
                                    <div id="image_demo{{$value}}" style="width:350px,margin-top:30px"></div>
                                </div>
                             </div>
                        @endforeach
                    </div> -->
                <div id="uploadimage">
                    <div class="card-body">
                        <!-- <div id="image_demo" style="width:350px,margin-top:30px"> -->
                            @if(!empty($data['avatar']))
                                <img  src="{{url('/file-image/avatar/')}}/{{$data['avatar']}}" alt="Image" style="height: 150px;width: 150px;object-fit: cover;">
                             @endif

                    <!-- </div> -->
                    </div>
                    <!-- <div class="card-footer text-muted">
                        <button class="crop_image">crop & upload image</button>
                    </div> -->
                </div>
                <div class="modal-footer">
                    <span id="btupdate">
                        <button id='btn_create' class="btn btn-primary btn-sm" type="button">
                            Cập nhật
                        </button>
                    </span>
                    <button type="button" class="btn btn-default btn-sm" data-bs-dismiss="modal" style="background: #f1f2f2;">
                        Đóng
                    </button>
                </div>
                        
        <!-- <div class="row projects gx-lg-5">
            <a href="work-single.html" class="col-sm-6 col-lg-4 text-decoration-none project marketing social business">
                <div class="service-work overflow-hidden card mb-5 mx-5 m-sm-0">
                    <img class="card-img-top" src="./assets/img/our-work-01.jpg" alt="...">
                    <div class="card-body">
                        <h5 class="card-title light-300 text-dark">Digital Marketing</h5>
                        <p class="card-text light-300 text-dark">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                            sed do eiusmod tempor incididunt ut labore et dolor.
                        </p>
                        <span class="text-decoration-none text-primary light-300">
                              Read more <i class='bx bxs-hand-right ms-1'></i>
                          </span>
                    </div>
                </div>
            </a>
            <a href="work-single.html" class="col-sm-6 col-lg-4 text-decoration-none project graphic social">
                <div class="service-work overflow-hidden card mx-5 mx-sm-0 mb-5">
                    <img class="card-img-top" src="./assets/img/our-work-02.jpg" alt="...">
                    <div class="card-body">
                        <h5 class="card-title light-300 text-dark">Corporate Branding</h5>
                        <p class="card-text light-300 text-dark">
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                        <span class="text-decoration-none text-primary light-300">
                              Read more <i class='bx bxs-hand-right ms-1'></i>
                          </span>
                    </div>
                </div>
            </a>
            <a href="work-single.html" class="col-sm-6 col-lg-4 text-decoration-none project marketing graphic business">
                <div class="service-work overflow-hidden card mx-5 mx-sm-0 mb-5">
                    <img class="card-img-top" src="./assets/img/our-work-03.jpg" alt="...">
                    <div class="card-body">
                        <h5 class="card-title light-300 text-dark">Leading Digital Solution</h5>
                        <p class="card-text light-300 text-dark">
                            Duis aute irure dolor in reprehenderit in voluptate velit
                            esse cillum dolore eu fugiatdolore eu fugiat nulla pariatur.
                        </p>
                        <span class="text-decoration-none text-primary light-300">
                              Read more <i class='bx bxs-hand-right ms-1'></i>
                          </span>
                    </div>
                </div>
            </a>
            <a href="work-single.html" class="col-sm-6 col-lg-4 text-decoration-none project social business">
                <div class="service-work overflow-hidden card mx-5 mx-sm-0 mb-5">
                    <img class="card-img-top" src="./assets/img/our-work-04.jpg" alt="...">
                    <div class="card-body">
                        <h5 class="card-title light-300 text-dark">Smart Applications</h5>
                        <p class="card-text light-300 text-dark">
                            Excepteur sint occaecat cupidatat non proident, sunt in
                            culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                        <span class="text-decoration-none text-primary light-300">
                              Read more <i class='bx bxs-hand-right ms-1'></i>
                          </span>
                    </div>
                </div>
            </a>
        </div> -->
                </div>
              </div>
        </div>
    </div>
</form>
<!-- <script src='../assets/js/jquery.js'></script> -->
<script src="../assets/js/croppie.js"></script>

  <!-- <script src="../assets/js/croppie.min.js"></script> -->
<script>
    $(document).ready(function(){
        $image_crop1 = $('#image_demo1').croppie({
            enableExif:true,
            viewport:{
                width:100,
                height:100,
                type:'circle'
            },
            
            boundary:{
                width:100,
                height:100
            }
        });
        $image_crop2 = $('#image_demo2').croppie({
            enableExif:true,
            viewport:{
                width:100,
                height:100,
                type:'circle'
            },
            
            boundary:{
                width:100,
                height:100
            }
        });
        $image_crop3 = $('#image_demo3').croppie({
            enableExif:true,
            viewport:{
                width:100,
                height:100,
                type:'circle'
            },
            
            boundary:{
                width:100,
                height:100
            }
        });
        $image_crop4 = $('#image_demo4').croppie({
            enableExif:true,
            viewport:{
                width:100,
                height:100,
                type:'circle'
            },
            
            boundary:{
                width:100,
                height:100
            }
        });

        $('#upload_image').on('change',function(){
            var reader = new FileReader();
            reader.onload = function (event){
                $image_crop1.croppie('bind',{
                    url:event.target.result
                })
            }
            reader.readAsDataURL(this.files[0]);
            $('#uploadimage1').show();
        });
        $('#upload_image').on('change',function(){
            var reader = new FileReader();
            reader.onload = function (event){
                $image_crop2.croppie('bind',{
                    url:event.target.result
                })
            }
            reader.readAsDataURL(this.files[1]);
            $('#uploadimage2').show();
        });
        $('#upload_image').on('change',function(){
            var reader = new FileReader();
            reader.onload = function (event){
                $image_crop3.croppie('bind',{
                    url:event.target.result
                })
            }
            reader.readAsDataURL(this.files[2]);
            $('#uploadimage3').show();
        });
        $('#upload_image').on('change',function(){
            var reader = new FileReader();
            reader.onload = function (event){
                $image_crop4.croppie('bind',{
                    url:event.target.result
                })
            }
            reader.readAsDataURL(this.files[2]);
            $('#uploadimage4').show();
        });

        // $('.crop_image').click(function(event){
        //     $image_crop.croppie('result',{
        //         type:'canvas',
        //         size:'viewport'
        //     }).then(function(response){
        //         console.log(1,$image_crop)
        //     });
        // })
    })

</script>
