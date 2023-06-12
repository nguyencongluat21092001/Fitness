<style>
    .unit-edit span {
        font-size: 19px;
    }

    #frmAdd .modal-dialog {
        max-width: none !important
    }

    @media (min-width: 1200px) {
        .modal-xl {
            --bs-modal-width: 1740px !important;
        }
    }

    .modal.show .modal-dialog {
        transform: none;
    }
</style>
<form id="frmAdd" role="form" action="" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" id="id" value="{{isset($datas->id)?$datas->id:''}}">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content card">
            <div class="modal-header">
                <h5 class="modal-title">Cập nhật cổ phiếu</h5>
                <button type="button" class="btn btn-sm" data-bs-dismiss="modal" style="background: #f1f2f2;">
                    X
                </button>
            </div>
            <div class="card-body">
                <table class="table  table-bordered table-striped table-condensed dataTable no-footer">
                    <colgroup>
                        <col width="7%">
                        <col width="7%">
                        <col width="7%">
                        <col width="7%">
                        <col width="7%">
                        <col width="7%">
                        <col width="7%">
                        <col width="7%">
                        <col width="7%">
                        <col width="7%">
                        <col width="7%">
                        <col width="7%">
                        <col width="7%">
                        <col width="7%">
                    </colgroup>
                    <thead>
                        <tr>
                            <td style="white-space: inherit;vertical-align: middle" align="center" class="required" rowspan="2"><b>Mã CP</b></td>
                            <td style="white-space: inherit;vertical-align: middle" align="center" class="required" rowspan="2"><b>Nhóm nghành</b></td>
                            <td style="white-space: inherit;vertical-align: middle" align="center" class="required" rowspan="2"><b>% Tài sản</b></td>
                            <td style="white-space: inherit;vertical-align: middle" align="center" class="required" rowspan="2"><b>Giá mua</b></td>
                            <td style="white-space: inherit;vertical-align: middle" align="center" colspan="3"><b>Vùng giá mục tiêu</b></td>
                            <td style="white-space: inherit;vertical-align: middle" align="center" class="required" rowspan="2"><b>Giá hiện tại</b></td>
                            <td style="white-space: inherit;vertical-align: middle" align="center" class="required" rowspan="2"><b>Lãi/Lỗ</b></td>
                            <td style="white-space: inherit;vertical-align: middle" align="center" class="required" rowspan="2"><b>Khuyến nghị hành động</b></td>
                            <td style="white-space: inherit;vertical-align: middle" align="center" class="required" rowspan="2"><b>Dừng lỗ</b></td>
                            <td style="white-space: inherit;vertical-align: middle" align="center" class="required" rowspan="2"><b>% Chốt</b></td>
                            <td style="white-space: inherit;vertical-align: middle" align="center" rowspan="2"><b>Ghi chú</b></td>
                            <td style="white-space: inherit;vertical-align: middle" align="center" rowspan="2"><b>#</b></td>
                        </tr>
                        <tr>
                            <td style="white-space: inherit;vertical-align: middle" align="center" class="required"><b>Tar 1</b></td>
                            <td style="white-space: inherit;vertical-align: middle" align="center"><b>Tar 2</b></td>
                            <td style="white-space: inherit;vertical-align: middle" align="center"><b>Tar 3</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $price_range = isset($datas) ? explode(',', trim($datas->price_range, ',')) : '';
                        @endphp
                        <tr>
                            <td style="vertical-align: middle;" align="center"><input id="code_cp" name="code_cp" type="text" value="{{isset($datas->code_cp)?$datas->code_cp:''}}" class="form-control"></td>
                            <td style="vertical-align: middle;">
                                <select class="form-control input-sm chzn-select" name="code_category" id="code_category">
                                    <option value="">--Chọn nhóm ngành--</option>
                                    @foreach($category as $key => $value)
                                    <option @if(isset($datas->code_category) && $value->code_category == $datas->code_category) selected @endif
                                        value="{{$value->code_category}}">{{$value->name_category}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td style="vertical-align: middle;" align="center"><input id="percent_of_assets" name="percent_of_assets" type="text" value="{{isset($datas->percent_of_assets)?$datas->percent_of_assets:''}}" class="form-control"></td>
                            <td style="vertical-align: middle;" align="center"><input id="price" name="price" type="text" value="{{isset($datas->price)?$datas->price:''}}" class="form-control"></td>
                            @for($i = 0; $i < 3; $i++)
                            <td style="vertical-align: middle;" align="center"><input id="price_range_{{$i}}" name="price_range_{{$i}}" type="text" value="{{ isset($price_range[$i]) ? $price_range[$i] : '' }}" class="form-control"></td>
                            @endfor
                            <td style="vertical-align: middle;" align="center"><input id="current_price" name="current_price" type="text" value="{{isset($datas->current_price)?$datas->current_price:''}}" class="form-control"></td>
                            <td style="vertical-align: middle;" align="center"><input id="profit_and_loss" name="profit_and_loss" type="text" value="{{isset($datas->profit_and_loss)?$datas->profit_and_loss:''}}" class="form-control"></td>
                            <td style="vertical-align: middle;" align="center"><input id="act" name="act" type="text" value="{{isset($datas->act)?$datas->act:''}}" class="form-control"></td>
                            <td style="vertical-align: middle;" align="center"><input id="stop_loss" name="stop_loss" type="text" value="{{isset($datas->stop_loss)?$datas->stop_loss:''}}" class="form-control"></td>
                            <td style="vertical-align: middle;" align="center"><input id="closing_percentage" name="closing_percentage" type="text" value="{{isset($datas->closing_percentage)?$datas->closing_percentage:''}}" class="form-control"></td>
                            <td style="vertical-align: middle;" align="center"><input id="note" name="note" type="text" value="{{isset($datas->note)?$datas->note:''}}" class="form-control"></td>
                            <td style="vertical-align: middle;" align="center">
                                <p></p>
                                <button id="btn_create" type="button" class="btn btn-success" title="Xem trực tuyến"><i class="fas fa-thumbs-up"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</form>