
<table id="table-data" class="table align-items-center" >
    <div class="row projects gx-lg-5" style="padding:0px 10px 0px 10px">
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
                          Read more <i class='bx bxs-hand-right ms-1'></i>
                      </span>
                  </div>
              </div>
          </a>
        @endforeach
    </div>
    <div class="row">
        <div class="btn-toolbar justify-content-center pb-4" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group me-2" role="group" aria-label="First group">
                <button type="button" class="btn btn-secondary text-white">Previous</button>
            </div>
            <div class="btn-group me-2" role="group" aria-label="Second group">
                <button type="button" class="btn btn-light">1</button>
            </div>
            <div class="btn-group me-2" role="group" aria-label="Second group">
                <button type="button" class="btn btn-secondary text-white">2</button>
            </div>
            <div class="btn-group" role="group" aria-label="Third group">
                <button type="button" class="btn btn-secondary text-white">Next</button>
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
</table>
