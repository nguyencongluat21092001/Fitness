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
                        <col width="9%">
                        <col width="9%">
                        <col width="9%">
                        {{--<col width="9%">--}}
                        <col width="9%">
                        <col width="9%">
                        <col width="9%">
                        <col width="9%">
                        <col width="9%">
                        <col width="14%">
                        <col width="5%">
                    </colgroup>
                    <thead>
                        <tr>
                            <td style="white-space: inherit;vertical-align: middle" class="required" align="center"><b>% Chốt</b></td>
                            <td style="white-space: inherit;vertical-align: middle" class="required" align="center"><b>Mã CP</b></td>
                            <td style="white-space: inherit;vertical-align: middle" class="required" align="center"><b>Nhóm nghành</b></td>
                            {{--<td style="white-space: inherit;vertical-align: middle" class="required" align="center"><b>Ngày mua</b></td>--}}
                            <td style="white-space: inherit;vertical-align: middle" class="required" align="center"><b>% Tài sản</b></td>
                            <td style="white-space: inherit;vertical-align: middle" class="required" align="center"><b>Giá mua</b></td>
                            <td style="white-space: inherit;vertical-align: middle" class="required" align="center"><b>Ngày chốt</b></td>
                            <td style="white-space: inherit;vertical-align: middle" class="required" align="center"><b>Giá chốt</b></td>
                            <td style="white-space: inherit;vertical-align: middle" class="required" align="center"><b>Lãi/Lỗ</b></td>
                            <td style="white-space: inherit;vertical-align: middle" align="center"><b>Ghi chú</b></td>
                            <td style="white-space: inherit;vertical-align: middle" align="center"><b>#</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="vertical-align: middle;" align="center"><input id="closing_percentage" name="closing_percentage" type="text" value="{{isset($datas->closing_percentage)?$datas->closing_percentage:''}}" class="form-control"></td>
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
                            {{--<td style="vertical-align: middle;" align="center"><input id="created_at" name="created_at" type="date" value="{{isset($datas->created_at)?date('Y-m-d', strtotime($datas->created_at)):''}}" class="form-control"></td>--}}
                            <td style="vertical-align: middle;" align="center"><input id="percent_of_assets" name="percent_of_assets" type="text" value="{{isset($datas->percent_of_assets)?$datas->percent_of_assets:''}}" class="form-control"></td>
                            <td style="vertical-align: middle;" align="center"><input id="price" name="price" type="text" value="{{isset($datas->price)?$datas->price:''}}" class="form-control"></td>
                            <td style="vertical-align: middle;" align="center"><input id="date_close" name="date_close" type="date" value="{{isset($datas->date_close)?date('Y-m-d', strtotime($datas->date_close)):''}}" class="form-control"></td>
                            <td style="vertical-align: middle;" align="center"><input id="price_close" name="price_close" type="text" value="{{isset($datas->price_close)?$datas->price_close:''}}" class="form-control"></td>
                            <td style="vertical-align: middle;" align="center"><input id="profit_and_loss" name="profit_and_loss" type="text" value="{{isset($datas->profit_and_loss)?$datas->profit_and_loss:''}}" class="form-control"></td>
                            <td style="vertical-align: middle;" align="center"><input id="note" name="note" type="text" value="{{isset($datas->note)?$datas->note:''}}" class="form-control"></td>
                            <td style="vertical-align: middle;" align="center">
                                <button id="btn_create" type="button" class="btn btn-success" title="Xem trực tuyến"><i class="fas fa-thumbs-up"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</form>