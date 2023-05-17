<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Modules\Client\Page\DataFinancial\Controllers\DataFinancialController as ClientDataFinancialController;
use Modules\Client\Page\Home\Controllers\HomeController as ClientHomeController;
use Modules\System\Dashboard\Dashboards\Controllers\DashboardController;
use Modules\System\Dashboard\Blog\Controllers\BlogController;
use Modules\System\Dashboard\Category\Controllers\CateController;
use Modules\System\Dashboard\Category\Controllers\CategoryController;
use Modules\System\Dashboard\DataFinancial\Controllers\DataFinancialController;
use Modules\System\Dashboard\Handbook\Controllers\HandbookController;
use Modules\System\Dashboard\Home\Controllers\HomeController;
use Modules\System\Dashboard\Users\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('auth.login');
// });
// Route::get('/', function (\Modules\System\Dashboard\GoogleSheet\Services\GoogleSheet $googleSheet) {
//     $googleSheet->readGoogleSheet();
//     // return view('auth.login');
// });
Route::get('/', [ClientHomeController::class, 'index']);
// Route::get('/login', function () {
//     return view('auth.signin');
// });
Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/404_notFound', function () {
    return view('dashboard.home.404_notFound');
})->name('404_notFound');
Route::post('/system/home', [LoginController::class, 'checkLogin'])->name('checkLogin');
Route::get('/login', [LoginController::class, 'logout'])->name('login');
Route::get('/system/login', [LoginController::class, 'logout'])->name('fromLogin');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::middleware('checkloginAdmin')->group(function () {
        // quản trị người dùng
        Route::prefix('/system/user')->group(function () {
            Route::get('/index', [UserController::class, 'index']);
            Route::get('/loadList',[UserController::class,'loadList']);
            Route::post('/edit', [UserController::class,'edit']);
            Route::post('/createForm', [UserController::class,'createForm']);
            Route::post('/create', [UserController::class,'create']);
            Route::post('/delete', [UserController::class,'delete']);
            // Cập nhật mật khẩu
            Route::get('/changePass', [UserController::class,'changePass'])->name('changePass');
            Route::post('/updatePass', [UserController::class,'updatePass'])->name('updatePass');
        });
         //dữ liệu chứng khoán
         Route::prefix('/system/datafinancial')->group(function () {
            //Handbook
            Route::get('/index', [DataFinancialController::class, 'index']);
            Route::get('/loadList',[DataFinancialController::class,'loadList']);
            Route::post('/createForm',[DataFinancialController::class,'createForm']);
            Route::post('/create',[DataFinancialController::class,'create']);
            Route::get('/changeUpdate',[DataFinancialController::class,'changeUpdate']);
            Route::post('/edit',[DataFinancialController::class,'edit']);
            Route::post('/delete',[DataFinancialController::class,'delete']);
            Route::post('/updateDataFinancial',[DataFinancialController::class,'updateDataFinancial']);
        });
    });
    Route::prefix('/system')->group(function () {
        // quản trị danh mục - thể loại
        Route::prefix('/category')->group(function () {
            //Danh mục
            Route::post('/createForm',[CateController::class,'createForm']);
            Route::post('/create',[CateController::class,'create']);
            Route::post('/edit',[CateController::class,'edit']);
            Route::post('/delete',[CateController::class,'delete']);
            Route::get('/index', [CateController::class, 'index']);
            Route::get('/loadList',[CateController::class,'loadList']);
            Route::post('/updateCategory',[CateController::class,'updateCategory']);
            Route::post('/changeStatusCate',[CateController::class,'changeStatusCate']);
            //thể loại
            Route::get('/indexCategory', [CategoryController::class, 'indexCategory']);
            Route::get('/loadListCategory',[CategoryController::class,'loadListCategory']);
            Route::post('/createFormCategory',[CategoryController::class,'createFormCategory']);
            Route::post('/createCategory',[CategoryController::class,'createCategory']);
            Route::post('/editCategory',[CategoryController::class,'edit']);
            Route::post('/deleteCategory',[CategoryController::class,'delete']);
            Route::post('/updateCategoryCate',[CategoryController::class,'updateCategoryCate']);
            Route::post('/changeStatusCategoryCate',[CategoryController::class,'changeStatusCategoryCate']);
        });
        //bài viết 
        Route::prefix('/blog')->group(function () {
            Route::get('/index', [BlogController::class, 'index']);
            Route::get('/loadList',[BlogController::class,'loadList']);
            Route::post('/edit', [BlogController::class,'edit']);
            Route::post('/createForm', [BlogController::class,'createForm']);
            Route::post('/create', [BlogController::class,'create']);
            Route::post('/delete', [BlogController::class,'delete']);
            Route::get('/infor',[BlogController::class,'infor']);

        });
        // 
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        //Cập nhật giao diện sáng tối
        Route::get('/userInfo/index', [UserController::class, 'indexUserInfo'])->name('userInfoIndex');
        Route::post('/userInfo/editColorView', [UserController::class, 'editColorView']);
        // Trang chủ Admin
        Route::prefix('/home')->group(function () {
            Route::get('/index', [HomeController::class, 'index']);
            Route::get('/loadList',[HomeController::class,'loadList']);
            Route::get('/loadListTap1',[HomeController::class,'loadListTap1'])->name('loadListTap1');
            Route::get('/realTimeData',[HomeController::class,'realTimeData'])->name('realTimeData');
        });
        //Cẩm nâng
        Route::prefix('/handbook')->group(function () {
            //Handbook
            Route::get('/index', [HandbookController::class, 'index']);
            Route::get('/loadList',[HandbookController::class,'loadList'])->name('loadList');
            Route::post('/createForm',[HandbookController::class,'createForm']);
            Route::post('/create',[HandbookController::class,'create'])->name('create');
            Route::post('/edit',[HandbookController::class,'edit'])->name('edit');
            Route::post('/delete',[HandbookController::class,'delete'])->name('delete');
            Route::get('/seeVideo',[HandbookController::class,'seeVideo'])->name('seeVideo');
        });
       
    });
});
// route phía người dùng
// Route::middleware('permissionCheckLoginClient')->group(function () {
    Route::prefix('/client')->group(function () {
        // Trang chủ client
        Route::get('/home/index', [ClientHomeController::class, 'index']);
        Route::get('/home/loadList',[ClientHomeController::class,'loadList']);
        Route::get('/home/loadListBlog',[ClientHomeController::class,'loadListBlog']);
        Route::get('/home/loadListTap1',[ClientHomeController::class,'loadListTap1']);
        Route::get('/home/loadListTop',[ClientHomeController::class,'loadListTop']);
        Route::get('/home/loadListChartNen',[ClientHomeController::class,'loadListChartNen']);

    });
    Route::prefix('/client/dataFinancial')->group(function () {
        // Tra cứu cổ phiếu
        Route::get('/index', [ClientDataFinancialController::class, 'index']);
        Route::post('/loadData', [ClientDataFinancialController::class, 'loadData']);
        Route::post('/fireAntChart', [ClientDataFinancialController::class, 'fireAntChart']);
        Route::post('/searchDataCP', [ClientDataFinancialController::class, 'searchDataCP']);
        Route::get('/noteTaFa', [ClientDataFinancialController::class, 'noteTaFa']);

        // tín hiệu mua
        Route::get('/signalIndex', [ClientDataFinancialController::class, 'signalIndex']);
        Route::post('/loadList_signal', [ClientDataFinancialController::class, 'loadList_signal']);
        // khuyến nghị vip
        Route::get('/recommendationsIndex', [ClientDataFinancialController::class, 'recommendationsIndex']);
        Route::post('/loadList_recommendations', [ClientDataFinancialController::class, 'loadList_recommendations']);
        // Route::get('/loadList',[Modules\Client\Page\Home\Controllers\HomeController::class,'loadList']);
        // Route::get('/loadListBlog',[Modules\Client\Page\Home\Controllers\HomeController::class,'loadListBlog']);
        // Route::get('/loadListTap1',[Modules\Client\Page\Home\Controllers\HomeController::class,'loadListTap1']);
        // Route::get('/loadListTop',[Modules\Client\Page\Home\Controllers\HomeController::class,'loadListTop']);
        // Route::get('/loadListChartNen',[Modules\Client\Page\Home\Controllers\HomeController::class,'loadListChartNen']);

    });
// });
Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/test/{userInfo_id}', [App\Http\Controllers\HomeController::class, 'editTest']);

