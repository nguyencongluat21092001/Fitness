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
                <td align="center"><b>Mã danh mục</b></td>
                <td align="center"><b>Mô tả</b></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $key => $data)
                <tr>
                    <td style="width:5%;vertical-align: middle;" align="center"><input type="checkbox" name="chk_item_id"
                            value="{{ $data->id }}"></td>
                    <td style="width:5%;vertical-align: middle;" align="center">{{ $key + 1 }}
                    <td style="width:15%;vertical-align: middle;" align="center">
                        {{ $data->name }}</td>
                    <td style="width:15%;vertical-align: middle;" align="center">
                        {{ $data->code_cate }}</td>
                    <td style="width:15%;vertical-align: middle;" align="center">
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
