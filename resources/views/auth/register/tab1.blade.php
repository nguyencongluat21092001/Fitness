<div class="card" style="background:#000000d6;">
    <div class="form-group" align="center">
        <div class="col-md-12 mt-4 mb-3">
            <h3 class="text-uppercase" style="font-family: Serif;color:#ffffff">Thông tin cơ bản</h3>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="form-wrapper col-md-6">
                <label for="">Họ và tên <span class="request_star">*</span></label>
                <input placeholder="Nhập tên..." id="name" type="text" class="form-control" name="name" value="">
            </div>
            <div class="form-wrapper col-md-6">
                <label for="">Ngày sinh <span class="request_star">*</span></label>
                <input id="dateBirth" type="date" class="form-control datepicker" name="dateBirth" value="">
            </div>
        </div>
        <div class="row">
            <div class="form-wrapper col-md-6">
                <label for="">Email <span class="request_star">*</span></label>
                <input placeholder="Nhập Email..." id="email" type="email" class="form-control" name="email" onchange="JS_Register.checkEmail()">
            </div>
            <div class="form-wrapper col-md-6">
                <label for="">Số điện thoại <span class="request_star">*</span></label>
                <input placeholder="Số điện thoại..." id="phone" type="phone" class="form-control" name="phone" value="">
            </div>
        </div>
        <div class="row">
            <div class="form-wrapper col-md-12">
                <label for="">Địa chỉ</label>
                <input placeholder="Nhập địa chỉ..." id="address" type="text" class="form-control" name="address" value="">
            </div>
        </div>
        <div class="row">
            <div class="form-wrapper col-md-6">
                <label for="">ID người giới thiệu</label>
                <input placeholder="Nhập ID người giới thiệu..." onchange="JS_Register.getPersonnel()" id="code_introduce" type="text" class="form-control" name="code_introduce" value="">
            </div>
            <div class="form-wrapper col-md-6">
                <label for="">Tên người giới thiệu</label>
                <input placeholder="Tên người giới thiệu" readonly id="name_personnel" type="text" class="form-control" name="name_personnel" value="">
            </div>
        </div>
        <div class="form-group">
            <button type="button" class="btn-primary" style="background-color: slategrey" onclick="JS_Register.Tab2()">Tiếp tục</button>
        </div>
    </div>
</div>