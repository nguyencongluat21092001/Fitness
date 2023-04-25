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
Route::get('/', function () {
    return view('client.home.home');
});
Route::get('/login', function () {
    return view('auth.signin');
});
Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/404_notFound', function () {
    return view('dashboard.home.404_notFound');
})->name('404_notFound');
Route::post('/system/home', [App\Http\Controllers\Auth\LoginController::class, 'checkLogin'])->name('checkLogin');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::middleware('checklogin')->group(function () {
        // quản trị người dùng
        Route::prefix('/system/user')->group(function () {
            Route::get('/index', [Modules\System\Dashboard\Users\Controllers\UserController::class, 'index']);
            Route::get('/loadList',[Modules\System\Dashboard\Users\Controllers\UserController::class,'loadList'])->name('loadList');
            Route::post('/edit', [Modules\System\Dashboard\Users\Controllers\UserController::class,'edit'])->name('edit');
            Route::post('/createForm', [Modules\System\Dashboard\Users\Controllers\UserController::class,'createForm']);
            Route::post('/create', [Modules\System\Dashboard\Users\Controllers\UserController::class,'create'])->name('create');
            Route::post('/delete', [Modules\System\Dashboard\Users\Controllers\UserController::class,'delete'])->name('delete');
            // Cập nhật mật khẩu
            Route::get('/changePass', [Modules\System\Dashboard\Users\Controllers\UserController::class,'changePass'])->name('changePass');
            Route::post('/updatePass', [Modules\System\Dashboard\Users\Controllers\UserController::class,'updatePass'])->name('updatePass');
        });
    });
    Route::prefix('/system')->group(function () {
        // quản trị danh mục - thể loại
        Route::prefix('/category')->group(function () {
            //Danh mục
            Route::post('/createForm',[Modules\System\Dashboard\Category\Controllers\CateController::class,'createForm']);
            Route::post('/create',[Modules\System\Dashboard\Category\Controllers\CateController::class,'create'])->name('create');
            Route::post('/edit',[Modules\System\Dashboard\Category\Controllers\CateController::class,'edit'])->name('edit');
            Route::post('/delete',[Modules\System\Dashboard\Category\Controllers\CateController::class,'delete'])->name('delete');
            Route::get('/index', [Modules\System\Dashboard\Category\Controllers\CateController::class, 'index']);
            Route::get('/loadList',[Modules\System\Dashboard\Category\Controllers\CateController::class,'loadList'])->name('loadList');
            //thể loại
            Route::get('/indexCategory', [Modules\System\Dashboard\Category\Controllers\CategoryController::class, 'indexCategory']);
            Route::get('/loadListCategory',[Modules\System\Dashboard\Category\Controllers\CategoryController::class,'loadListCategory'])->name('loadListCategory');
            Route::post('/createFormCategory',[Modules\System\Dashboard\Category\Controllers\CategoryController::class,'createFormCategory'])->name('createFormCategory');
            Route::post('/createCategory',[Modules\System\Dashboard\Category\Controllers\CategoryController::class,'createCategory'])->name('createCategory');
            Route::post('/editCategory',[Modules\System\Dashboard\Category\Controllers\CategoryController::class,'edit'])->name('editCategory');
            Route::post('/deleteCategory',[Modules\System\Dashboard\Category\Controllers\CategoryController::class,'delete'])->name('deleteCategory');
        });
        Route::prefix('/blog')->group(function () {
            //bài viết 
            Route::get('/index', [Modules\System\Dashboard\Blog\Controllers\BlogController::class, 'index']);
            Route::get('/loadList',[Modules\System\Dashboard\Blog\Controllers\BlogController::class,'loadList']);
            Route::post('/edit', [Modules\System\Dashboard\Blog\Controllers\BlogController::class,'edit']);
            Route::post('/createForm', [Modules\System\Dashboard\Blog\Controllers\BlogController::class,'createForm']);
            Route::post('/create', [Modules\System\Dashboard\Blog\Controllers\BlogController::class,'create']);
            Route::post('/delete', [Modules\System\Dashboard\Blog\Controllers\BlogController::class,'delete']);
        });
        // 
        Route::get('/dashboard', [Modules\System\Dashboard\Dashboards\Controllers\DashboardController::class, 'index'])->name('dashboard');
        //Cập nhật giao diện sáng tối
        Route::get('/userInfo/index', [Modules\System\Dashboard\Users\Controllers\UserController::class, 'indexUserInfo'])->name('userInfoIndex');
        Route::post('/userInfo/editColorView', [Modules\System\Dashboard\Users\Controllers\UserController::class, 'editColorView']);
        // Trang chủ Admin
        Route::get('/home/index', [Modules\System\Dashboard\Home\Controllers\HomeController::class, 'index']);
        Route::get('/home/loadList',[Modules\System\Dashboard\Home\Controllers\HomeController::class,'loadList'])->name('loadList');
        Route::get('/home/loadListTap1',[Modules\System\Dashboard\Home\Controllers\HomeController::class,'loadListTap1'])->name('loadListTap1');
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
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/test/{userInfo_id}', [App\Http\Controllers\HomeController::class, 'editTest']);

