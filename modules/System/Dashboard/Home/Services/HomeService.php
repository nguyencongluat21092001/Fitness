<?php

namespace Modules\System\Dashboard\Home\Services;

use Illuminate\Support\Facades\Hash;
use Modules\Base\Service;
use Modules\System\Dashboard\Home\Repositories\HomeRepository;
use Str;

class HomeService extends Service
{

    public function __construct(
        HomeRepository $HomeRepository
        )
    {
        parent::__construct();
        $this->HomeRepository = $HomeRepository;
        parent::__construct();
    }

    public function repository()
    {
        return HomeRepository::class;
    }

    public function store($input){
        if($input['id'] != ''){
            $arrData = [
                'name'=>$input['name'],
                'address'=>$input['address'],
                'phone'=>$input['phone'],
                'email'=>$input['email'],
                'password'=> Hash::make($input['password']),
                'dateBirth'=>$input['dateBirth'],
                'role'=>$input['is_checkbox_role']
            ];
            $create = $this->HomeRepository->where('id',$input['id'])->update($arrData);
        }else{
            $arrData = [
                'name'=>$input['name'],
                'address'=>$input['address'],
                'phone'=>$input['phone'],
                'email'=>$input['email'],
                'password'=> Hash::make($input['password']),
                'dateBirth'=>$input['dateBirth'],
                'role'=>$input['is_checkbox_role']
            ];
            $create = $this->HomeRepository->create($arrData);
        }
        
        return $create;
    }
    public function loadList($arrInput){
        $data = array();
        $param = $arrInput;
        $objResult = $this->repository->filter($param);
        $data['datas'] = $objResult;
        $data['param'] = $param;
        $data['pagination'] = $data['datas']->links('pagination.default');
        return $create;
    }
   

}
