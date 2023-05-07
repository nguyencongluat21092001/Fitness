<style>
    .unit-edit span {
        font-size: 19px;
    }

    .modal.show .modal-dialog {
        transform: none;
    }
</style>
<div class="modal-dialog modal-xl">
    <form id="frmAdd">
        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" id="id" value="{{isset($datas->id) ? $datas->id : ''}}">
        <div class="modal-content card">
            <div class="modal-header">
                <h5 class="modal-title">Cập nhật cổ phiếu</h5>
                <button type="button" class="btn btn-sm" data-bs-dismiss="modal" style="color: #fff;">
                    X
                </button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Mã cổ phiếu</label>
                        <input id="code_cp" name="code_cp" type="text" value="{{!empty($datas) ? $datas->code_cp : ''}}" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Sàn giao dịch</label>
                        <input id="exchange" name="exchange" type="text" value="{{!empty($datas) ? $datas->exchange : ''}}" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Nhóm nghành HĐKD</label>
                        <select class="form-control input-sm chzn-select" name="code_category" id="code_category">
                            <option value="">--Chọn nhóm ngành--</option>
                            @foreach($category as $key => $value)
                            <option @if(isset($datas->code_category) && $value->code_category == $datas->code_category) selected @endif
                                value="{{$value->code_category}}">{{$value->name_category}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Xếp hạng TA</label>
                        <input id="ratings_TA" name="ratings_TA" type="text" value="{{!empty($datas) ? $datas->ratings_TA : ''}}" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="">Nhận định Ta - Xu hướng CP</label>
                        <textarea id="identify_trend" rows="5" name="identify_trend" type="text" value="" class="form-control">{{!empty($datas) ? $datas->identify_trend : ''}}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="">Hành động</label>
                        <input id="act" name="act" type="text" value="{{!empty($datas) ? $datas->act : ''}}" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Vùng giá giao dịch</label>
                        <input id="trading_price_range" name="trading_price_range" type="text" value="{{!empty($datas) ? $datas->trading_price_range : ''}}" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Vùng giá cắt lỗ</label>
                        <input id="stop_loss_price_zone" name="stop_loss_price_zone" type="text" value="{{!empty($datas) ? $datas->stop_loss_price_zone : ''}}" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Xếp hạng FA</label>
                        <input id="ratings_FA" name="ratings_FA" type="text" value="{{!empty($datas) ? $datas->ratings_FA : ''}}" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Phân tích DN FA</label>
                        <input type="text" name="url_link" id="url_link" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="">Số thứ tự</label>
                        <input type="text" name="order" id="order" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="">Trạng thái</label>
                        <label class="form-control" style="border: none; background-color: unset; padding-left: 0"><input type="checkbox" name="status" id="status"> Hoạt động</label>
                    </div>
                    <div class="col-md-12 mt-2" align="center">
                        <button type="button" id="btn_create" class="btn btn-success"><i class="fas fa-save"></i> Lưu</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>