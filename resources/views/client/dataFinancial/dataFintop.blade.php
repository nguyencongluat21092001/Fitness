<style>
    .unit-edit span {
        font-size: 19px;
    }
    td > p { overflow-y:scroll;overflow-x:hidden;} 
</style>
<form id="frmSearchCP"  role="form" action="" method="POST">
    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
    <!-- <div class="table-responsive pmd-card pmd-z-depth "> -->
        <table  id="table-data" class="table  table-bordered table-striped table-condensed dataTable no-footer">
            <colgroup>
                <col width="2%">
                <col width="5%">
                <col width="5%">
                <col width="5%">
                <col width="6%">
                <col width="3%">
                <col width="12%">
                <col width="7%">
                <col width="5%">
                <col width="3%">
                <col width="5%">
            </colgroup>
            <thead>
                <tr style="background:#679e39;color:white">
                    <td style="white-space: inherit;vertical-align: middle" align="center"><b>STT</b></td>
                    <td style="white-space: inherit;vertical-align: middle;background:#ff6e00" align="center"><b> </i>Nhập mã CP</b> <br> <i class="fas fa-angle-double-down"></td>
                    <td style="white-space: inherit;vertical-align: middle" align="center"><b>Sàn</b></td>
                    <td style="white-space: inherit;vertical-align: middle" align="center"><b>Nhóm nghành HĐKD</b></td>
                    <td style="white-space: inherit;vertical-align: middle" align="center"><b>Thời gian cập nhật</b></td>
                    <td style="white-space: inherit;vertical-align: middle" align="center"><b>Xếp hạng TA</b></td>
                    <td style="white-space: inherit;vertical-align: middle" align="center"><b>Nhận định Ta - Xu hướng CP</b></td>
                    <td style="white-space: inherit;vertical-align: middle" align="center"><b>Hành động</b></td>
                    <td style="white-space: inherit;vertical-align: middle" align="center"><b>Vùng giá giao dịch</b></td>
                    <td style="white-space: inherit;vertical-align: middle" align="center"><b>Xếp hạng FA</b></td>
                    <td style="white-space: inherit;vertical-align: middle" align="center"><b>Phân tích DN FA</b></td>
                </tr>
            </thead>
            
            <tbody id="body_data">
            @php $id = 1; @endphp
                <tr id="code_1">
                    <td  style="vertical-align: middle;color:#83beff" align="center">
                        <span >1</span>
                    </td>
                    <td class="td_code_cp_1" style="vertical-align: middle;" align="center" ondblclick="click2('1', 'code_cp',this)">
                        <span id="span_code_cp_1" class="span_code_cp_1">-</span>
                    </td>
                </tr>
            </tbody>
        </table>
    <!-- </div> -->
</form>

