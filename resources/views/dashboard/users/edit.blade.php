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
							<p for="example-text-input" class="form-control-label required">Tên</p>
							<input class="form-control" type="text" value="{{!empty($data['name'])?$data['name']:''}}" name="name" id="name" placeholder="Nhập tên người dùng..." />
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<p for="example-text-input" class="form-control-label required">Địa chỉ Email</p>
							<input class="form-control" type="email" value="{{!empty($data['email'])?$data['email']:''}}" name="email" id="email" placeholder="Nhập email..." />
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<p for="example-text-input" class="form-control-label required">Ngày sinh</p>
							<input class="form-control" type="date" value="{{!empty($data['dateBirth'])?$data['dateBirth']:''}}" name="dateBirth" id="dateBirth" placeholder="Chọn ngày sinh..." />
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<p for="example-text-input" class="form-control-label required">Số điện thoại</p>
							<input class="form-control" type="text" value="{{!empty($data['phone'])?$data['phone']:''}}" name="phone" id="phone" placeholder="Nhập số điện thoại..." />
						</div>
					</div>
					@if(!empty($data) && $_SESSION["email"] == $data['email'] || $_SESSION["role"] == 'ADMIN')
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
					<div class="col-md-6">
						<div class="form-group">
							<p for="example-text-input" class="form-control-label">Địa chỉ</p>
							<input class="form-control" type="text" value="{{!empty($data['address'])?$data['address']:''}}" name="address" id="address" placeholder="Nhập địa chỉ..." />
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<p for="example-text-input" class="form-control-label">ID nhân sự</p>
							<input class="form-control" type="text" value="{{!empty($data['id_personnel'])?$data['id_personnel']:''}}" name="id_personnel" id="id_personnel">
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
					<div class="col-md-5">
					     @if ($_SESSION['role'] == 'ADMIN')
						<input type="radio" value="ADMIN" name="role" id="role_admin" {{!empty($data['role']) && $data['role'] == 'ADMIN' ? 'checked' : ''}} />
						<label for="role_admin">Quản trị hệ thống</label> <br>
						@endif
						@if ($_SESSION['role'] == 'ADMIN' || $_SESSION['role'] == 'MANAGE')
						<input type="radio" value="MANAGE" name="role" id="role_manage" {{!empty($data['role']) && $data['role'] == 'MANAGE' ? 'checked' : ''}} />
						<label for="role_manage">Trợ lý CEO</label><br>
						@endif
						@if ($_SESSION['role'] == 'ADMIN' || $_SESSION['role'] == 'MANAGE' || $_SESSION['role'] == 'CV_ADMIN')
						<input type="radio" value="CV_ADMIN" name="role" id="role_cv_admin" {{!empty($data['role']) && $data['role'] == 'CV_ADMIN' ? 'checked' : ''}} />
						<label for="role_cv_admin">CV - Admin</label><br>
						<input type="radio" value="CV_PRO" name="role" id="role_cv_pro" {{!empty($data['role']) && $data['role'] == 'CV_PRO' ? 'checked' : ''}} />
						<label for="role_cv_pro">CV - Pro</label><br>
						<input type="radio" value="CV_BASIC" name="role" id="role_cv_basic" {{!empty($data['role']) && $data['role'] == 'CV_BASIC' ? 'checked' : ''}} />
						<label for="role_cv_basic">CV - basic</label><br>
						@endif
						@if ($_SESSION['role'] == 'ADMIN' || $_SESSION['role'] == 'MANAGE' || $_SESSION['role'] == 'CV_ADMIN' || $_SESSION['role'] == 'SALE_ADMIN')
						<input type="radio" value="SALE_ADMIN" name="role" id="role_sale_admin" {{!empty($data['role']) && $data['role'] == 'SALE_ADMIN' ? 'checked' : ''}} />
						<label for="role_sale_admin">Sale - Admin</label><br>
						<input type="radio" value="SALE_BASIC" name="role" id="role_Sale" {{!empty($data['role']) && $data['role'] == 'SALE_BASIC' ? 'checked' : ''}} />
						<label for="role_Sale">Sale</label><br>
						@endif
						<input type="radio" value="USERS" name="role" id="role_Users" {{!empty($data['role']) && $data['role'] == 'USERS' ? 'checked' : ''}} />
						<label for="role_Users">Người dùng</label><br>
					</div>
					<div class="col-md-4">
						<label for="">Trạng thái</label><br>
						<input type="checkbox" id="status" name="status" {{isset($data['status']) && $data['status'] == 1 ? 'checked' : ''}}>
						<label for="status">Hoạt động</label>
					</div>
					<div class="modal-body">
						<div>
							<label>Chọn ảnh đại diện</label><br>
							<label for="avatar" class="label-upload">Chọn ảnh</label>
							<input hidden type="file" name="avatar" id="avatar" onchange="readURL(this)"><br>
							@if(!empty($data['avatar']))
							<img id="show_img" src="{{url('/file-image/avatar/')}}/{{$data['avatar']}}" alt="Image" style="width:150px">
							@else
							<img id="show_img" hidden alt="Image" style="width:150px">
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
			$("#show_img").removeAttr('hidden');

			reader.readAsDataURL(input.files[0]);
		}
	}
</script>