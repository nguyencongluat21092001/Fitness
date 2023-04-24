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
        <thead>
            <tr>
            <td align="center"><input type="checkbox" name="chk_all_item_id"
                        onclick="checkbox_all_item_id(document.forms[0].chk_item_id);"></td>
                <!-- <td align="center"><i class="fas fa-pen-alt"></i></td> -->
                <td align="center"><b>STT</b></td>
                <td align="center"><b>Tên</b></td>
                <td align="center"><b>Mã thể loại</b></td>
                <td align="center"><b>Mô tả</b></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $key => $data)
                <tr>
                    <td style="width:5%" align="center"><input type="checkbox" ondblclick=""
                            onclick="{select_checkbox_row(this);}" name="chk_item_id"
                            value="{{ $data->id }}"></td>
                    <td style="width:5%" align="center" >{{ $key + 1 }}
                    <td style="width:15%" align="center">
                        {{ $data->name_category }}</td>
                    <td style="width:15%" align="center">
                        {{ $data->code_category}}</td>
                    <td style="width:15%" align="center">
                        {{ $data->decision }}</td>
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
