@extends('client.layouts.index')
@section('body-client')
<style>
    .img-fluid{
        max-width: 70%;
        margin-left: 15%;
    }
    .name_cg{
        font-weight:600;
        font-size:16px;
    }
    .table{
        border-color: #990000;
    }
</style>
<section class="container">
    <div class=" pb-3 d-lg-flex gx-5">
    <div class="col-lg-12">
        <form action="" method="GET" id="frmLoadlist_signal">
            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
            <div class="home_index_vnindex pt-1 pb-3" style="background:#ffffff91 !important;border-radius:0px !important">
                <!-- phần giới thiệu FIn top -->
                <div class="home_index_child" style="background:#fffffff2  !important;">
                    <div class="col-lg-12" style="padding:10px;">
                        <div class="row d-flex align-items-center">
                            <div class="col-lg-12 text-start">
                                <h1 class="h5">I. ĐẶC QUYỀN</h1>
                            </div>
                            <div class="table-responsive pmd-card pmd-z-depth ">
                                <table id="table-data" class="table  table-bordered table-striped table-condensed dataTable no-footer">
                                <colgroup>
                                    <col width="5%">
                                    <col width="35%">
                                    <col width="15%">
                                    <col width="15%">
                                    <col width="15%">
                                    <col width="15%">
                                </colgroup>
                                    <thead>
                                        <tr>
                                            <td align="center"><b>STT</b></td>
                                            <td align="center"><b>Đặc quyền hội viên</b></td>
                                            <td style="background:#1fff00" align="center"><b>Tiêu chuẩn</b></td>
                                            <td style="background:#d1d1d1" align="center"><b>Bạc</b></td>
                                            <td style="background:#ffd404" align="center"><b>Vàng</b></td>
                                            <td style="background:black;color:white" align="center"><b>Kim cương</b></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                            <tr>
                                                <td style=""align="center">1</td>
                                                <td style="">Tra cứu cổ phiếu</td>
                                                <td style="background:#bbf4b3"align="center">V</td>
                                                <td style="background:#bbf4b3"align="center">V</td>
                                                <td style="background:#bbf4b3"align="center">V</td>
                                                <td style="background:#bbf4b3"align="center">V</td>
                                            </tr>
                                            <tr>
                                                <td style=""align="center">2</td>
                                                <td style="">Phân tích đầu tư cơ bản</td>
                                                <td style="background:#bbf4b3"align="center">V</td>
                                                <td style="background:#bbf4b3"align="center">V</td>
                                                <td style="background:#bbf4b3"align="center">V</td>
                                                <td style="background:#bbf4b3"align="center">V</td>
                                            </tr>
                                            <tr>
                                                <td style=""align="center">3</td>
                                                <td style="">Tham gia Cộng đồng chia sẻ đầu tư FinTop</td>
                                                <td style="background:#bbf4b3"align="center">V</td>
                                                <td style="background:#bbf4b3"align="center">V</td>
                                                <td style="background:#bbf4b3"align="center">V</td>
                                                <td style="background:#bbf4b3"align="center">V</td>
                                            </tr>
                                            <tr>
                                                <td style=""align="center">4</td>
                                                <td style="">Tài liệu, cẩm nang hướng dẫn đầu tư</td>
                                                <td style="background:#bbf4b3"align="center">V</td>
                                                <td style="background:#bbf4b3"align="center">V</td>
                                                <td style="background:#bbf4b3"align="center">V</td>
                                                <td style="background:#bbf4b3"align="center">V</td>
                                            </tr>
                                            <tr>
                                                <td style=""align="center">5</td>
                                                <td style="background:#5bc74d">Tín hiệu mua FinTop</td>
                                                <td style="color:red"align="center">X</td>
                                                <td style="background:#5bc74d"align="center">V</td>
                                                <td style="background:#5bc74d"align="center">V</td>
                                                <td style="background:#5bc74d"align="center">V</td>
                                            </tr>
                                            <tr>
                                                <td style=""align="center">6</td>
                                                <td style="background:#5bc74d">Phân tích đầu tư V.I.P</td>
                                                <td style="color:red"align="center">X</td>
                                                <td style="background:#5bc74d"align="center">V</td>
                                                <td style="background:#5bc74d"align="center">V</td>
                                                <td style="background:#5bc74d"align="center">V</td>
                                            </tr>
                                            <tr>
                                                <td style=""align="center">7</td>
                                                <td style="background:#5bc74d">Danh mục đầu tư V.I.P FinTop</td>
                                                <td style="color:red"align="center">X</td>
                                                <td style="background:#5bc74d"align="center">V</td>
                                                <td style="background:#5bc74d"align="center">V</td>
                                                <td style="background:#5bc74d"align="center">V</td>
                                            </tr>
                                            <tr>
                                                <td style=""align="center">8</td>
                                                <td style="background:#39962e">Khuyến nghị đầu tư V.I.P FinTop</td>
                                                <td style="color:red"align="center">X</td>
                                                <td style="color:red"align="center">X</td>
                                                <td style="background:#39962e;color:#fffe0f"align="center">V</td>
                                                <td style="background:#39962e;color:#fffe0f"align="center">V</td>
                                            </tr>
                                            <tr>
                                                <td style=""align="center">9</td>
                                                <td style="background:#0c7600">Cố vấn 1-1 từ chuyên gia FinTop</td>
                                                <td style="color:red"align="center">X</td>
                                                <td style="color:red"align="center">X</td>
                                                <td style="color:red"align="center">X</td>
                                                <td style="background:#0c7600;color:#fffe0f"align="center">V</td>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                 <!-- team tư vấn đầu tư  -->
                <div class="home_index_child" style="background:#fffffff2  !important;">
                    <div class="col-lg-12" style="padding:10px;">
                            <div class="col-lg-12 text-start">
                                <h1 class="h5 ">II. CHÍNH SÁCH</h1>
                            </div>
                            <div class="table-responsive pmd-card pmd-z-depth ">
                                <table id="table-data" class="table  table-bordered table-striped table-condensed dataTable no-footer">
                                <colgroup>
                                    <col width="5%">
                                    <col width="35%">
                                    <col width="15%">
                                    <col width="15%">
                                    <col width="15%">
                                    <col width="15%">
                                </colgroup>
                                    <thead>
                                        <tr>
                                            <td align="center"><b>STT</b></td>
                                            <td align="center"><b>Chính sach hội viên</b></td>
                                            <td style="background:#1fff00" align="center"><b>Tiêu chuẩn</b></td>
                                            <td style="background:#d1d1d1" align="center"><b>Bạc</b></td>
                                            <td style="background:#ffd404" align="center"><b>Vàng</b></td>
                                            <td style="background:black;color:white" align="center"><b>Kim cương</b></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                            <tr>
                                                <td style="white-space: inherit;vertical-align: middle"align="center">1</td>
                                                <td style="white-space: inherit;vertical-align: middle">Có tài khoản chứng khoán thuộc các công ty chứng khoán đối tác do Đội ngũ FinTop quản lý.</td>
                                                <td style="color:red;white-space: inherit;vertical-align: middle"align="center">X</td>
                                                <td style="white-space: inherit;vertical-align: middle"align="center">Dưới 100tr <br> (NAV đầu tư)</td>
                                                <td style="white-space: inherit;vertical-align: middle"align="center">100 - 499tr <br> (NAV đầu tư)</td>
                                                <td style="white-space: inherit;vertical-align: middle"align="center">Từ 500tr <br> (NAV đầu tư)</td>
                                            </tr>
                                            <tr>
                                                <td style="white-space: inherit;vertical-align: middle"align="center">2</td>
                                                <td style="white-space: inherit;vertical-align: middle">Nộp phí tham gia Hội viên</td>
                                                <td style=""align="center">Đăng ký tài khoản FinTop 0 VND</td>
                                                <td style="background:#b4b4b4;white-space: inherit;vertical-align: middle"align="center">VIP1</td>
                                                <td style="background:#ffd041;white-space: inherit;vertical-align: middle"align="center">VIP2</td>
                                                <td style="color:red;white-space: inherit;vertical-align: middle"align="center">X</td>
                                            </tr>
                                            <tr>
                                                <td style="white-space: inherit;vertical-align: middle"align="center">3</td>
                                                <td style="white-space: inherit;vertical-align: middle">Đăng ký</td>
                                                <td style="background:#58ff75;w#58ff75ite-space: inherit;vertical-align: middle;animation: lights 2s 750ms linear infinite"align="center">Đăng ký</td>
                                                <td style="background:#02d200;white-space: inherit;vertical-align: middle;color:#fff935;font-weight:600;animation: lights 2s 750ms linear infinite"align="center">Đăng ký</td>
                                                <td style="background:#a72500;color:#fff935;font-weight:600;animation: lights 4s 750ms linear infinite"align="center">Đăng ký</td>
                                                <td style="color:red"align="center">X</td>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<script src="../clients/js/jquery.min.js"></script>

<script>
        NclLib.menuActive('.link-privileges');
</script>
@endsection