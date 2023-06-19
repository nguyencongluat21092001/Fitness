<style>
    /* .bold {
        font-weight: normal;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    }
    .hide {
        display: none;
    } */

    /* .font {
        font-style: italic;
    } */
    /* .th{
        text-align: center;
    }   */
    .box1{
        text-align: center;
        background-color:#ffecec;
    }
    .box2{
        text-align: center;
        background-color:#ddffce;
    }
    .box3{
        text-align: center;
        background-color:#feffcf;
    }
    .box4{
        text-align: center;
        background-color:#cafbff;
    }
    .box5{
        text-align: center;
        background-color:#d2e1ff;
    }
</style>
<div class="div_tab_head">
    <table class="table table-bordered table-responsive" style="margin-bottom:0px;font-size: 13px;">
        <colgroup>
            <col width="25%">
            <col width="15%">
            <col width="15%">
            <col width="15%">
            <col width="15%">
            <col width="15%">
        </colgroup>
        <thead>
        <tr style="background:#7f0000;color:white">
            <th style="text-align: center" colspan="1">Tên chức năng</th>
            <th style="text-align: center" colspan="1">Editor Tổng</th>
            <th style="text-align: center" colspan="1">Editor Pro</th>
            <th style="text-align: center" colspan="1">Editor</th>
            <th style="text-align: center" colspan="1">Sales Admin</th>
            <th style="text-align: center" colspan="1">Sales</th>
        </tr>
        </thead>
        <body>
            @foreach ($data as  $value)
                <tr>
                    <td style="text-align: left;"><b>{{$value['name_cate']}}</b></td>
                    <td style="text-align: center"><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></td>
                    <td style="text-align: center"><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></td>
                    <td style="text-align: center"><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></td>
                    <td style="text-align: center"><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></td>
                    <td style="text-align: center"><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></td>
                </tr>
            @endforeach
        </body>
        <!-- <body>
            <tr style="background-color: #a70000;">
                <th>Dữ liệu FinTop.Data</th>
            </tr>
            <tr class="box1">
                <th style="text-align: left;">Nhập liệu TA hằng ngày</th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
            </tr>
            <tr class="box1">
                <th style="text-align: left;">Gửi/chỉnh sửa Khuyến nghị VIP</th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
            </tr>
            <tr class="box1">
                <th style="text-align: left;">Cập nhật Danh mục FinTop</th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
            </tr>
            <tr class="box1">
                <th style="text-align: left;">Chỉnh sửa/thêm/ẩn Tín Hiệu Mua</th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
            </tr>
            <tr style="background-color: #1bf100;">
                <th>Báo cáo phân tích</th>
            </tr>
            <tr class="box2">
                <th style="text-align: left;">Đăng bài/chỉnh sửa bài cá nhân</th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
            </tr>
            <tr class="box2">
                <th style="text-align: left;">Chỉnh sửa/xóa/ẩn/sắp xếp bài các thành viên</th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
            </tr>
            <tr class="box2">
                <th style="text-align: left;">Duyệt & khóa quyền chỉnh sửa bài viết</th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
            </tr>
            <tr style="background-color: #ffee50;">
                <th>Thư viện đầu tư </th>
            </tr>
            <tr class="box3">
                <th style="text-align: left;">Chỉnh sửa/thêm/bớt Cẩm nang đầu tư </th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
            </tr>
             <tr style="background-color: #42e3ff;">
                <th>Hướng dẫn đầu tư </th>
            </tr>
            <tr class="box4">
                <th style="text-align: left;">Đăng/chỉnh sửa bài viết cá nhân H2 </th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
            </tr>
            <tr class="box4">
                <th style="text-align: left;">Chỉnh sửa/xóa/ẩn/sắp xếp bài các thành viên H2</th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
            </tr>
            <tr class="box4">
                <th style="text-align: left;">Duyệt & khóa quyền chỉnh sửa bài viết, thêm bớt các phân mục H1</th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
            </tr>
              <tr style="background-color: #a1aeff;">
                <th >KINH DOANH</th>
            </tr>
            <tr class="box5">
                <th style="text-align: left;">Xem KH và thống kê doanh thu trên ID cá nhân trực tiếp quản lý.</th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
            </tr>
            <tr class="box5">
                <th style="text-align: left;">Xem KH và thống kê doanh thu của các ID nhân sự dưới quyền quản lý.</th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
            </tr>
            <tr class="box5">
                <th style="text-align: left;">Thống kê tổng doanh thu</th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
                <th><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></th>
            </tr>
        </body> -->
    </table>
</div>

