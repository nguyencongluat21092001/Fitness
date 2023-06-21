<div class="card" style="background:#000000d6;">
    <div class="form-group" align="center">
        <div class="col-md-12 mt-4 mb-3">
            <h3 class="text-uppercase" style="font-family: Serif;color:#ffffff">Xác thực thông tin</h3>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="form-wrapper col-md-3">
                <button type="button" onclick="JS_Register.getOtp()" class="btn-primary" style="background-color: #ffae17">Lấy mã OTP</button>
            </div>
            <div class="col-md-9">
                <input placeholder="Nhập mã OTP..." id="otp" type="text" class="form-control" name="otp" value="">
            </div>
        </div>
        <div class="form-group" style="display: flex;justify-content: center;">
            <button type="button" class="btn-primary me-0 ms-0" style="background-color: slategrey" onclick="JS_Register.Tab4()">Xác nhận</button>
            <button type="button" class="btn-primary me-0 ms-0" style="background-color: slategrey" onclick="JS_Register.Tab2()">Quay lại</button>
        </div>
    </div>
</div>