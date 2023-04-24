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
        Route::get('/system/user/index', [Modules\System\Dashboard\Users\Controllers\UserController::class, 'index']);
        Route::get('/system/user/loadList',[Modules\System\Dashboard\Users\Controllers\UserController::class,'loadList'])->name('loadList');
        Route::post('/system/user/edit', [Modules\System\Dashboard\Users\Controllers\UserController::class,'edit'])->name('edit');
        Route::post('/system/user/createForm', [Modules\System\Dashboard\Users\Controllers\UserController::class,'createForm'])->name('createForm');
        Route::post('/system/user/create', [Modules\System\Dashboard\Users\Controllers\UserController::class,'create'])->name('create');
        Route::post('/system/user/delete', [Modules\System\Dashboard\Users\Controllers\UserController::class,'delete'])->name('delete');
        // quản trị danh mục
        Route::post('/system/category/createForm',[Modules\System\Dashboard\Category\Controllers\CateController::class,'createForm'])->name('createForm');
        Route::post('/system/category/create',[Modules\System\Dashboard\Category\Controllers\CateController::class,'create'])->name('create');
        Route::post('/system/category/edit',[Modules\System\Dashboard\Category\Controllers\CateController::class,'edit'])->name('edit');
        Route::post('/system/category/delete',[Modules\System\Dashboard\Category\Controllers\CateController::class,'delete'])->name('delete');
    
    });
    //bài viết 
    Route::get('/system/blog/index', [Modules\System\Dashboard\Blog\Controllers\BlogController::class, 'index']);
    Route::get('/system/blog/loadList',[Modules\System\Dashboard\Blog\Controllers\BlogController::class,'loadList']);
    Route::post('/system/blog/edit', [Modules\System\Dashboard\Blog\Controllers\BlogController::class,'edit']);
    Route::post('/system/blog/createForm', [Modules\System\Dashboard\Blog\Controllers\BlogController::class,'createForm']);
    Route::post('/system/blog/create', [Modules\System\Dashboard\Blog\Controllers\BlogController::class,'create']);
    Route::post('/system/blog/delete', [Modules\System\Dashboard\Blog\Controllers\BlogController::class,'delete']);

    // 
    Route::get('/system/dashboard', [Modules\System\Dashboard\Dashboards\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/system/user/changePass', [Modules\System\Dashboard\Users\Controllers\UserController::class,'changePass'])->name('changePass');
    Route::post('/system/user/updatePass', [Modules\System\Dashboard\Users\Controllers\UserController::class,'updatePass'])->name('updatePass');
    Route::get('/system/userInfo/index', [Modules\System\Dashboard\Users\Controllers\UserController::class, 'indexUserInfo'])->name('userInfoIndex');
    Route::post('/system/userInfo/editColorView', [Modules\System\Dashboard\Users\Controllers\UserController::class, 'editColorView']);

    //cate
    Route::get('/system/category/index', [Modules\System\Dashboard\Category\Controllers\CateController::class, 'index']);
    Route::get('/system/category/loadList',[Modules\System\Dashboard\Category\Controllers\CateController::class,'loadList'])->name('loadList');
  
    //category
    Route::get('/system/category/indexCategory', [Modules\System\Dashboard\Category\Controllers\CategoryController::class, 'indexCategory']);
    Route::get('/system/category/loadListCategory',[Modules\System\Dashboard\Category\Controllers\CategoryController::class,'loadListCategory'])->name('loadListCategory');
    Route::post('/system/category/createFormCategory',[Modules\System\Dashboard\Category\Controllers\CategoryController::class,'createFormCategory'])->name('createFormCategory');
    Route::post('/system/category/createCategory',[Modules\System\Dashboard\Category\Controllers\CategoryController::class,'createCategory'])->name('createCategory');
    Route::post('/system/category/editCategory',[Modules\System\Dashboard\Category\Controllers\CategoryController::class,'edit'])->name('editCategory');
    Route::post('/system/category/deleteCategory',[Modules\System\Dashboard\Category\Controllers\CategoryController::class,'delete'])->name('deleteCategory');

    // }
    Route::get('/system/home/index', [Modules\System\Dashboard\Home\Controllers\HomeController::class, 'index']);
    Route::get('/system/home/loadList',[Modules\System\Dashboard\Home\Controllers\HomeController::class,'loadList'])->name('loadList');
    Route::get('/system/home/loadListTap1',[Modules\System\Dashboard\Home\Controllers\HomeController::class,'loadListTap1'])->name('loadListTap1');

    
    //Handbook
    Route::get('/system/handbook/index', [Modules\System\Dashboard\Handbook\Controllers\HandbookController::class, 'index']);
    Route::get('/system/handbook/loadList',[Modules\System\Dashboard\Handbook\Controllers\HandbookController::class,'loadList'])->name('loadList');
    Route::post('/system/handbook/createForm',[Modules\System\Dashboard\Handbook\Controllers\HandbookController::class,'createForm'])->name('createForm');
    Route::post('/system/handbook/create',[Modules\System\Dashboard\Handbook\Controllers\HandbookController::class,'create'])->name('create');
    Route::post('/system/handbook/edit',[Modules\System\Dashboard\Handbook\Controllers\HandbookController::class,'edit'])->name('edit');
    Route::post('/system/handbook/delete',[Modules\System\Dashboard\Handbook\Controllers\HandbookController::class,'delete'])->name('delete');
    Route::get('/system/handbook/seeVideo',[Modules\System\Dashboard\Handbook\Controllers\HandbookController::class,'seeVideo'])->name('seeVideo');

});
// Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/test/{userInfo_id}', [App\Http\Controllers\HomeController::class, 'editTest']);

