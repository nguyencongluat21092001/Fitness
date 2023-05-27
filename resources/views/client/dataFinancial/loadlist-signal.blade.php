
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
</style>
<div class="scrollbar" id="style-1" style="padding-right:10px;height:600px !important">
  <div class="table-responsive pmd-card pmd-z-depth ">
      <table id="table-data" class="table  table-bordered table-striped table-condensed dataTable no-footer">
          <!-- <colgroup>
              <col width="2%">
              <col width="5%">
              <col width="5%">
              <col width="7%">
              <col width="10%">
              <col width="5%">
              <col width="15%">
              <col width="10%">
              <col width="10%">
              <col width="5%">
              <col width="10%">
          </colgroup> -->
          <thead>
              <tr style="background:#92241a;color:white">
                  <td style="white-space: inherit;vertical-align: middle" align="center"><b>STT</b></td>
                  <td style="white-space: inherit;vertical-align: middle" align="center"><b>Mã CP</b></td>
                  <td style="white-space: inherit;vertical-align: middle" align="center"><b>Sàn</b></td>
                  <td style="white-space: inherit;vertical-align: middle" align="center"><b>Nhóm nghành HĐKD</b></td>
                  <td style="white-space: inherit;vertical-align: middle" align="center"><b>Thời gian cập nhật</b></td>
                  <td style="white-space: inherit;vertical-align: middle" align="center"><b>Xếp hạng TA</b></td>
                  <td style="white-space: inherit;vertical-align: middle" align="center"><b>Nhận định Ta - Xu hướng CP</b></td>
                  <td style="white-space: inherit;vertical-align: middle" align="center"><b>Hành động</b></td>
                  <td style="white-space: inherit;vertical-align: middle" align="center"><b>Vùng giá giao dịch</b></td>
                  <td style="white-space: inherit;vertical-align: middle" align="center"><b>Vùng giá cắt lỗ</b></td>
                  <td style="white-space: inherit;vertical-align: middle" align="center"><b>Xếp hạng FA</b></td>
                  <td style="white-space: inherit;vertical-align: middle" align="center"><b>Phân tích DN FA</b></td>
              </tr>
          </thead>
            <tbody id="body_data">
            @foreach ($datas as $key => $data)
                @php $id = $data->id; @endphp
                <tr>
                        <td style="vertical-align: middle;" align="center">1</td>
                        <td class="td_code_cp_{{$id}}" style="vertical-align: middle;" align="center" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'code_cp')">
                          <span id="span_code_cp_{{$id}}" value="" class="span_code_cp_{{$id}}">{{$data->code_cp}}</span>
                        </td>
                        <td class="td_exchange_{{$id}}" style="vertical-align: middle;" align="center" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'exchange')">
                          <span id="span_exchange_{{$id}}" class="span_exchange_{{$id}}">{{$data->exchange}}</span>
                        </td>
                        <td class="td_code_category_{{$id}}" style="vertical-align: middle;white-space: inherit;" align="center" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'code_category')">
                        <span id="span_code_category_{{$id}}" class="span_code_category_{{$id}}">{{!empty($data->category) ? $data->category->name_category : ''}}</span>
                        </td>
                        <td class="td_created_at_{{$id}}" style="vertical-align: middle;white-space: inherit;" align="center" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'created_at')">
                          <span id="span_created_at_{{$id}}" class="span_created_at_{{$id}}">{{$data->created_at}}</span>
                        </td>
                        <td class="td_ratings_TA_{{$id}}" style="vertical-align: middle;" align="center" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'ratings_TA')">
                          <span id="span_ratings_TA_{{$id}}" class="span_ratings_TA_{{$id}}">{{$data->ratings_TA}}</span>
                        </td>
                        <td class="td_identify_trend_{{$id}}" align="center" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'identify_trend')">
                          <span id="span_identify_trend_{{$id}}" class="span_identify_trend_{{$id}}" 
                          style="display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;white-space: break-spaces;overflow:hidden;" title="{{$data->identify_trend}}">{{$data->identify_trend}}</span>
                        </td>
                        <td class="td_act_{{$id}}" style="vertical-align: middle;white-space: inherit;" align="center" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'act')">
                          <span id="span_act_{{$id}}" class="span_act_{{$id}}">{{$data->act}}</span>
                        </td>
                        <td class="td_trading_price_range_{{$id}}" style="vertical-align: middle;" align="center" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'trading_price_range')">
                          <span id="span_trading_price_range_{{$id}}" class="span_trading_price_range_{{$id}}">{{$data->trading_price_range}}</span>
                        </td>
                        <td class="td_stop_loss_price_zone_{{$id}}" style="vertical-align: middle;" align="center" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'stop_loss_price_zone')">
                          <span id="span_stop_loss_price_zone_{{$id}}" class="span_stop_loss_price_zone_{{$id}}">{{$data->stop_loss_price_zone}}</span>
                        </td>
                        <td class="td_ratings_FA_{{$id}}" style="vertical-align: middle;" align="center" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'ratings_FA')">
                          <span id="span_ratings_FA_{{$id}}" class="span_ratings_FA_{{$id}}">{{$data->ratings_FA}}</span>
                        </td>
                        <td style="vertical-align: middle;" align="center" onclick="{select_row(this);}">Xem chi tiết</i>
                        </td>
                    </tr>
                @endforeach
            </tbody>
      </table>
  </div>
</div>

