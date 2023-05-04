<?php

namespace Modules\Client\Page\Home\Services;

use Illuminate\Support\Facades\Hash;
use Modules\Base\Service;
use Modules\Client\Page\Home\Repositories\HomeRepository;
use Illuminate\Support\Facades\Http;
use Str;

class HomeService
{

    public function __construct(){}
     /**
     * load màn hình danh sách lấy chỉ số thị trường
     *
     * @param Request $request
     *
     * @return json $return
     */
    public function loadList($arrInput){
        try{
            $param = [
                'code'=> $arrInput['type_code'],
                'startDate'=> $arrInput['fromDate'],
                'endDate'=> $arrInput['toDate'],
                'limit'=> $arrInput['limit'],
            ];
            $dataConfig = config('apiConnect.financial');
            $urlApi = $dataConfig['api'].$dataConfig['apiChild']['list-coin-code'];
            $response = Http::withToken($dataConfig['token'])
                            ->withBody(json_encode($param),'application/json')
                            ->get($urlApi);
            $response = $response->getBody()->getContents();
            $response = json_decode($response,true);
            $data['datas'] = $response;

            if($data['datas'] == null || $data['datas'] == ''){
                $data['datas'][0] = [
                    "date" => date('Y-m-d'),
                    "symbol" => "VNINDEX",
                    "priceHigh" => 'Không xác định!'
                ];
            }
            return $data;
        }catch (\Exception $e) {
            $data['datas'][0] = [
                "date" => date('Y-m-d'),
                "symbol" => "VNINDEX",
                "priceHigh" => 'Không xác định!'
            ];
            return $data;
        }
        
    }
}
