
<style>
      .scrollbar
    {
      margin-left: 30px;
      /* float: left; */
      height: 300px;
      /* width: 65px; */
      /* background: #F5F5F5; */
      overflow-y: scroll;
      margin-bottom: 25px;
    }

    .force-overflow
    {
      min-height: 300px;
    }

    #wrapper
    {
      text-align: center;
      width: 500px;
      margin: auto;
    }

    /*
    *  STYLE 2
    */

    #style-2::-webkit-scrollbar-track
    {
      -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
      border-radius: 10px;
      background-color: #F5F5F5;
    }

    #style-2::-webkit-scrollbar
    {
      width: 12px;
      background-color: #F5F5F5;
    }

    #style-2::-webkit-scrollbar-thumb
    {
      border-radius: 10px;
      -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
      background-color: #D62929;
    }
    .tv-lightweight-charts{
      width: 100%;
      padding-right: var(--bs-gutter-x, 0.5rem) !important;
      padding-left: var(--bs-gutter-x,0.5rem)!important;
      margin-right: auto!important;
      margin-left: auto!important;
    }
    .table{
        border-color: #670000;
    }
</style>
<div class="scrollbar" id="style-1" style="padding-right:10px;">
  <div class="table-responsive pmd-card pmd-z-depth table-container">
      <table id="table-data" class="table  table-bordered table-striped table-condensed dataTable no-footer">
          <thead>
              <tr style="background:#92241a;color:white">
                  <td style="width: 5%;white-space: inherit;vertical-align: middle" align="center"><b>STT</b></td>
                  <td style="width: 5%;white-space: inherit;vertical-align: middle" align="center"><b>Mã CP</b></td>
                  <td style="width: 5%;white-space: inherit;vertical-align: middle" align="center"><b>Sàn</b></td>
                  <td style="width: 10%;white-space: inherit;vertical-align: middle" align="center"><b>Nhóm nghành HĐKD</b></td>
                  <td style="width: 10%;white-space: inherit;vertical-align: middle" align="center"><b>Thời gian cập nhật</b></td>
                  <td style="width: 10%;white-space: inherit;vertical-align: middle" align="center"><b>Xếp hạng TA</b></td>
                  <td style="width: 10%;white-space: inherit;vertical-align: middle" align="center"><b>Nhận định Ta - Xu hướng CP</b></td>
                  <td style="width: 5%;white-space: inherit;vertical-align: middle" align="center"><b>Hành động</b></td>
                  <td style="width: 10%;white-space: inherit;vertical-align: middle" align="center"><b>Vùng giá giao dịch</b></td>
                  <td style="width: 10%;white-space: inherit;vertical-align: middle" align="center"><b>Vùng giá cắt lỗ</b></td>
                  <td style="width: 5%;white-space: inherit;vertical-align: middle" align="center"><b>Xếp hạng FA</b></td>
                  <td style="width: 10%;white-space: inherit;vertical-align: middle" align="center"><b>Phân tích DN FA</b></td>
              </tr>
          </thead>
            <tbody id="body_data">
            @if(auth::check())
            @foreach ($datas as $key => $data)
                 @php $id = $data->id; @endphp
                <tr>
                        <td style="width: 5%;vertical-align: middle;" align="center">{{$key + 1}}</td>
                        <td style="width: 5%;vertical-align: middle;" class="td_code_cp_{{$id}}" align="center">
                          <span id="span_code_cp_{{$id}}" value="" class="span_code_cp_{{$id}}">{{$data->code_cp}}</span>
                        </td>
                        <td style="width: 5%;vertical-align: middle;" class="td_exchange_{{$id}}" align="center">
                          <span id="span_exchange_{{$id}}" class="span_exchange_{{$id}}">{{$data->exchange}}</span>
                        </td>
                        <td style="width: 10%;vertical-align: middle;white-space: inherit;" class="td_code_category_{{$id}}" align="center">
                        <span id="span_code_category_{{$id}}" class="span_code_category_{{$id}}">{{!empty($data->category) ? $data->category->name_category : ''}}</span>
                        </td>
                        <td style="width: 10%;vertical-align: middle;white-space: inherit;" class="td_created_at_{{$id}}" align="center">
                          <span id="span_created_at_{{$id}}" class="span_created_at_{{$id}}">{{!empty($data->created_at) ? date('d/m/Y', strtotime($data->created_at)) : ''}}</span>
                        </td>
                        <td style="width: 10%;vertical-align: middle;" class="td_ratings_TA_{{$id}}" align="center">
                          <span id="span_ratings_TA_{{$id}}" class="span_ratings_TA_{{$id}}">{{$data->ratings_TA}}</span>
                        </td>
                        <td style="width: 10%;vertical-align: middle;" class="td_identify_trend_{{$id}}" align="center">
                          <span id="span_identify_trend_{{$id}}" class="span_identify_trend_{{$id}}" 
                          style="display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;white-space: break-spaces;overflow:hidden;" title="{{$data->identify_trend}}">{{$data->identify_trend}}</span>
                        </td>
                        <td style="width: 5%;vertical-align: middle;white-space: inherit;" class="td_act_{{$id}}" align="center">
                          <span id="span_act_{{$id}}" class="span_act_{{$id}}">{{$data->act}}</span>
                        </td>
                        <td style="width: 10%;vertical-align: middle;" class="td_trading_price_range_{{$id}}" align="center">
                          <span id="span_trading_price_range_{{$id}}" class="span_trading_price_range_{{$id}}">{{$data->trading_price_range}}</span>
                        </td>
                        <td style="width: 10%;vertical-align: middle;" class="td_stop_loss_price_zone_{{$id}}" align="center">
                          <span id="span_stop_loss_price_zone_{{$id}}" class="span_stop_loss_price_zone_{{$id}}">{{$data->stop_loss_price_zone}}</span>
                        </td>
                        <td style="width: 5%;vertical-align: middle;" class="td_ratings_FA_{{$id}}" align="center">
                          <span id="span_ratings_FA_{{$id}}" class="span_ratings_FA_{{$id}}">{{$data->ratings_FA}}</span>
                        </td>
                        <td style="width: 5%;vertical-align: middle;" align="center">
                          <a href="javascript:;">Xem chi tiết</a>
                        </td>
                    </tr>
                @endforeach
                @else
                    <span><i class="fas fa-hand-point-right"></i> Đăng nhập xem tín hiệu mua
                                
                        <button  type="button" class="btn btn-success" href="{{ url('/login') }}"> <a href="{{ url('/login') }}" style="animation: lights 2s 750ms linear infinite;">Đăng nhập</a></button>
                    
                    </span>
                    <p></p>
                @endif
                
            </tbody>
      </table>
  </div>
</div>

