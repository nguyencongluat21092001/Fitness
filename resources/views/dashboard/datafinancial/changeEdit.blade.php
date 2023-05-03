<style>
    .unit-edit span {
        font-size: 19px;
    }
    .modal-dialog{
        max-width:none !important
    }
    @media (min-width: 1200px)
        .modal-xl {
            --bs-modal-width: 1740px !important;
    }
    .modal.show .modal-dialog {
        padding-top:15% !important;
        transform: none;
    }
</style>
<form id="frmAdd"  role="form" action="" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" id="id" value="{{!empty($data['datas'])?$data['datas'][0]->id:''}}">
    <div class="modal-dialog modal-xl">
        <div class="modal-content card"> 
            <div class="modal-header">
                <h5 class="modal-title">Cập nhật cổ phiếu</h5>
                <button type="button" class="btn btn-sm" data-bs-dismiss="modal" style="background: #f1f2f2;">
                    X
                </button>
            </div>
                <div class="card-body">
                    <table class="table  table-bordered table-striped table-condensed dataTable no-footer">
                        <thead>
                            <tr>
                                <td style="white-space: inherit;vertical-align: middle" align="center"><b>Mã CP</b></td>
                                <td style="white-space: inherit;vertical-align: middle" align="center"><b>Sàn</b></td>
                                <td style="white-space: inherit;vertical-align: middle" align="center"><b>Nhóm nghành HĐKD</b></td>
                                <td style="white-space: inherit;vertical-align: middle" align="center"><b>Xếp hạng TA</b></td>
                                <td style="white-space: inherit;vertical-align: middle" align="center"><b>Nhận định Ta - Xu hướng CP</b></td>
                                <td style="white-space: inherit;vertical-align: middle" align="center"><b>Hành động</b></td>
                                <td style="white-space: inherit;vertical-align: middle" align="center"><b>Vùng giá giao dịch</b></td>
                                <td style="white-space: inherit;vertical-align: middle" align="center"><b>Vùng giá cắt lỗ</b></td>
                                <td style="white-space: inherit;vertical-align: middle" align="center"><b>Xếp hạng FA</b></td>
                                <td style="white-space: inherit;vertical-align: middle" align="center"><b>Phân tích DN FA</b></td>
                                <td style="white-space: inherit;vertical-align: middle" align="center"><b>#</b></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td style="width:10%;vertical-align: middle;" align="center"><input id="code_cp" name="code_cp" type="text" value="{{!empty($data['datas'])?$data['datas'][0]->code_cp:''}}" class="form-control"></td>
                                <td style="width:10%;vertical-align: middle;" align="center"><input id="exchange" name="exchange" type="text" value="{{!empty($data['datas'])?$data['datas'][0]->exchange:''}}" class="form-control"></td>
                                <td style="width:12%;vertical-align: middle;" align="center"><select class="form-control input-sm chzn-select" name="code_category"
                                id="code_category">
                                <option value=''>-- Chọn nhóm ngành --</option>
                                @if(!empty($data['datas'][0]->code_category))
                                    @foreach($data['category'] as $item){
                                        <option {{!empty($data['datas'][0]->code_category == $item['code_category']) ? 'selected' :''}} value="{{$item['code_category']}}">{{$item['name_category']}}</option>
                                    }
                                    @endforeach
                                @else 
                                    @foreach($data['category'] as $item){
                                        <option value="{{$item['code_category']}}">{{$item['name_category']}}</option>
                                    }
                                    @endforeach
                                @endif 
                            </select></td>
                                <td style="width:4%;vertical-align: middle;" align="center"><input id="ratings_TA" name="ratings_TA" type="text" value="{{!empty($data['datas'])?$data['datas'][0]->ratings_TA:''}}" class="form-control"></td>
                                <td style="vertical-align: middle;" align="center"><textarea  id="identify_trend" name="identify_trend" type="text" value="" class="form-control">{{!empty($data['datas'])?$data['datas'][0]->identify_trend:''}}</textarea></td>
                                <td style="width:10%;vertical-align: middle;" align="center"><input id="act" name="act" type="text" value="{{!empty($data['datas'])?$data['datas'][0]->act:''}}" class="form-control"></td>
                                <td style="width:7%;vertical-align: middle;" align="center"><input id="trading_price_range" name="trading_price_range" type="text" value="{{!empty($data['datas'])?$data['datas'][0]->trading_price_range:''}}" class="form-control"></td>
                                <td style="width:7%;vertical-align: middle;" align="center"><input id="stop_loss_price_zone" name="stop_loss_price_zone" type="text" value="{{!empty($data['datas'])?$data['datas'][0]->stop_loss_price_zone:''}}" class="form-control"></td>
                                <td style="width:4%;vertical-align: middle;" align="center"><input id="ratings_FA" name="ratings_FA" type="text" value="{{!empty($data['datas'])?$data['datas'][0]->ratings_FA:''}}" class="form-control"></td>
                                <td style="width:4%;vertical-align: middle;" align="center"><i class="fas fa-marker"></i></td>
                                <td style="width:5%;vertical-align: middle;" align="center">
                                <p></p>
                                <button id="btn_create" type="button" class="btn btn-success" title="Xem trực tuyến"><i class="fas fa-thumbs-up"></i></button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</form>

