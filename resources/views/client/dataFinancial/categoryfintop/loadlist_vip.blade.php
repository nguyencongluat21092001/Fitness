<style>
    .title_table{
        font-size:16px !important;
    }
    .table{
        border-color: #670000
    }
</style>
<div class="table-responsive pmd-card pmd-z-depth pt-2">
    <table id="table-data" class="table  table-bordered table-striped table-condensed dataTable no-footer" >
        <thead>
            <tr style="background:#3a760c;color:white">
                <td align="center" style="white-space: inherit; vertical-align: middle;"><b>STT</b></td>
                <td align="center" style="white-space: inherit; vertical-align: middle;"><b>Mã cổ phiếu</b></td>
                <td align="center" style="white-space: inherit; vertical-align: middle;"><b>Nhóm ngành</b></td>
                <td align="center" style="white-space: inherit; vertical-align: middle;"><b>Ngày mua</b></td>
                <td align="center" style="white-space: inherit; vertical-align: middle;background:#ffef6d;color:red"><b>% Tài sản</b></td>
                <td align="center" style="white-space: inherit; vertical-align: middle;"><b>Giá mua</b></td>
                <td align="center" style="white-space: inherit; vertical-align: middle;"><b>Vùng giá mục tiêu (TA1)</b></td>
                <td align="center" style="white-space: inherit; vertical-align: middle;"><b>Vùng giá mục tiêu (TA2)</b></td>
                <td align="center" style="white-space: inherit; vertical-align: middle;"><b>Vùng giá mục tiêu (TA3)</b></td>
                <td align="center" style="white-space: inherit; vertical-align: middle;"><b>Giá hiện tại</b></td>
                <td align="center" style="white-space: inherit; vertical-align: middle;"><b>Lãi/Lỗ</b></td>
                <td align="center" style="white-space: inherit; vertical-align: middle;"><b>Khuyến nghị hành động</b></td>
                <td align="center" style="white-space: inherit; vertical-align: middle;background:#ffef6d;color:red"><b>Dừng lỗ</b></td>
                <td align="center" style="white-space: inherit; vertical-align: middle;background:#ffef6d;color:red"><b>% Chốt</b></td>
                <td align="center" style="white-space: inherit; vertical-align: middle;"><b>Ghi chú</b></td>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($datas as $key => $data)
                <tr>
                    <td align="center" >{{ $key + 1 }}</td>
                    <td align="center" style="white-space: inherit; vertical-align: middle;">
                        @if(isset($_SESSION['role']) && $_SESSION['role'] == 'VIP')
                        <span>{{ $data->code_cp }}</span>
                        @else
                        <span style="color:#00a25f"><i class="fas fa-eye-slash"></i></span>
                        @endif
                    </td>
                    <td align="center" style="white-space: inherit; vertical-align: middle;">
                        <span>{{ $data->code_category }}</span>
                    </td>
                    <td>{{ !empty($data->created_at) ? date('d/m/Y', strtotime($data->created_at)) : '' }}</td>
                    <td align="center" style="white-space: inherit; vertical-align: middle;background:#ffef6d;color:red">
                        @if(isset($_SESSION['role']) && $_SESSION['role'] == 'VIP')
                        <span>{{ $data->percent_of_assets }}</span>
                        @else
                        <span style="color:#00a25f"><i class="fas fa-eye-slash"></i></span>
                        @endif
                    </td>
                    <td align="center" style="white-space: inherit; vertical-align: middle;">
                        @if(isset($_SESSION['role']) && $_SESSION['role'] == 'VIP')
                        <span>{{ $data->price }}</span>
                        @else
                        <span style="color:#00a25f"><i class="fas fa-eye-slash"></i></span>
                        @endif
                    </td>
                    <td align="center" style="white-space: inherit; vertical-align: middle;">
                        @if(isset($_SESSION['role']) && $_SESSION['role'] == 'VIP')
                        <span>{{ $data->ta1 }}</span>
                        @else
                        <span style="color:#00a25f"><i class="fas fa-eye-slash"></i></span>
                        @endif
                    </td>
                    <td align="center" style="white-space: inherit; vertical-align: middle;">
                        @if(isset($_SESSION['role']) && $_SESSION['role'] == 'VIP')
                        <span>{{ $data->ta2 }}</span>
                        @else
                        <span style="color:#00a25f"><i class="fas fa-eye-slash"></i></span>
                        @endif
                    </td>
                    <td align="center" style="white-space: inherit; vertical-align: middle;">
                        @if(isset($_SESSION['role']) && $_SESSION['role'] == 'VIP')
                        <span>{{ $data->ta3 }}</span>
                        @else
                        <span style="color:#00a25f"><i class="fas fa-eye-slash"></i></span>
                        @endif
                    </td>
                    <td align="center" style="white-space: inherit; vertical-align: middle;">
                        @if(isset($_SESSION['role']) && $_SESSION['role'] == 'VIP')
                        <span>{{ $data->current_price }}</span>
                        @else
                        <span style="color:#00a25f"><i class="fas fa-eye-slash"></i></span>
                        @endif
                    </td>
                    <td align="center" style="white-space: inherit; vertical-align: middle;background:#27ff65;">
                        @if(isset($_SESSION['role']) && $_SESSION['role'] == 'VIP')
                        <span>{{ $data->profit_and_loss }}</span>
                        @else
                        <span style="color:#00a25f"><i class="fas fa-eye-slash"></i></span>
                        @endif
                    </td>
                    <td align="center" style="white-space: inherit; vertical-align: middle;">
                        <span>{{ $data->act }}</span>
                    </td>
                    <td align="center" style="white-space: inherit; vertical-align: middle;background:#ffef6d;color:red">
                        @if(isset($_SESSION['role']) && $_SESSION['role'] == 'VIP')
                        <span>{{ $data->stop_loss }}</span>
                        @else
                        <span style="color:#00a25f"><i class="fas fa-eye-slash"></i></span>
                        @endif
                    </td>
                    <td align="center" style="white-space: inherit; vertical-align: middle;background:#ffef6d;color:red">
                        @if(isset($_SESSION['role']) && $_SESSION['role'] == 'VIP')
                        <span>{{ $data->closing_percentage }}</span>
                        @else
                        <span style="color:#00a25f"><i class="fas fa-eye-slash"></i></span>
                        @endif
                    </td>
                    <td align="center" style="white-space: inherit; vertical-align: middle;">
                       @if(isset($_SESSION['role']) && $_SESSION['role'] == 'VIP')
                       <span>{{ $data->note }}</span>
                        @else
                        <span style="color:#00a25f"><i class="fas fa-eye-slash"></i></span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
