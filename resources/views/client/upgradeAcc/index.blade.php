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
    <div class="home_index_child" style="background:#ffffff1f  !important;">
        <div class="col-lg-12" style="padding:10px;">
            <div class="container my-4">
                <div class="row text-center">

                    <div class="objective col-lg-4" >
                        <div style="background:#ffffff;padding:15px;width:85%;height:100%;border-radius:5px">
                            <div class="objective-icon m-auto py-4 mb-2 mb-sm-4 shadow-lg">
                            <!-- <i class="far fa-star text-light fa-3x"></i> -->
                            <i class="pricing-table-icon display-3 bx bx-package text-secondary"></i>
                            </div>
                            <h2 class="objective-heading h3 mb-2 mb-sm-4 light-300"><i class="fas fa-tags"></i> Hội viên tiêu chuẩn</h2>
                            <p>$0/Year</p>
                            <ul class="pricing-table-body text-start text-dark px-4 list-unstyled light-300">
                                <li><i class="bx bxs-circle me-2"></i>Tra cứu cổ phiếu</li>
                                <li><i class="bx bxs-circle me-2"></i>Phân tích đầu tư cơ bản</li>
                                <li><i class="bx bxs-circle me-2"></i>Tham gia Cộng đồng chia sẻ đầu tư FinTop</li>
                                <li><i class="bx bxs-circle me-2"></i>Tài liệu, cẩm nang hướng dẫn đầu tư</li>
                            </ul>
                            <div class="pricing-table-footer pt-5 pb-2">
                                <a href="#" class="btn rounded-pill px-4 btn-outline-light light-300" style="background:#00a313;color:#000000">Đang sử dụng</a>
                            </div>
                        </div>
                    </div>

                    <div class="objective col-lg-4 mt-sm-0 mt-4" >
                        <div style="background:#f2fffc;padding:15px;width:85%;height:100%;border-radius:5px">
                            <div class="objective-icon m-auto py-4 mb-2 mb-sm-4 shadow-lg">
                                <!-- <i class='display-4 bx bx-revision text-light'></i> -->
                                <i class="pricing-table-icon display-3 bx bx-package text-secondary"></i>
                            </div>
                            <h2 class="objective-heading h3 mb-2 mb-sm-4 light-300"><i class="fas fa-tags"></i> Hội viên VIP 1 (Bạc)</h2>
                            <p>$120/Year</p>
                            <ul class="pricing-table-list text-start text-dark px-4 list-unstyled light-300">
                                <li><i class="bx bxs-circle me-2"></i>Tra cứu cổ phiếu</li>
                                <li><i class="bx bxs-circle me-2"></i>Phân tích đầu tư cơ bản</li>
                                <li><i class="bx bxs-circle me-2"></i>Tham gia Cộng đồng chia sẻ đầu tư FinTop</li>
                                <li><i class="bx bxs-circle me-2"></i>Tài liệu, cẩm nang hướng dẫn đầu tư</li>
                                <li><i class="bx bxs-circle me-2"></i>Tín hiệu mua FinTop</li>
                                <li><i class="bx bxs-circle me-2"></i>Phân tích đầu tư V.I.P</li>
                                <li><i class="bx bxs-circle me-2"></i>Danh mục đầu tư V.I.P FinTop</li>
                            </ul>
                            <div class="pricing-table-footer pt-5 pb-2">
                                <a href="#" class="btn rounded-pill px-4 btn-outline-light light-300" style="background:#00a313;color:#007b14;animation: lights 2s 750ms linear infinite;">Đăng ký</a>
                            </div>
                        </div>
                    </div>
                    <div class="objective col-lg-4 mt-sm-0 mt-4">
                        <div style="background:#fff079;padding:15px;width:85%;height:100%;border-radius:5px">
                            <div class="objective-icon m-auto py-4 mb-2 mb-sm-4 shadow-lg">
                            <i class="pricing-table-icon display-3 bx bx-package text-secondary"></i>

                        </div>
                            <h2 class="objective-heading h3 mb-2 mb-sm-4 light-300"><i class="fas fa-tags"></i> Hội viên VIP 2 (Vàng)</h2>
                            <p>$320/Year</p>
                            <ul class="pricing-table-list text-start text-dark px-4 list-unstyled light-300">
                                <li><i class="bx bxs-circle me-2"></i>Tra cứu cổ phiếu</li>
                                <li><i class="bx bxs-circle me-2"></i>Phân tích đầu tư cơ bản</li>
                                <li><i class="bx bxs-circle me-2"></i>Tham gia Cộng đồng chia sẻ đầu tư FinTop</li>
                                <li><i class="bx bxs-circle me-2"></i>Tài liệu, cẩm nang hướng dẫn đầu tư</li>
                                <li><i class="bx bxs-circle me-2"></i>Tín hiệu mua FinTop</li>
                                <li><i class="bx bxs-circle me-2"></i>Phân tích đầu tư V.I.P</li>
                                <li><i class="bx bxs-circle me-2"></i>Danh mục đầu tư V.I.P FinTop</li>
                                <li><i class="bx bxs-circle me-2"></i>Khuyến nghị đầu tư V.I.P FinTop</li>
                            </ul>
                            <div class="pricing-table-footer pt-5 pb-2">
                                <a href="#" class="btn rounded-pill px-4 btn-outline-light light-300" style="background:#00a313;color:#007b14;animation: lights 2s 750ms linear infinite;">Đăng ký</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->
<script src="../clients/js/jquery.min.js"></script>

<!-- <script>
        NclLib.menuActive('.link-privileges');
</script> -->
@endsection