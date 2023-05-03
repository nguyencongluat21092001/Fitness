<style>
    .unit-edit span {
        font-size: 19px;
    }
    body {margin:2rem;}
        .modal-dialog {
            max-width: 800px;
            margin: 30px auto;
        }



        .modal-body {
        position:relative;
        padding:0px;
        }
        .close {
        position:absolute;
        right:-30px;
        top:0;
        z-index:999;
        font-size:2rem;
        font-weight: normal;
        color:#fff;
        opacity:1;
        }

        td > p { overflow-y:scroll;overflow-x:hidden;} 
</style>
{{-- @php
use Modules\System\Recordtype\Helpers\WorkflowHelper;
@endphp --}}
<div class="table-responsive pmd-card pmd-z-depth ">
    <table id="table-data" class="table  table-bordered table-striped table-condensed dataTable no-footer">
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
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $key => $data)
                <tr>
                    <td style="width:3%;vertical-align: middle;"align="center"><input type="checkbox" name="chk_item_id"
                            value="{{ $data->id }}"></td>
                    <td style="width:3%;vertical-align: middle;" align="center">{{ $key + 1 }}
                    <!-- <td style="width:10%;vertical-align: middle;" align="center" ondblclick="" onclick="{select_row(this);}">
                       {{$data->code_cp}}
                    </td> -->
                    <td style="width:5%;vertical-align: middle;" align="center" onclick="JS_DataFinancial.changeUpdate('{{$data->id}}')">
                       {{$data->code_cp}}
                    </td>
                    <td style="width:5%;vertical-align: middle;" align="center"  onclick="JS_DataFinancial.changeUpdate('{{$data->id}}')">
                       {{$data->exchange}}
                    </td>
                    <td style="width:5%;vertical-align: middle;white-space: inherit;" align="center"  onclick="JS_DataFinancial.changeUpdate('{{$data->id}}')">
                       {{$data->category->name_category}}
                    </td>
                    <td style="width:5%;vertical-align: middle;white-space: inherit;" align="center"  onclick="JS_DataFinancial.changeUpdate('{{$data->id}}')">
                       {{$data->Users->name}}
                    </td>
                    <td style="width:9%;vertical-align: middle;white-space: inherit;" align="center"  onclick="JS_DataFinancial.changeUpdate('{{$data->id}}')">
                       {{$data->updated_at}}
                    </td>
                    <td style="width:5%;vertical-align: middle;" align="center"  onclick="JS_DataFinancial.changeUpdate('{{$data->id}}')">
                       {{$data->ratings_TA}}
                    </td>
                    <td style="vertical-align: middle;white-space: inherit;" onclick="JS_DataFinancial.changeUpdate('{{$data->id}}')">
                       {{$data->identify_trend}}
                    </td>
                    <td style="width:10%;vertical-align: middle;" align="center"  onclick="JS_DataFinancial.changeUpdate('{{$data->id}}')">
                       {{$data->act}}
                    </td>
                    <td style="width:10%;vertical-align: middle;" align="center"  onclick="JS_DataFinancial.changeUpdate('{{$data->id}}')">
                       {{$data->trading_price_range}}
                    </td>
                    <td style="width:5%;vertical-align: middle;" align="center"  onclick="JS_DataFinancial.changeUpdate('{{$data->id}}')">
                       {{$data->stop_loss_price_zone}}
                    </td>
                    <td style="width:5%;vertical-align: middle;" align="center"  onclick="JS_DataFinancial.changeUpdate('{{$data->id}}')">
                       {{$data->ratings_FA}}
                    </td>
                    <td style="width:5%;vertical-align: middle;" align="center"  onclick="JS_DataFinancial.changeUpdate('{{$data->id}}')">
                        <i class="fas fa-link"></i>
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
