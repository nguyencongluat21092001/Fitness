<form id="frmAdd" role="form" action="" method="POST" enctype="multipart/form-data">
	@csrf
	<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="id" id="id" value="{{!empty($data['id'])?$data['id']:''}}">
	<div class="modal-dialog modal-lg">
		<div class="modal-content card">
			<div class="modal-header">
				<h5 class="modal-title">Nâng cấp tài khoản</h5>
				<button type="button" class="btn btn-sm" data-bs-dismiss="modal" style="background: #f1f2f2;">
					X
				</button>
			</div>
			<div class="card-body">
				<!-- <p class="text-uppercase text-sm">Thông tin cơ bản</p> -->
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
				</div>
			</div>
		</div>
	</div>
</form>
