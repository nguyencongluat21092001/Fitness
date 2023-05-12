<?php

use Illuminate\Support\Facades\Route;
use Modules\System\Dashboard\Users\Controllers\UserController;
use Modules\System\Dashboard\Dashboards\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;

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
Route::get('/', [Modules\Client\Page\Home\Controllers\HomeController::class, 'index']);
// Route::get('/login', function () {
//     return view('auth.signin');
// });
Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/404_notFound', function () {
    return view('dashboard.home.404_notFound');
})->name('404_notFound');
Route::post('/system/home', [App\Http\Controllers\Auth\LoginController::class, 'checkLogin'])->name('checkLogin');
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('login');
Route::get('/system/login', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('fromLogin');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::middleware('checkloginAdmin')->group(function () {
        // quản trị người dùng
        Route::prefix('/system/user')->group(function () {
            Route::get('/index', [Modules\System\Dashboard\Users\Controllers\UserController::class, 'index']);
            Route::get('/loadList',[Modules\System\Dashboard\Users\Controllers\UserController::class,'loadList']);
            Route::post('/edit', [Modules\System\Dashboard\Users\Controllers\UserController::class,'edit']);
            Route::post('/createForm', [Modules\System\Dashboard\Users\Controllers\UserController::class,'createForm']);
            Route::post('/create', [Modules\System\Dashboard\Users\Controllers\UserController::class,'create']);
            Route::post('/delete', [Modules\System\Dashboard\Users\Controllers\UserController::class,'delete']);
            // Cập nhật mật khẩu
            Route::get('/changePass', [Modules\System\Dashboard\Users\Controllers\UserController::class,'changePass'])->name('changePass');
            Route::post('/updatePass', [Modules\System\Dashboard\Users\Controllers\UserController::class,'updatePass'])->name('updatePass');
        });
         //dữ liệu chứng khoán
         Route::prefix('/system/datafinancial')->group(function () {
            //Handbook
            Route::get('/index', [Modules\System\Dashboard\DataFinancial\Controllers\DataFinancialController::class, 'index']);
            Route::get('/loadList',[Modules\System\Dashboard\DataFinancial\Controllers\DataFinancialController::class,'loadList']);
            Route::post('/createForm',[Modules\System\Dashboard\DataFinancial\Controllers\DataFinancialController::class,'createForm']);
            Route::post('/create',[Modules\System\Dashboard\DataFinancial\Controllers\DataFinancialController::class,'create']);
            Route::get('/changeUpdate',[Modules\System\Dashboard\DataFinancial\Controllers\DataFinancialController::class,'changeUpdate']);
            Route::post('/edit',[Modules\System\Dashboard\DataFinancial\Controllers\DataFinancialController::class,'edit']);
            Route::post('/delete',[Modules\System\Dashboard\DataFinancial\Controllers\DataFinancialController::class,'delete']);
            Route::post('/updateDataFinancial',[Modules\System\Dashboard\DataFinancial\Controllers\DataFinancialController::class,'updateDataFinancial']);
        });
    });
    Route::prefix('/system')->group(function () {
        // quản trị danh mục - thể loại
        Route::prefix('/category')->group(function () {
            //Danh mục
            Route::post('/createForm',[Modules\System\Dashboard\Category\Controllers\CateController::class,'createForm']);
            Route::post('/create',[Modules\System\Dashboard\Category\Controllers\CateController::class,'create']);
            Route::post('/edit',[Modules\System\Dashboard\Category\Controllers\CateController::class,'edit']);
            Route::post('/delete',[Modules\System\Dashboard\Category\Controllers\CateController::class,'delete']);
            Route::get('/index', [Modules\System\Dashboard\Category\Controllers\CateController::class, 'index']);
            Route::get('/loadList',[Modules\System\Dashboard\Category\Controllers\CateController::class,'loadList']);
            Route::post('/updateCategory',[Modules\System\Dashboard\Category\Controllers\CateController::class,'updateCategory']);
            Route::post('/changeStatusCate',[Modules\System\Dashboard\Category\Controllers\CateController::class,'changeStatusCate']);
            //thể loại
            Route::get('/indexCategory', [Modules\System\Dashboard\Category\Controllers\CategoryController::class, 'indexCategory']);
            Route::get('/loadListCategory',[Modules\System\Dashboard\Category\Controllers\CategoryController::class,'loadListCategory']);
            Route::post('/createFormCategory',[Modules\System\Dashboard\Category\Controllers\CategoryController::class,'createFormCategory']);
            Route::post('/createCategory',[Modules\System\Dashboard\Category\Controllers\CategoryController::class,'createCategory']);
            Route::post('/editCategory',[Modules\System\Dashboard\Category\Controllers\CategoryController::class,'edit']);
            Route::post('/deleteCategory',[Modules\System\Dashboard\Category\Controllers\CategoryController::class,'delete']);
            Route::post('/updateCategoryCate',[Modules\System\Dashboard\Category\Controllers\CategoryController::class,'updateCategoryCate']);
            Route::post('/changeStatusCategoryCate',[Modules\System\Dashboard\Category\Controllers\CategoryController::class,'changeStatusCategoryCate']);
        });
        //bài viết 
        Route::prefix('/blog')->group(function () {
            Route::get('/index', [Modules\System\Dashboard\Blog\Controllers\BlogController::class, 'index']);
            Route::get('/loadList',[Modules\System\Dashboard\Blog\Controllers\BlogController::class,'loadList']);
            Route::post('/edit', [Modules\System\Dashboard\Blog\Controllers\BlogController::class,'edit']);
            Route::post('/createForm', [Modules\System\Dashboard\Blog\Controllers\BlogController::class,'createForm']);
            Route::post('/create', [Modules\System\Dashboard\Blog\Controllers\BlogController::class,'create']);
            Route::post('/delete', [Modules\System\Dashboard\Blog\Controllers\BlogController::class,'delete']);
            Route::get('/infor',[Modules\System\Dashboard\Blog\Controllers\BlogController::class,'infor']);

        });
        // 
        Route::get('/dashboard', [Modules\System\Dashboard\Dashboards\Controllers\DashboardController::class, 'index'])->name('dashboard');
        //Cập nhật giao diện sáng tối
        Route::get('/userInfo/index', [Modules\System\Dashboard\Users\Controllers\UserController::class, 'indexUserInfo'])->name('userInfoIndex');
        Route::post('/userInfo/editColorView', [Modules\System\Dashboard\Users\Controllers\UserController::class, 'editColorView']);
        // Trang chủ Admin
        Route::prefix('/home')->group(function () {
            Route::get('/index', [Modules\System\Dashboard\Home\Controllers\HomeController::class, 'index']);
            Route::get('/loadList',[Modules\System\Dashboard\Home\Controllers\HomeController::class,'loadList']);
            Route::get('/loadListTap1',[Modules\System\Dashboard\Home\Controllers\HomeController::class,'loadListTap1'])->name('loadListTap1');
            Route::get('/realTimeData',[Modules\System\Dashboard\Home\Controllers\HomeController::class,'realTimeData'])->name('realTimeData');
        });
        //Cẩm nâng
        Route::prefix('/handbook')->group(function () {
            //Handbook
            Route::get('/index', [Modules\System\Dashboard\Handbook\Controllers\HandbookController::class, 'index']);
            Route::get('/loadList',[Modules\System\Dashboard\Handbook\Controllers\HandbookController::class,'loadList'])->name('loadList');
            Route::post('/createForm',[Modules\System\Dashboard\Handbook\Controllers\HandbookController::class,'createForm']);
            Route::post('/create',[Modules\System\Dashboard\Handbook\Controllers\HandbookController::class,'create'])->name('create');
            Route::post('/edit',[Modules\System\Dashboard\Handbook\Controllers\HandbookController::class,'edit'])->name('edit');
            Route::post('/delete',[Modules\System\Dashboard\Handbook\Controllers\HandbookController::class,'delete'])->name('delete');
            Route::get('/seeVideo',[Modules\System\Dashboard\Handbook\Controllers\HandbookController::class,'seeVideo'])->name('seeVideo');
        });
       
    });
});
// route phía người dùng
Route::middleware('permissionCheckLoginClient')->group(function () {
    Route::prefix('/client')->group(function () {
        // Trang chủ client
        Route::get('/home/index', [Modules\Client\Page\Home\Controllers\HomeController::class, 'index']);
        Route::get('/home/loadList',[Modules\Client\Page\Home\Controllers\HomeController::class,'loadList']);
        Route::get('/home/loadListBlog',[Modules\Client\Page\Home\Controllers\HomeController::class,'loadListBlog']);
        Route::get('/home/loadListTap1',[Modules\Client\Page\Home\Controllers\HomeController::class,'loadListTap1']);
        Route::get('/home/loadListTop',[Modules\Client\Page\Home\Controllers\HomeController::class,'loadListTop']);
    });
});
// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/test/{userInfo_id}', [App\Http\Controllers\HomeController::class, 'editTest']);

