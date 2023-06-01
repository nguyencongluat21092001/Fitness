<?php

namespace Modules\Client\Page\Des\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * cẩm nang
 *
 * @author Luatnc
 */
class DesController extends Controller
{

    public function __construct(
    ){
    }

    /**
     * khởi tạo dữ liệu
     *
     * @return view
     */
    public function index(Request $request)
    {
        return view('client.des.home');
    }
    
}
