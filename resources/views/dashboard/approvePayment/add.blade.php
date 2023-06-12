<div class="modal-dialog modal-lg">
    <div class="modal-content card">
        <div class="modal-header">
            <h5 class="modal-title">Cập nhật phê duyệt thanh toán</h5>
            <button type="button" class="btn btn-sm" data-bs-dismiss="modal">
                X
            </button>
        </div>
        <div class="modal-body">
            <form id="frmAdd">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_id" id="_id" value="{{!empty($datas->id) ? $datas->id : ''}}">
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label required">Loại VIP</span>
                    <div class="col-md-8">
                        <select name="role_client" id="role_client" class="form-control chzn-select">
                            <option value="">--Chọn loại VIP--</option>
                            @foreach($roles as $role)
                            <option @if(isset($datas->role_client) && $datas->role_client == $role->code_category) selected @endif value="{{$role->code_category}}">{{$role->name_category}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label required">Khách hàng</span>
                    <div class="col-md-8">
                        <select name="user_id" id="user_id" class="form-control chzn-select">
                            <option value="">--Chọn khách hàng--</option>
                            @if(isset($users))
                            @foreach($users as $user)
                            <option @if(isset($datas->user_id) && $datas->user_id == $user->id) selected @endif 
                                    value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label">Người giới thiệu</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{isset($datas->user_id_introduce) ? $datas->user_id_introduce : ''}}" name="user_id_introduce" id="user_id_introduce" placeholder="Email hoặc Số điện thoại" />
                    </div>
                </div>
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label">Thứ tự</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{isset($datas->order) ? $datas->order : $order}}" name="order" id="order" placeholder="Nhập thứ tự" />
                    </div>
                </div>
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label">Trạng thái</span>
                    <div class="col-md-8">
                        <label for="status">
                            <input type="checkbox" name="status" id="status" {{isset($datas->status) && $datas->status == 1 ? 'checked' : ''}} /> Hoạt động
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id='btn_create' class="btn btn-primary btn-sm" type="button">
                        Cập nhật
                    </button>
                    <button type="button" class="btn btn-default btn-sm" data-bs-dismiss="modal">
                        Đóng
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>