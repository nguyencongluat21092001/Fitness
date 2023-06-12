<div class="modal-dialog modal-lg">
    <div class="modal-content card">
        <div class="modal-header">
            <h5 class="modal-title">Cập nhật tín hiệu mua</h5>
            <button type="button" class="btn btn-sm" data-bs-dismiss="modal">
                X
            </button>
        </div>
        <div class="modal-body">
            <form id="frmAdd">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_id" id="_id" value="{{!empty($datas->id) ? $datas->id : ''}}">
                <div class="row form-group">
                    <span class="col-md-3 control-label required">Tiêu đề</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{isset($datas->title) ? $datas->title : ''}}" name="title" id="title" placeholder="Nhập tiêu đề..." />
                    </div>
                </div>
                <div class="row form-group">
                    <span class="col-md-3 control-label required">Loại tín hiệu</span>
                    <div class="col-md-8">
                        <select name="type" id="type" class="form-control chzn-select">
                            <option value="">--Chọn loại--</option>
                            <option @if(isset($datas->type) && $datas->type == 'MUA') selected @endif value="MUA">Mua</option>
                            <option @if(isset($datas->type) && $datas->type == 'BAN') selected @endif value="BAN">Bán</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <span class="col-md-3 control-label required">Mục tiêu</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{isset($datas->target) ? $datas->target : ''}}" name="target" id="target" placeholder="Nhập mục tiêu..." />
                    </div>
                </div>
                <div class="row form-group">
                    <span class="col-md-3 control-label required">Dừng lỗ</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{isset($datas->stop_loss) ? $datas->stop_loss : ''}}" name="stop_loss" id="stop_loss" placeholder="Nhập dùng lỗ..." />
                    </div>
                </div>
                <div class="row form-group">
                    <span class="col-md-3 control-label required">Giá mua</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{isset($datas->price_buy) ? $datas->price_buy : ''}}" name="price_buy" id="price_buy" placeholder="Nhập giá mua..." />
                    </div>
                </div>
                <div class="row form-group">
                    <span class="col-md-3 control-label">Thứ tự</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{isset($datas->order) ? $datas->order : $order}}" name="order" id="order" placeholder="Nhập thứ tự..." />
                    </div>
                </div>
                <div class="row form-group">
                    <span class="col-md-3 control-label">Trạng thái</span>
                    <div class="col-md-8">
                        <input type="checkbox" name="status" id="status" {{isset($datas->status) && $datas->status == 1 ? 'checked' : ''}} />
                        <label for="status">Hoạt động</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <span id="btupdate">
                        <button id='btn_create' class="btn btn-primary btn-sm" type="button">
                            Cập nhật
                        </button>
                    </span>
                    <button type="button" class="btn btn-default btn-sm" data-bs-dismiss="modal">
                        Đóng
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>