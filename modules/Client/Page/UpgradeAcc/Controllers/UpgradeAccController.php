<?php

namespace Modules\Client\Page\UpgradeAcc\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use DB;

/**
 * Nâng cấp tk 
 *
 * @author Luatnc
 */
class UpgradeAccController extends Controller
{

    public function __construct(){
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
        return view('client.upgradeAcc.registerVip');
    }
}
