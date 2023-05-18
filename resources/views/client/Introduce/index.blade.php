@extends('client.layouts.index')
@section('body-client')
<section class="container">
    <div class=" pb-3 d-lg-flex gx-5">
    <div class="col-lg-12">
        <form action="" method="GET" id="frmLoadlist_signal">
            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
            <div class="home_index_vnindex pt-1 pb-3" style="background:#ffffff91 !important;border-radius:0px !important">
                <!-- phần giới thiệu FIn top -->
                <div class="home_index_child" style="background:#ffffff91 !important;">
                    <div class="col-lg-12" style="padding:10px;">
                        <div class="row d-flex align-items-center py-5">
                            <div class="col-lg-6 text-start">
                                <h1 class="h2 py-5 typo-space-line">FinTop</h1>
                                <p class="light-300">
                                    Vector illustration credit goes to <a rel="nofollow" href="http://freepik.com/" target="_blank">FreePik</a> website. Purple Buzz is provided by TemplateMo. Lorem ipsum dolor sit amet, consectetur.
                                </p>
                            </div>
                            <div class="col-lg-6">
                                <img src="./clients/img/banner-img-02.svg">
                            </div>
                        </div>
                    </div>
                </div>
                 <!-- team tư vấn đầu tư  -->
                <div class="home_index_child" style="background:#ffffff91 !important;">
                    <div class="col-lg-12" style="padding:10px;">
                    <div class="pt-5 pb-3 d-lg-flex align-items-center gx-5">
                        <div class="col-lg-3">
                            <h2 class="h2 py-5 typo-space-line">Cố vấn đầu tư</h2>
                            <p class="text-muted light-300">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </p>
                        </div>
                        <div class="col-lg-9 row">
                            <div class="team-member col-md-4">
                                <img class="team-member-img img-fluid rounded-circle p-4" src="../clients/img/team-01.jpg" alt="Card image">
                                <ul class="team-member-caption list-unstyled text-center pt-4 text-muted light-300">
                                    <li>John Doe</li>
                                    <li>Business Development</li>
                                </ul>
                            </div>
                            <div class="team-member col-md-4">
                                <img class="team-member-img img-fluid rounded-circle p-4" src="../clients/img/team-02.jpg" alt="Card image">
                                <ul class="team-member-caption list-unstyled text-center pt-4 text-muted light-300">
                                    <li>Jane Doe</li>
                                    <li>Media Development</li>
                                </ul>
                            </div>
                            <div class="team-member col-md-4">
                                <img class="team-member-img img-fluid rounded-circle p-4" src="../clients/img/team-03.jpg" alt="Card image">
                                <ul class="team-member-caption list-unstyled text-center pt-4 text-muted light-300">
                                    <li>Sam</li>
                                    <li>Developer</li>
                                </ul>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                 <!-- team tư vấn đầu tư  -->
                 <div class="home_index_child" style="background:#ffffff91 !important;">
                    <div class="col-lg-12" style="padding:10px;">
                    <div class="container my-4">
                        <div class="row text-center">

                            <div class="objective col-lg-4">
                                <div class="objective-icon card m-auto py-4 mb-2 mb-sm-4 bg-secondary shadow-lg">
                                    <i class="display-4 bx bxs-bulb text-light"></i>
                                </div>
                                <h2 class="objective-heading h3 mb-2 mb-sm-4 light-300">Our Vision</h2>
                                <p class="light-300">
                                    Incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse commodo viverra.
                                </p>
                            </div>

                            <div class="objective col-lg-4 mt-sm-0 mt-4">
                                <div class="objective-icon card m-auto py-4 mb-2 mb-sm-4 bg-secondary shadow-lg">
                                    <i class='display-4 bx bx-revision text-light'></i>
                                </div>
                                <h2 class="objective-heading h3 mb-2 mb-sm-4 light-300">Our Mission</h2>
                                <p class="light-300">
                                    Eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    Ut enim ad minim veniam quis.
                                </p>
                            </div>

                            <div class="objective col-lg-4 mt-sm-0 mt-4">
                                <div class="objective-icon card m-auto py-4 mb-2 mb-sm-4 bg-secondary shadow-lg">
                                    <i class="display-4 bx bxs-select-multiple text-light"></i>
                                </div>
                                <h2 class="objective-heading h3 mb-2 mb-sm-4 light-300">Our Goal</h2>
                                <p class="light-300">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                    sed do eiusmod tempor.
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<script src="../clients/js/jquery.min.js"></script>

<script>
        NclLib.menuActive('.link-introduce');
</script>
@endsection