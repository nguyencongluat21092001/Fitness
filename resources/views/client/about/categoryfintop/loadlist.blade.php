<style>
    .title_table{
        font-size:16px !important;
    }
    .table{
        border-color: #670000
    }
</style>
<div class="table-responsive pmd-card pmd-z-depth pt-2">
    <table id="table-data" class="table  table-bordered table-striped table-condensed dataTable no-footer">
        <thead>
            <tr style="background:#3a760c;color:white">
                <td align="center" style="white-space: inherit; vertical-align: middle;"><b>STT</b></td>
                <td align="center" style="white-space: inherit; vertical-align: middle;background:#ffef6d;color:red"><b>% Chốt</b></td>
                <td align="center" style="white-space: inherit; vertical-align: middle;"><b>Mã cổ phiếu</b></td>
                <td align="center" style="white-space: inherit; vertical-align: middle;"><b>Nhóm ngành</b></td>
                <td align="center" style="white-space: inherit; vertical-align: middle;"><b>Ngày mua</b></td>
                <td align="center" style="white-space: inherit; vertical-align: middle;"><b>% Tài sản</b></td>
                <td align="center" style="white-space: inherit; vertical-align: middle;"><b>Giá mua</b></td>
                <td align="center" style="white-space: inherit; vertical-align: middle;"><b>Ngày chốt</b></td>
                <td align="center" style="white-space: inherit; vertical-align: middle;"><b>Giá chốt</b></td>
                <td align="center" style="white-space: inherit; vertical-align: middle;"><b>Lãi/Lỗ</b></td>
                <td align="center" style="white-space: inherit; vertical-align: middle;"><b>Ghi chú</b></td>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($datas as $key => $data)
                <tr >
                    <td align="center" >{{ $key + 1 }}</td>
                    <td align="center" style="white-space: inherit; vertical-align: middle;background:#ffef6d;color:red">
                        <span>{{ $data->closing_percentage }}</span>
                    </td>
                    <td align="center" style="white-space: inherit; vertical-align: middle;">
                        <span>{{ $data->code_cp }}</span>
                    </td>
                    <td align="center" style="white-space: inherit; vertical-align: middle;">
                        <span>{{ $data->code_category }}</span>
                    </td>
                    <td>{{ !empty($data->created_at) ? date('d/m/Y', strtotime($data->created_at)) : '' }}</td>
                    <td align="center" style="white-space: inherit; vertical-align: middle;">
                        <span>{{ $data->percent_of_assets }}</span>
                    </td>
                    <td align="center" style="white-space: inherit; vertical-align: middle;">
                        <span>{{ $data->price }}</span>
                    </td>
                    <td>{{ !empty($data->date_close) ? date('d/m/Y', strtotime($data->date_close)) : '' }}</td>
                    <td align="center" style="white-space: inherit; vertical-align: middle;">
                        <span>{{ $data->price_close }}</span>
                    </td>
                    <td align="center" style="white-space: inherit; vertical-align: middle;background:#27ff65">
                        <span>{{ $data->profit_and_loss }}</span>
                    </td>
                    <td align="center" style="white-space: inherit; vertical-align: middle;">
                        <span>{{ $data->note }}</span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
