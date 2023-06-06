<style>
    .unit-edit span {
        font-size: 19px;
    }
    body {margin:2rem;}
    td > p { overflow-y:scroll;overflow-x:hidden;} 
</style>
{{-- @php
use Modules\System\Recordtype\Helpers\WorkflowHelper;
@endphp --}}
<div class="table-responsive pmd-card pmd-z-depth ">
    <table id="table-data" class="table  table-bordered table-striped table-condensed dataTable no-footer">
        <!-- <colgroup>
            <col width="5%">
            <col width="5%">
            <col width="5%">
            <col width="5%">
            <col width="5%">
            <col width="10%">
            <col width="10%">
            <col width="5%">
            <col width="20%">
            <col width="10%">
            <col width="5%">
            <col width="5%">
            <col width="5%">
            <col width="5%">
        </colgroup> -->
        <thead>
            <tr style="background:#151f38b3">
                <td style="white-space: inherit;vertical-align: middle" align="center"><input type="checkbox" name="chk_all_item_id"
                        onclick="checkbox_all_item_id(document.forms[0].chk_item_id);"></td>
                <td style="white-space: inherit;vertical-align: middle" align="center"><b>STT</b></td>
                <td style="white-space: inherit;vertical-align: middle" align="center"><b>Mã CP</b></td>
                <td style="white-space: inherit;vertical-align: middle" align="center"><b>Sàn</b></td>
                <td style="white-space: inherit;vertical-align: middle" align="center"><b>Nhóm nghành HĐKD</b></td>
                <td style="white-space: inherit;vertical-align: middle" align="center"><b>Người đảm nhận</b></td>
                <td style="white-space: inherit;vertical-align: middle" align="center"><b>Thời gian cập nhật</b></td>
                <td style="white-space: inherit;vertical-align: middle" align="center"><b>Xếp hạng TA</b></td>
                <td style="white-space: inherit;vertical-align: middle" align="center"><b>Nhận định Ta - Xu hướng CP</b></td>
                <td style="white-space: inherit;vertical-align: middle" align="center"><b>Hành động</b></td>
                <td style="white-space: inherit;vertical-align: middle" align="center"><b>Vùng giá giao dịch</b></td>
                <td style="white-space: inherit;vertical-align: middle" align="center"><b>Vùng giá cắt lỗ</b></td>
                <td style="white-space: inherit;vertical-align: middle" align="center"><b>Xếp hạng FA</b></td>
                <td style="white-space: inherit;vertical-align: middle" align="center"><b>Phân tích DN FA</b></td>
                <td style="white-space: inherit;vertical-align: middle" align="center"><b>Thứ tự</b></td>
                <td><span onclick="JS_DataFinancial.addrow()" class="text-cursor text-primary"><i class="fas fa-plus-square"></i></span></td>
            </tr>
        </thead>
        <tbody id="body_data">
            @foreach ($datas as $key => $data)
            @php $id = $data->id; @endphp
                <tr>
                    <td style="vertical-align: middle;"align="center"><input type="checkbox" name="chk_item_id"
                            value="{{ $data->id }}"></td>
                    <td style="vertical-align: middle;" align="center">
                    {{($datas->currentPage() - 1)*$datas->perPage() + ($key + 1)}}
                    <!-- <td style="vertical-align: middle;" align="center" ondblclick="" onclick="{select_row(this);}">
                       {{$data->code_cp}}
                    </td> -->
                    <td class="td_code_cp_{{$id}}" style="vertical-align: middle;" align="center" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'code_cp')">
                       <span id="span_code_cp_{{$id}}" class="span_code_cp_{{$id}}">{{$data->code_cp}}</span>
                    </td>
                    <td class="td_exchange_{{$id}}" style="vertical-align: middle;" align="center" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'exchange')">
                       <span id="span_exchange_{{$id}}" class="span_exchange_{{$id}}">{{$data->exchange}}</span>
                    </td>
                    <td style="vertical-align: middle;" align="center" onclick="{select_row(this);}">{{!empty($data->category) ? $data->category->name_category : ''}}</td>
                    <td style="vertical-align: middle;white-space: inherit;" align="center">
                       {{$data->Users->name}}
                    </td>
                    <td style="vertical-align: middle;white-space: inherit;" align="center" onclick="{select_row(this);}">{{!empty($data->created_at) ? date('d/m/Y', strtotime($data->created_at)) : ''}}</td>
                    <td class="td_ratings_TA_{{$id}}" style="vertical-align: middle;" align="center" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'ratings_TA')">
                       <span id="span_ratings_TA_{{$id}}" class="span_ratings_TA_{{$id}}">{{$data->ratings_TA}}</span>
                    </td>
                    <td class="td_identify_trend_{{$id}}" align="center" style="vertical-align: middle;" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'identify_trend')">
                       <span id="span_identify_trend_{{$id}}" class="span_identify_trend_{{$id}}" 
                       style="display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;white-space: break-spaces;overflow:hidden;" title="{{$data->identify_trend}}">{{$data->identify_trend}}</span>
                    </td>
                    <td class="td_act_{{$id}}" style="vertical-align: middle;white-space: inherit;" align="center" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'act')">
                       <span id="span_act_{{$id}}" class="span_act_{{$id}}">{{$data->act}}</span>
                    </td>
                    <td class="td_trading_price_range_{{$id}}" style="vertical-align: middle;" align="center" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'trading_price_range')">
                       <span id="span_trading_price_range_{{$id}}" class="span_trading_price_range_{{$id}}">{{$data->trading_price_range}}</span>
                    </td>
                    <td class="td_stop_loss_price_zone_{{$id}}" style="vertical-align: middle;" align="center" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'stop_loss_price_zone')">
                       <span id="span_stop_loss_price_zone_{{$id}}" class="span_stop_loss_price_zone_{{$id}}">{{$data->stop_loss_price_zone}}</span>
                    </td>
                    <td class="td_ratings_FA_{{$id}}" style="vertical-align: middle;" align="center" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'ratings_FA')">
                       <span id="span_ratings_FA_{{$id}}" class="span_ratings_FA_{{$id}}">{{$data->ratings_FA}}</span>
                    </td>
                    <td style="vertical-align: middle;" align="center" onclick="{select_row(this);}">
                        <a href="{{$data->url_link}}" target="_blank"><i class="fas fa-link"></i></a>
                    </td>
                    <td class="text-center td_order_{{$id}}" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'order')">
                        <span id="span_order_{{$id}}" class="span_order_{{$id}}">{{ $data->order }}</span>
                    </td>
                    <td class="text-center" style="vertical-align: middle;">
                        <span class="text-cursor text-warning" onclick="JS_DataFinancial.edit('{{$id}}')"><i class="fas fa-edit"></i></span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <tfoot>
        <tr>
            <td colspan="10">
                {{$datas->links('pagination.phantrang')}}
            </td>
        </tr>
    </tfoot>
</div>
<!-- <div class="modal" id="videomodal" role="dialog"></div> -->

<script>
function coppy(e) {
  navigator.clipboard.writeText(e);
  // Alert the copied text
  Swal.fire({
    position: 'top-start',
    icon: 'success',
    title: 'Coppy đường dẫn thành công!',
    showConfirmButton: false,
    timer: 3000
    })
}
</script>
