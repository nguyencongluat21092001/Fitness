<form id="frmAdd" role="form" action="" method="POST" enctype="multipart/form-data">
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
							<input class="form-control" type="text" value="{{!empty($data['name'])?$data['name']:''}}" name="name" id="name" placeholder="Nhập tên người dùng..." />
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<p for="example-text-input" class="form-control-label">Địa chỉ Email</p>
							<input class="form-control" type="email" value="{{!empty($data['email'])?$data['email']:''}}" name="email" id="email" placeholder="Nhập email..." />
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<p for="example-text-input" class="form-control-label">Ngày sinh</p>
							<input class="form-control" type="date" value="{{!empty($data['dateBirth'])?$data['dateBirth']:''}}" name="dateBirth" id="dateBirth" placeholder="Chọn ngày sinh..." />
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<p for="example-text-input" class="form-control-label">Số điện thoại</p>
							<input class="form-control" type="text" value="{{!empty($data['phone'])?$data['phone']:''}}" name="phone" id="phone" placeholder="Nhập số điện thoại..." />
						</div>
					</div>
					@if(!empty($data) && $_SESSION["email"] == $data['email'])
					<span id='btn_changePass'>
						<button class="btn btn-primary btn-sm" type="button">
							Đổi mật khẩu
						</button>
					</span>
					@endif
				</div>
				<hr class="horizontal dark">
				<p class="text-uppercase text-sm">Thông tin liên lạc</p>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<p for="example-text-input" class="form-control-label">Địa chỉ</p>
							<input class="form-control" type="text" value="{{!empty($data['address'])?$data['address']:''}}" name="address" id="address" placeholder="Nhập địa chỉ..." />
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<p for="example-text-input" class="form-control-label">Công ty</p>
							<input class="form-control" type="text" value="{{!empty($data['company'])?$data['company']:''}}" name="company" id="company">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<p for="example-text-input" class="form-control-label">Chức vụ</p>
							<input class="form-control" type="text" value="{{!empty($data['position'])?$data['position']:''}}" name="position" id="position">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<p for="example-text-input" class="form-control-label">Gia nhập ngày</p>
							<input class="form-control" type="date" value="{{!empty($data['date_join'])?$data['date_join']:''}}" name="date_join" id="date_join">
						</div>
					</div>
				</div>
				{{-- Quyền truy cập --}}
				<div class="row form-group" id="div_hinhthucgiai">
					<span class="col-md-3 control-label required">Quyền truy cập</span>
					<div class="col-md-8">
						@if(!empty($data['role']))
						<input type="radio" value="ADMIN" name="is_checkbox_role" id="is_checkbox_role_admin" {{!empty($data['role']) && $data['role'] == 'ADMIN' ? 'checked' : ''}} />
						<label for="is_checkbox_role_admin">Quản trị hệ thống</label> <br>
						<input type="radio" value="MANAGE" name="is_checkbox_role" id="is_checkbox_role_manage" {{!empty($data['role']) && $data['role'] == 'MANAGE' ? 'checked' : ''}} />
						<label for="is_checkbox_role_manage">Quản lý</label><br>
						<input type="radio" value="STAFF" name="is_checkbox_role" id="is_checkbox_role_staff" {{!empty($data['role']) && $data['role'] == 'STAFF' ? 'checked' : ''}} />
						<label for="is_checkbox_role_staff">Nhân viên</label><br>
						<input type="radio" value="USERS" name="is_checkbox_role" id="is_checkbox_role_user" {{!empty($data['role']) && $data['role'] == 'USERS' ? 'checked' : ''}} />
						<label for="is_checkbox_role_user">Người dùng</label><br>
						@endif
					</div>
					<div class="modal-body">
						<div>
							<label for="avatar" class="label-upload">Chọn ảnh</label>
							<input hidden type="file" name="avatar" id="avatar" onchange="readURL(this)"><br>
							@if(!empty($data['avatar']))
							<img id="show_img" src="{{url('/file-image/avatar/')}}/{{$data['avatar']}}" alt="Image" style="width:150px">
							@endif
						</div>
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
<script src="../assets/js/croppie.js"></script>
<script src="../assets/js/croppie.min.js"></script>
<script>
	$(document).ready(function() {
		$image_crop = $('#image_demo').croppie({
			enableExif: true,
			viewport: {
				width: 200,
				height: 200,
				type: 'circle'
			},

			boundary: {
				width: 300,
				height: 300
			}
		});

		$('#upload_image').on('change', function() {
			var reader = new FileReader();
			reader.onload = function(event) {
				$image_crop.croppie('bind', {
					url: event.target.result
				})
			}
			reader.readAsDataURL(this.files[0]);
			$('#uploadimage').show();
		});

		$('.crop_image').click(function(event) {
			$image_crop.croppie('result', {
				type: 'canvas',
				size: 'viewport'
			}).then(function(response) {
				console.log(1, $image_crop)
			});
		})
	})
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
			$('#show_img').attr('src', e.target.result).width(150);
			};

			reader.readAsDataURL(input.files[0]);
		}
	}
</script>