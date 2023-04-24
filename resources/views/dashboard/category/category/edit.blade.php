<form id="frmAddCategory" role="form" action="" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" id="id" value="{{!empty($data['detail']['id'])?$data['detail']['id']:''}}">
    <div class="modal-dialog modal-lg">
    <div class="modal-content  card">
            <div class="modal-header">
                <h5 class="modal-title">Cập nhật thể loại</h5>
                <button type="button" class="btn btn-sm" data-bs-dismiss="modal">
                    X
                </button>
            </div>
            <div class="modal-body">
                <!-- Mã danh mục -->
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label required">Mã danh mục</span>
                    <div class="col-md-4">
                        <select class="form-control input-sm chzn-select" name="cate"
                            id="cate">
                            <option value=''>-- Chọn danh mục --</option>
                            @if(!empty($data['detail']['cate']))
                                @foreach($data['cate'] as $item){
                                    <option 
                                    {{!empty($data['detail']['cate'] == $item['code_cate']) ? 'selected' :''}}
                                    value="{{$item['code_cate']}}">{{$item['name']}}</option>
                                }
                                @endforeach
                            @else 
                               @foreach($data['cate'] as $item){
                                    <option value="{{$item['code_cate']}}">{{$item['name']}}</option>
                                }
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                {{-- Tên thể loại --}}
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label required">Tên thể loại</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{!empty($data['detail']['name_category'])?$data['detail']['name_category']:''}}" name="name_category" id="name_category"
                            placeholder="Nhập tên thể loại..." />
                    </div>
                </div>
                {{--  Mã thể loại --}}
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label required">Mã thể loại</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{!empty($data['detail']['code_category'])?$data['detail']['code_category']:''}}" name="code_category" id="code_category"
                            placeholder="Nhập mã thể loại..." />
                    </div>
                </div>
                {{--  Mô tả --}}
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label required">Mô tả</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{!empty($data['detail']['decision'])?$data['detail']['decision']:''}}" name="decision" id="decision"
                            placeholder="Nhập mô tả..." />
                    </div>
                </div>
                {{-- trạng thái --}}
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label required">Trạng thái</span>
                    <div class="col-md-8">
                        @if(!empty($data['detail']['current_status']))
                        <input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status" {{($data['detail']['current_status'] == '1') ? 'checked' : ''}}/>
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
