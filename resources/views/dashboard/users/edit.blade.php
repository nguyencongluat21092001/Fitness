<form id="frmAdd"  role="form" action="" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" id="id" value="{{!empty($data['id'])?$data['id']:''}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card"> 
            <div class="modal-header">
                <h5 class="modal-title">Cập nhật người dùng</h5>
                <button type="button" class="btn btn-sm" data-bs-dismiss="modal" style="background: #f1f2f2;">
                    X
                </button>
            </div>
              <div class="card-body">
                <p class="text-uppercase text-sm">Thông tin cơ bản</p>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <p for="example-text-input" class="form-control-label">Tên</p>
                      <input class="form-control" type="text" value="{{!empty($data['name'])?$data['name']:''}}" name="name" id="name"
                            placeholder="Nhập tên người dùng..." />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <p for="example-text-input" class="form-control-label">Địa chỉ Email</p>
                      <input class="form-control" type="email" value="{{!empty($data['email'])?$data['email']:''}}" name="email" id="email"
                            placeholder="Nhập email..." />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <p for="example-text-input" class="form-control-label">Ngày sinh</p>
                      <input class="form-control" type="date" value="{{!empty($data['dateBirth'])?$data['dateBirth']:''}}" name="dateBirth" id="dateBirth"
                            placeholder="Chọn ngày sinh..." />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <p for="example-text-input" class="form-control-label">Số điện thoại</p>
                      <input class="form-control" type="text" value="{{!empty($data['phone'])?$data['phone']:''}}" name="phone" id="phone"
                            placeholder="Nhập số điện thoại..." />
                    </div>
                  </div>
                  @if(!empty($data) && $_SESSION["email"] == $data['email'])
                    <span id='btn_changePass'>
                        <button  class="btn btn-primary btn-sm" type="button">
                            Đổi mật khẩu
                        </button>
                    </span>
                  @elseif(empty($data))
                  <div class="col-md-6">
                    <div class="form-group">
                      <p for="example-text-input" class="form-control-label">Mật khẩu</p>
                      <input class="form-control" type="password" value="" name="password" id="password" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <p for="example-text-input" class="form-control-label">Nhập lại mật khẩu</p>
                      <input class="form-control" type="password" value="" name="password_retype" id="password_retype" />
                    </div>
                  </div>
                </div>
                @endif
                <hr class="horizontal dark">
                <p class="text-uppercase text-sm">Thông tin liên lạc</p>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <p for="example-text-input" class="form-control-label">Địa chỉ</p>
                      <input class="form-control" type="text" value="{{!empty($data['address'])?$data['address']:''}}" name="address" id="address"
                            placeholder="Nhập địa chỉ..." />
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <p for="example-text-input" class="form-control-label">Công ty</p>
                      <input class="form-control" type="text" value="{{!empty($data['company'])?$data['company']:''}}"  name="company" id="company">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <p for="example-text-input" class="form-control-label">Chức vụ</p>
                      <input class="form-control" type="text" value="{{!empty($data['position'])?$data['position']:''}}"name="position" id="position">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <p for="example-text-input" class="form-control-label">Gia nhập ngày</p>
                      <input class="form-control" type="date" value="{{!empty($data['date_join'])?$data['date_join']:''}}"name="date_join" id="date_join">
                    </div>
                  </div>
                </div>
                {{-- Quyền truy cập --}}
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label required">Quyền truy cập</span>
                    <div class="col-md-8">
                    @if(!empty($data['role']))
                        <input type="checkbox" value="ADMIN" name="is_checkbox_role" id="is_checkbox_role" {{($data['role'] == 'ADMIN') ? 'checked' : ''}}/>
                        <span for="is_checkbox_role">Quản trị hệ thống</span> <br>
                        <input type="checkbox" value="MANAGE" name="is_checkbox_role" id="is_checkbox_role" {{($data['role'] == 'MANAGE') ? 'checked' : ''}}/>
                        <span for="is_checkbox_role">Quản lý</span><br>
                        <input type="checkbox" value="STAFF" name="is_checkbox_role" id="is_checkbox_role" {{($data['role'] == 'STAFF') ? 'checked' : ''}}/>
                        <span for="is_checkbox_role">Nhân viên</span><br>
                        <input type="checkbox" value="USERS" name="is_checkbox_role" id="is_checkbox_role" {{($data['role'] == 'USERS') ? 'checked' : ''}}/>
                        <span for="is_checkbox_role">Người dùng</span><br>
                    @endif
                    @if(empty($data['role']))
                        <input type="checkbox" value="ADMIN" name="is_checkbox_role" id="is_checkbox_role"/>
                        <span for="is_checkbox_role">Quản trị hệ thống</span> <br>
                        <input type="checkbox" value="MANAGE" name="is_checkbox_role" id="is_checkbox_role"/>
                        <span for="is_checkbox_role">Quản lý</span><br>
                        <input type="checkbox" value="STAFF" name="is_checkbox_role" id="is_checkbox_role"/>
                        <span for="is_checkbox_role">Nhân viên</span><br>
                        <input type="checkbox" value="USERS" name="is_checkbox_role" id="is_checkbox_role"/>
                        <span for="is_checkbox_role">Người dùng</span><br>
                    @endif
                    </div>
                    <div class="modal-body">
                    <div>
                        <input type="file" name="upload_image" id="upload_image" multiple>
                    </div>
                </div>
                <div id="uploadimage" style="display:none">
                    <div class="card-body">
                        <div id="image_demo" style="width:350px,margin-top:30px"></div>
                        <!-- pho to crop -->
                    </div>
                    <!-- <div class="card-footer text-muted">
                        <button class="crop_image">crop & upload image</button>
                    </div> -->
                </div>
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
                </div>
              </div>
        </div>
    </div>
</form>
<!-- <script src='../assets/js/jquery.js'></script> -->
<script src="../assets/js/croppie.js"></script>
  <script src="../assets/js/croppie.min.js"></script>
<script>
    $(document).ready(function(){
        $image_crop = $('#image_demo').croppie({
            enableExif:true,
            viewport:{
                width:200,
                height:200,
                type:'circle'
            },
            
            boundary:{
                width:300,
                height:300
            }
        });

        $('#upload_image').on('change',function(){
            var reader = new FileReader();
            reader.onload = function (event){
                $image_crop.croppie('bind',{
                    url:event.target.result
                })
            }
            reader.readAsDataURL(this.files[0]);
            $('#uploadimage').show();
        });

        $('.crop_image').click(function(event){
            $image_crop.croppie('result',{
                type:'canvas',
                size:'viewport'
            }).then(function(response){
                console.log(1,$image_crop)
            });
        })
    })

</script>
