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
    .scrollbar{

    }
</style>
<div class="card h-100">
    <div class="card-header pb-0 px-3">
        <div class="row">
            <div class="col-md-6">
            <h6 class="mb-0">Bài viết </h6>
            </div>
            <div class="col-md-6 d-flex justify-content-end align-items-center">
            <i class="far fa-calendar-alt me-2"></i>
            <small>Chủ nhật , 07-05-2023</small>
            </div>
        </div>
        </div>
        <div class="scrollbar" id="style-1" style="padding-right:10px;height:900px !important">
          <div class="card-body pt-4 p-3">
              <ul class="list-group">
                    @foreach ($datas as $key => $data)
                        <a href="work-single.html" class="col-sm-6 col-lg-12 text-decoration-none {{ $data->code_category }}">
                            <div class="pb-3 d-lg-flex gx-5">
                                <div class="col-lg-4 ">
                                    <img class="card-img-top" src="{{url('/file-image-client/blogs/')}}/{{ !empty($data->imageBlog[0]->name_image)?$data->imageBlog[0]->name_image:'' }}" style="height: 150px;width: 250px;object-fit: cover;" alt="...">
                                </div>
                                <div class="col-lg-1 "></div>
                                <div class="col-lg-7">
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
              </ul>
          </div>
        </div>
    </div>
</div>
 <!-- <div style="width:100%" class="row">
    <tfoot>
        <tr>
            <td colspan="10">
                {{$datas->links('pagination.phantrang-client')}}
            </td>
        </tr>
    </tfoot>
    </div> -->

