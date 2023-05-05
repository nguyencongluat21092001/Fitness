<style>
    p  {
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 25px;
        -webkit-line-clamp: 3;
        height: 75px;
        display: -webkit-box;
        -webkit-box-orient: vertical;
    }
    .card-title{
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 25px;
        -webkit-line-clamp: 3;
        height: 75px;
        display: -webkit-box;
        -webkit-box-orient: vertical;
    }
</style>
<!-- <div class="row projects gx-lg-5" style="padding:0px 10px 0px 10px">
    @foreach ($datas as $key => $data)
        <a href="work-single.html" class="col-sm-6 col-lg-4 text-decoration-none {{ $data->code_category }}" style="padding-top:10px">
            <div class="service-work overflow-hidden card mb-5 mx-5 m-sm-0" >
                <img class="card-img-top" src="{{url('/file-image-client/blogs/')}}/{{ !empty($data->imageBlog[0]->name_image)?$data->imageBlog[0]->name_image:'' }}" style="height: 150px;width: 250px;object-fit: cover;" alt="...">
                <div class="card-body">
                    <h5 class="card-title light-300 text-dark">{{ $data->detailBlog->title }}</h5>
                    <p class="card-text light-300 text-dark">
                        {{ $data->detailBlog->decision }}
                    </p>
                    <span class="text-decoration-none text-primary light-300">
                        Đọc thêm <i class='bx bxs-hand-right ms-1'></i>
                    </span>
                </div>
            </div>
        </a>
    @endforeach
</div> -->
<!-- <div class="row projects gx-lg-5" style="padding:0px 10px 0px 10px"> -->
    @foreach ($datas as $key => $data)
        <a href="work-single.html" class="col-sm-6 col-lg-12 text-decoration-none {{ $data->code_category }}">
            <div class="pb-3 d-lg-flex gx-5">
                <div class="col-lg-4 ">
                    <img class="card-img-top" src="{{url('/file-image-client/blogs/')}}/{{ !empty($data->imageBlog[0]->name_image)?$data->imageBlog[0]->name_image:'' }}" style="height: 150px;width: 250px;object-fit: cover;" alt="...">
                </div>
                <div class="col-lg-8">
                    <div class="card-body">
                        <h5 class="card-title light-600 text-dark">{{ $data->detailBlog->title }}</h5>
                        <p class="light-300 ">
                            {{ $data->detailBlog->decision }}
                        </p>
                        <span class="text-decoration-none light-300">
                            Đọc thêm <i class='bx bxs-hand-right ms-1'></i>
                        </span>
                    </div>
                </div>
            </div>
            <div style="height:1px;background:#00000040">
            </div>
            <br>
        </a>
       
    @endforeach
   
<!-- </div> -->

