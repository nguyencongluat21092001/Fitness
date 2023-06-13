<?php

namespace Modules\Client\Page\UpgradeAcc\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Modules\System\Dashboard\Users\Services\UserService;
use DB;

/**
 * Nâng cấp tk 
 *
 * @author Luatnc
 */
class UpgradeAccController extends Controller
{

    public function __construct(
        UserService $userService
    ){
        $this->userService = $userService;
    }
     /**
     * load màn hình 
     *
     * @return view
     */
    public function index(Request $request)
    {
        return view('client.upgradeAcc.index');
    }
    /**
     * Hiển thị màn hình nâng cấp
     *
     * @return view
     */
    public function registerVip(Request $request)
    {
        $account = $this->userService->find($_SESSION['id']);
        $data = $account;
        $data['time_register'] = date('d-m-Y');
        return view('client.upgradeAcc.registerVip',compact('data'));
    }
}
