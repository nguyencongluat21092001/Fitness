<form id="frmAdd" role="form" action="" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" id="id" value="{{!empty($data['id'])?$data['id']:''}}">
    <div class="modal-dialog modal-lg">
    <div class="modal-content card">
            <div class="modal-header">
                <h5 class="modal-title">Cập nhật danh mục</h5>
                <button type="button" class="btn btn-sm" data-bs-dismiss="modal">
                    X
                </button>
            </div>
            <div class="modal-body">
                <!-- tên -->
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label required">Tên danh mục</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{!empty($data['name'])?$data['name']:''}}" name="name" id="name"
                            placeholder="Nhập tên danh mục..." />
                    </div>
                </div>
                {{-- Mã --}}
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label required">Mã danh mục</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{!empty($data['code_cate'])?$data['code_cate']:''}}" name="code_cate" id="code_cate"
                            placeholder="Nhập mã danh mục..." />
                    </div>
                </div>
                {{--  Mô tả --}}
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label required">Mô tả</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{!empty($data['decision'])?$data['decision']:''}}" name="decision" id="decision"
                            placeholder="Nhập mô tả..." />
                    </div>
                </div>
                {{-- trạng thái --}}
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label required">Trạng thái</span>
                    <div class="col-md-8">
                        @if(!empty($data['current_status']))
                        <input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status" {{($data['current_status'] == '1') ? 'checked' : ''}}/>
                        <span for="is_checkbox_status">Hoạt động</span> <br>
                        @else
                        <input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/>
                        <span for="is_checkbox_status">Hoạt động</span> <br>
                        @endif
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
            </div>
        </div>
    </div>
</form>
