<form id="frmAdd" role="form" action="" method="POST" enctype="multipart/form-data">
	@csrf
	<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="id" id="id" value="{{!empty($data['id'])?$data['id']:''}}">
	<div class="modal-dialog modal-xl">
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
							<p for="example-text-input" class="form-control-label">Tên</p>
							<input disabled class="form-control"  type="text" name="name" value="{{isset($data->name) ? $data->name : ''}}">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<p for="example-text-input" class="form-control-label">Địa chỉ Email</p>
							<input disabled class="form-control" type="email" name="email" value="{{isset($data->email) ? $data->email : ''}}">
						</div>
					</div>
					<div class="col-md-6 pt-3">
						<div class="form-group">
							<p for="example-text-input" class="form-control-label">Ngày sinh</p>
							<input disabled class="form-control" type="date" name="dateBirth" value="{{isset($data->dateBirth) ? $data->dateBirth : ''}}">
						</div>
					</div>
					<div class="col-md-6 pt-3">
						<div class="form-group">
							<p for="example-text-input" class="form-control-label">Số điện thoại</p>
							<input disabled class="form-control" type="text" name="phone" value="{{isset($data->phone) ? $data->phone : ''}}">
						</div>
					</div>
					<div class="col-md-6 pt-3">
						<div class="form-group">
							<p for="example-text-input" class="form-control-label">Gói đăng ký</p>
							<input disabled class="form-control" type="text" name="wrap" value="VIP1">
						</div>
					</div>
					<div class="col-md-6 pt-3">
						<div class="form-group">
							<p for="example-text-input" class="form-control-label">Ngày đăng ký</p>
							<input disabled class="form-control"  name="time_register" value="{{isset($data->time_register) ? $data->time_register : ''}}">
						</div>
					</div>
					<div class="container my-4">
						<div class="row text-center">
							<div class="objective col-lg-6" >
								<div style="background:#ffe2e2;padding:15px;width:100%;height:100%;border-radius:5px">
									<div class="objective-icon m-auto py-4 mb-2 mb-sm-4 shadow-lg">
									<!-- <i class="fab fa-wpexplorer text-light fa-3x"></i> -->
									<img class="card-img " src="../clients/img/qrluatnc.jpg" alt="Card image" style="width:100%">
									</div>
									<h2 class="objective-heading h3 mb-2 mb-sm-4 light-300" style="color:">QR MOMO</h2>
									<span class="light-300" style="color:">SĐT: 0386358006</span> <br>
							        <span class="light-300" style="color:">Tên: Nguyễn Công Luật</span> <br>
								</div>
							</div>
							<div class="objective col-lg-6" >
								<div style="background:#4da29f;padding:15px;width:100%;height:100%;border-radius:5px">
									<div class="objective-icon m-auto py-4 mb-2 mb-sm-4 shadow-lg">
									<!-- <i class="fab fa-wpexplorer text-light fa-3x"></i> -->
									<img class="card-img " src="../clients/img/qrluatnc.jpg" alt="Card image" style="width:100%">
									</div>
									<h2 class="objective-heading h3 mb-2 mb-sm-4 light-300" style="color:antiquewhite">QR Ngân hàng</h2>
									<span class="light-300" style="color:antiquewhite">Ngân hàng: MB BANK</span> <br>
									<span class="light-300" style="color:antiquewhite">Stk: 5797934566666</span> <br>
									<span class="light-300" style="color:antiquewhite">Ngân hàng: Nguyễn Công Luật</span> <br>
									<span class="light-300" style="color:antiquewhite">Chi nhánh: Nam Từ Liêm</span> <br>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 pt-3">
						<div class="form-group">
							<p for="example-text-input" class="form-control-label">Ảnh giao dịch</p>
							<input class="form-control" type="file" id="file" name="file" value="">
						</div>
					</div>
					<div class="pt-5">
					<h4>Quý khách hàng đăng ký nâng cấp tài khoản thực hiện theo các bước sau:</h4>
                                <p style="background:#ffeda7;color:#000000;padding:1%;border-radius:5px" class="light-300">
									<span>Bước 1: Quét mã QR ví momo hoặc QR ngân hàng.</span> <br>
									<span>Bước 2: Ghi rõ nội dung chuyển khoản (Tên khách hàng đăng ký - Email đăng ký - Số điện thoại đăng ký) </span> <br>
									<span>Bước 3: Chụp thông màn hình giao dịch thành công.</span> <br>
									<span>Bước 4: Tải ảnh vừa chụp lên ô tải ảnh giao dịch.</span> <br>
									<span>Bước 5: Nhấn nút đăng ký cuối cùng.</span> <br>
									<span>Bước 6: Nhân viên FinTop sẽ xác nhận và gửi thông báo thành công hoặc thất bại qua Email đăng ký của bạn.</span> <br>
									<span>Bước 7: Xác nhận thành công -> Đăng xuất phần mềm -> đăng nhập lại.</span> <br>
									<span>Chúc quý khách hàng có một trải nghiệm thú vị về thị trường - cổ phiếu.</span> <br>
                                    </p>
                                </div>
				</div>
				<div class="modal-footer">
					<!-- <button id='btn_create' class="btn btn-primary btn-sm" type="button">Đăng ký</button> -->
					<div class="pricing-table-footer pt-5 pb-2">
						<a class="btn rounded-pill px-4 btn-outline-light light-300" 
						style="background:#00a313;color:#007b14;animation: lights 2s 750ms linear infinite;">Đăng ký</a>
					</div>
					<div class="rounded-pillpricing-table-footer pt-5 pb-2">
					    <button type="button" class="btn btn-default btn-sm" data-bs-dismiss="modal" style="background: #f1f2f2;">Đóng</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
