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
    <section class="bg-light pt-sm-0 py-5">
        <div class="home_index_child" style="background:#ffffff1f  !important;">
                <div class="col-lg-12" style="padding:10px;">
                    <div class="container my-4">
                        <div class="row text-center">

                            <div class="objective col-lg-4" >
                                <div style="background:#99ffbf;padding:15px;width:100%;height:100%;border-radius:5px">
                                    <div class="objective-icon m-auto py-4 mb-2 mb-sm-4 shadow-lg">
                                    <!-- <i class="far fa-star text-light fa-3x"></i> -->
                                    <i class="pricing-table-icon display-3 bx bx-package text-secondary"></i>
                                    </div>
                                    <h2 class="objective-heading h3 mb-2 mb-sm-4 light-300"><i class="fas fa-tags" style="color:#ffc500"></i> Hội viên tiêu chuẩn</h2>
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
                                <div style="background:#d4d4d4;padding:15px;width:100%;height:100%;border-radius:5px">
                                    <div class="objective-icon m-auto py-4 mb-2 mb-sm-4 shadow-lg">
                                        <!-- <i class='display-4 bx bx-revision text-light'></i> -->
                                        <i class="pricing-table-icon display-3 bx bx-package text-secondary"></i>
                                    </div>
                                    <h2 class="objective-heading h3 mb-2 mb-sm-4 light-300"><i class="fas fa-tags" style="color:#ffc500"></i> Hội viên VIP 1 (Bạc)</h2>
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
                                <div style="background:#fff079;padding:15px;width:100%;height:100%;border-radius:5px">
                                    <div class="objective-icon m-auto py-4 mb-2 mb-sm-4 shadow-lg">
                                    <i class="pricing-table-icon display-3 bx bx-package text-secondary"></i>

                                </div>
                                    <h2 class="objective-heading h3 mb-2 mb-sm-4 light-300"><i class="fas fa-tags" style="color:#ffc500"></i> Hội viên VIP 2 (Vàng)</h2>
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
        <div class="container py-5">

            <h1 class="h2 semi-bold-600 text-center mt-2">Our Pricing</h1>
            <p class="text-center pb-5 light-300">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut facilisis.</p>

            <!-- Start Pricing Horizontal -->
            <div class="pricing-horizontal row col-10 m-auto d-flex shadow-sm rounded overflow-hidden bg-white">
                <div class="pricing-horizontal-icon col-md-3 text-center bg-secondary text-light py-4">
                    <i class="display-1 bx bx-package pt-4"></i>
                    <h5 class="h5 semi-bold-600 pb-4 light-300">Free</h5>
                </div>
                <div class="pricing-horizontal-body offset-lg-1 col-md-5 col-lg-4 d-flex align-items-center pl-5 pt-lg-0 pt-4">
                    <ul class="text-left px-4 list-unstyled mb-0 light-300">
                        <li><i class="bx bxs-circle me-2"></i>5 Users</li>
                        <li><i class="bx bxs-circle me-2"></i>2 TB space</li>
                        <li><i class="bx bxs-circle me-2"></i>Community Forums</li>
                    </ul>
                </div>
                <div class="pricing-horizontal-tag col-md-4 text-center pt-3 d-flex align-items-center">
                    <div class="w-100 light-300">
                        <p>$0</p>
                        <a href="#" class="btn rounded-pill px-4 btn-outline-primary mb-3">Get Now</a>
                    </div>
                </div>
            </div>
            <!-- End Pricing Horizontal -->

            <!-- Start Pricing Horizontal -->
            <div class="pricing-horizontal row col-10 m-auto d-flex shadow-sm rounded overflow-hidden my-5 bg-white">
                <div class="pricing-horizontal-icon col-md-3 text-center bg-secondary text-light py-4">
                    <i class="display-1 bx bx-package pt-4"></i>
                    <h5 class="h5 semi-bold-600 pb-4 light-300">Standard</h5>
                </div>
                <div class="pricing-horizontal-body offset-lg-1 col-md-5 col-lg-4 d-flex align-items-center pl-5 pt-lg-0 pt-4">
                    <ul class="text-left px-4 list-unstyled mb-0 light-300">
                        <li><i class="bx bxs-circle me-2"></i>25 to 99 Users</li>
                        <li><i class="bx bxs-circle me-2"></i>10 TB space</li>
                        <li><i class="bx bxs-circle me-2"></i>Live Chat</li>
                    </ul>
                </div>
                <div class="pricing-horizontal-tag col-md-4 text-center pt-3 d-flex align-items-center">
                    <div class="w-100 light-300">
                        <p>$120/Year</p>
                        <a href="#" class="btn rounded-pill px-4 btn-outline-primary mb-3">Get Now</a>
                    </div>
                </div>
            </div>
            <!-- End Pricing Horizontal -->

            <!-- Start Pricing Horizontal -->
            <div class="pricing-horizontal row col-10 m-auto d-flex shadow-sm rounded overflow-hidden bg-white">
                <div class="pricing-horizontal-icon col-md-3 text-center bg-secondary text-light py-4">
                    <i class="display-1 bx bx-package pt-4"></i>
                    <h5 class="h5 semi-bold-600 pb-4 light-300">Enterprise</h5>
                </div>
                <div class="pricing-horizontal-body offset-lg-1 col-md-5 col-lg-4 d-flex align-items-center pl-5 pt-lg-0 pt-4">
                    <ul class="text-left px-4 list-unstyled mb-0 light-300">
                        <li><i class="bx bxs-circle me-2"></i>100 users or more</li>
                        <li><i class="bx bxs-circle me-2"></i>80 TB space</li>
                        <li><i class="bx bxs-circle me-2"></i>Full Access</li>
                        <li><i class="bx bxs-circle me-2"></i>Customizations</li>
                    </ul>
                </div>
                <div class="pricing-horizontal-tag col-md-4 text-center pt-3 d-flex align-items-center">
                    <div class="w-100 light-300">
                        <p>$840/Year</p>
                        <a href="#" class="btn rounded-pill px-4 btn-outline-primary mb-3">Get Now</a>
                    </div>
                </div>
            </div>
            <!-- End Pricing Horizontal -->

        </div>
    </section>
</section>
<script src="../clients/js/jquery.min.js"></script>

<script>
        NclLib.menuActive('.link-privileges');
</script>
@endsection