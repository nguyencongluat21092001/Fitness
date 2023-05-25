<style>
    .unit-edit span {
        font-size: 19px;
    }
</style>
{{-- @php
use Modules\System\Recordtype\Helpers\WorkflowHelper;
@endphp --}}
<div class="table-responsive pmd-card pmd-z-depth ">
    <table id="table-data" class="table  table-bordered table-striped table-condensed dataTable no-footer">
        <colgroup>
            <col width="5%">
            <col width="5%">
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
            <col width="5%">
        </colgroup>
        <thead>
            <tr>
                <td align="center" style="white-space: inherit; vertical-align: middle;"><input type="checkbox" name="chk_all_item_id"
                        onclick="checkbox_all_item_id(document.forms[0].chk_item_id);"></td>
                <!-- <td align="center"><i class="fas fa-pen-alt"></i></td> -->
                <td align="center" style="white-space: inherit; vertical-align: middle;"><b>STT</b></td>
                <td align="center" style="white-space: inherit; vertical-align: middle;"><b>Mã cổ phiếu</b></td>
                <td align="center" style="white-space: inherit; vertical-align: middle;"><b>Nhóm ngành</b></td>
                <td align="center" style="white-space: inherit; vertical-align: middle;"><b>Ngày mua</b></td>
                <td align="center" style="white-space: inherit; vertical-align: middle;"><b>% Tài sản</b></td>
                <td align="center" style="white-space: inherit; vertical-align: middle;"><b>Giá mua</b></td>
                <td align="center" style="white-space: inherit; vertical-align: middle;"><b>Vùng giá mục tiêu</b></td>
                <td align="center" style="white-space: inherit; vertical-align: middle;"><b>Giá hiện tại</b></td>
                <td align="center" style="white-space: inherit; vertical-align: middle;"><b>Lãi/Lỗ</b></td>
                <td align="center" style="white-space: inherit; vertical-align: middle;"><b>Khuyến nghị hành động</b></td>
                <td align="center" style="white-space: inherit; vertical-align: middle;"><b>Dừng lỗ</b></td>
                <td align="center" style="white-space: inherit; vertical-align: middle;"><b>% Chốt</b></td>
                <td align="center" style="white-space: inherit; vertical-align: middle;"><b>Ghi chú</b></td>
                <td align="center" style="white-space: inherit; vertical-align: middle;"><b><span onclick="JS_Recommended.addrow()" class="text-cursor text-primary"><i class="fas fa-plus-square"></i></span></b></td>
            </tr>
            <tr>

            </tr>
        </thead>
        <tbody id="body_data">
            @if(count($datas) > 0)
                @foreach ($datas as $key => $data)
                @php $id = $data->id; $i = 1; @endphp
                <tr>
                    <td align="center"><input type="checkbox" ondblclick=""
                            onclick="{select_checkbox_row(this);}" name="chk_item_id"
                            value="{{ $data->id }}"></td>
                    <td align="center" >{{ $key + 1 }}</td>
                    <td class="td_code_cp_{{$id}}" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'code_cp')">
                        <span id="span_code_cp_{{$id}}" class="span_code_cp_{{$id}}">{{ $data->code_cp }}</span>
                    </td>
                    <td class="td_code_category_{{$id}}" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'code_category')">
                        <span id="span_code_category_{{$id}}" class="span_code_category_{{$id}}">{{ $data->code_category }}</span>
                    </td>
                    <td onclick="{select_row(this);}">{{ !empty($data->created_at) ? date('d/m/Y', strtotime($data->created_at)) : '' }}</td>
                    <td class="td_percent_of_assets_{{$id}}" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'percent_of_assets')">
                        <span id="span_percent_of_assets_{{$id}}" class="span_percent_of_assets_{{$id}}">{{ $data->percent_of_assets }}</span>
                    </td>
                    <td class="td_price_{{$id}}" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'price')">
                        <span id="span_price_{{$id}}" class="span_price_{{$id}}">{{ $data->price }}</span>
                    </td>
                    <td class="td_price_range_{{$id}}" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'price_range')">
                        <span id="span_price_range_{{$id}}" class="span_price_range_{{$id}}">{{ $data->price_range }}</span>
                    </td>
                    <td class="td_current_price_{{$id}}" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'current_price')">
                        <span id="span_current_price_{{$id}}" class="span_current_price_{{$id}}">{{ $data->current_price }}</span>
                    </td>
                    <td class="td_profit_and_loss_{{$id}}" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'profit_and_loss')">
                        <span id="span_profit_and_loss_{{$id}}" class="span_profit_and_loss_{{$id}}">{{ $data->profit_and_loss }}</span>
                    </td>
                    <td class="td_act_{{$id}}" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'act')">
                        <span id="span_act_{{$id}}" class="span_act_{{$id}}">{{ $data->act }}</span>
                    </td>
                    <td class="td_stop_loss_{{$id}}" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'stop_loss')">
                        <span id="span_stop_loss_{{$id}}" class="span_stop_loss_{{$id}}">{{ $data->stop_loss }}</span>
                    </td>
                    <td class="td_closing_percentage_{{$id}}" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'closing_percentage')">
                        <span id="span_closing_percentage_{{$id}}" class="span_closing_percentage_{{$id}}">{{ $data->closing_percentage }}</span>
                    </td>
                    <td class="td_note_{{$id}}" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'note')">
                        <span id="span_note_{{$id}}" class="span_note_{{$id}}">{{ $data->note }}</span>
                    </td>
                    <td align="center"><span class="text-cursor text-warning" onclick="JS_Recommended.edit('{{$id}}')"><i class="fas fa-edit"></i></span></td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    <tfoot>
        @if(count($datas) > 0)
        <tr class="fw-bold" id="pagination">
            <td colspan="10">{{$datas->links('pagination.phantrang')}}</td>
        </tr>
        @else
        <tr id="pagination">
            <td colspan="10">Không tìm thấy dữ liệu!</td>
        </tr>
        @endif
    </tfoot>
</div>
