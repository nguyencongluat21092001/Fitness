<?php

//Client
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Modules\Client\Page\About\Controllers\AboutController;
use Modules\Client\Page\DataFinancial\Controllers\DataFinancialController as ClientDataFinancialController;
use Modules\Client\Page\Des\Controllers\DesController;
use Modules\Client\Page\Home\Controllers\HomeController as ClientHomeController;
use Modules\Client\Page\Introduce\Controllers\IntroduceController;
use Modules\Client\Page\Infor\Controllers\InforController;
use Modules\Client\Page\Library\Controllers\LibraryController;
use Modules\Client\Page\Notification\Controllers\ReadNotificationController;
use Modules\Client\Page\Privileges\Controllers\PrivilegesController;
use Modules\Client\Page\UpgradeAcc\Controllers\UpgradeAccController;


//Dashboard
use Modules\System\Dashboard\ApprovePayment\Controllers\ApprovePaymentController;
use Modules\System\Dashboard\Dashboards\Controllers\DashboardController;
use Modules\System\Dashboard\Blog\Controllers\BlogController;
use Modules\System\Dashboard\Category\Controllers\CateController;
use Modules\System\Dashboard\Category\Controllers\CategoryController;
use Modules\System\Dashboard\DataFinancial\Controllers\DataFinancialController;
use Modules\System\Dashboard\Effective\Controllers\EffectiveController;
use Modules\System\Dashboard\Handbook\Controllers\HandbookController;
use Modules\System\Dashboard\Home\Controllers\HomeController;
use Modules\System\Dashboard\Recommended\Controllers\RecommendedController;
use Modules\System\Dashboard\Signal\Controllers\SignalController;
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
Route::post('register/send-otp/sent_OTP', [UserController::class, 'sent_OTP']);
Route::post('register/send-otp/sent_OTP', [UserController::class, 'sent_OTP']);
Route::get('/register', [RegisterController::class, 'registerIntroduce']);

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
            Route::post('/changeStatus', [UserController::class,'changeStatus']);
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
        // quản trị danh mục khuyến nghị
        Route::prefix('/recommended')->group(function () {
            //Danh mục khuyến nghị
            Route::get('/index', [RecommendedController::class, 'index']);
            Route::post('/add',[RecommendedController::class,'add']);
            Route::post('/create',[RecommendedController::class,'create']);
            Route::post('/edit',[RecommendedController::class,'edit']);
            Route::post('/delete',[RecommendedController::class,'delete']);
            Route::get('/loadList',[RecommendedController::class,'loadList']);
            Route::post('/updateColumn',[RecommendedController::class,'updateColumn']);
            Route::post('/changeStatus',[RecommendedController::class,'changeStatus']);
        });
        Route::prefix('/effectiveness')->group(function () {
            // Hiệu quả danh mục
            Route::get('/index', [EffectiveController::class, 'index']);
            Route::post('/add',[EffectiveController::class,'add']);
            Route::post('/create',[EffectiveController::class,'create']);
            Route::post('/edit',[EffectiveController::class,'edit']);
            Route::post('/delete',[EffectiveController::class,'delete']);
            Route::get('/loadList',[EffectiveController::class,'loadList']);
            Route::post('/updateColumn',[EffectiveController::class,'updateColumn']);
            Route::post('/changeStatus',[EffectiveController::class,'changeStatus']);
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
        //Tín hiệu mua
        Route::prefix('signal')->group(function(){
            Route::get('index', [SignalController::class, 'index']);
            Route::post('loadList', [SignalController::class, 'loadList']);
            Route::get('create', [SignalController::class, 'create']);
            Route::get('edit', [SignalController::class, 'edit']);
            Route::post('update', [SignalController::class, 'update']);
            Route::post('delete', [SignalController::class, 'delete']);
            Route::post('updateSignal', [SignalController::class, 'updateSignal']);
            Route::post('changeStatusSignal', [SignalController::class, 'changeStatusSignal']);
        });
        //Tín hiệu mua
        Route::prefix('approvepayment')->group(function(){
            Route::get('index', [ApprovePaymentController::class, 'index']);
            Route::post('loadList', [ApprovePaymentController::class, 'loadList']);
            Route::get('create', [ApprovePaymentController::class, 'create']);
            Route::get('edit', [ApprovePaymentController::class, 'edit']);
            Route::post('update', [ApprovePaymentController::class, 'update']);
            Route::post('delete', [ApprovePaymentController::class, 'delete']);
            Route::post('updateApprovePayment', [ApprovePaymentController::class, 'updateApprovePayment']);
            Route::post('changeStatusApprovePayment', [ApprovePaymentController::class, 'changeStatusApprovePayment']);
            Route::get('getUserVIP', [ApprovePaymentController::class, 'getUserVIP']);
        });
       
    });
});
// route phía người dùng
Route::prefix('/client')->group(function () {
    $arrModules = config('menuClient');
        $this->arrModules = $arrModules;
    view()->composer('*', function ($view) {
        $view->with('menuItems', $this->arrModules);
    });
    // Trang chủ client
    Route::get('/home/index', [ClientHomeController::class, 'index']);
    Route::get('/home/loadList',[ClientHomeController::class,'loadList']);
    Route::get('/home/loadListBlog',[ClientHomeController::class,'loadListBlog']);
    Route::get('/home/loadListTap1',[ClientHomeController::class,'loadListTap1']);
    Route::get('/home/loadListTop',[ClientHomeController::class,'loadListTop']);
    Route::get('/home/loadListChartNen',[ClientHomeController::class,'loadListChartNen']);

    Route::get('introduce/index', [IntroduceController::class, 'index']);
    Route::middleware('permissionCheckLoginClient')->group(function () {
        Route::get('infor/index', [InforController::class, 'index']);
        Route::post('infor/update', [InforController::class, 'update']);
        Route::middleware('checkloginDatafinancial')->group(function () {
            Route::prefix('datafinancial')->group(function () {
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
            
                // Danh mục Fintop
                Route::get('/categoryFintopIndex', [ClientDataFinancialController::class, 'categoryFintopIndex']);
                Route::post('/loadList_categoryFintop_vip', [ClientDataFinancialController::class, 'loadList_categoryFintop_vip']);
                Route::post('/loadList_categoryFintop_basic', [ClientDataFinancialController::class, 'loadList_categoryFintop_basic']);
            });
        });
        Route::prefix('about')->group(function () {
            // Tra cứu cổ phiếu
            Route::get('/index', [AboutController::class, 'index']);
            Route::get('/loadListTHTT', [AboutController::class, 'loadListTHTT']);
            Route::prefix('/session')->group(function(){
                Route::get('', [AboutController::class, 'session']);
                Route::get('/loadListTKP', [AboutController::class, 'loadListTKP']);
            });
            Route::prefix('/industry')->group(function(){
                Route::get('', [AboutController::class, 'industry']);
                Route::get('/loadListPTN', [AboutController::class, 'loadListPTN']);
            });
            Route::prefix('/stock')->group(function(){
                Route::get('', [AboutController::class, 'stock']);
                Route::get('/loadListPTCP', [AboutController::class, 'loadListPTCP']);
            });
            Route::post('/reader', [AboutController::class, 'reader']);
        });
        Route::prefix('des')->group(function () {
            Route::get('index', [DesController::class, 'index']);
        });
    });
    // Thư viện đầu tư
    Route::get('/library/index', [LibraryController::class, 'index']);
    Route::post('/library/loadList',[LibraryController::class,'loadList']);
    Route::get('/library/seeVideo',[LibraryController::class,'seeVideo']);
    // Đặc quyền hội viên
    Route::get('/privileges/index', [PrivilegesController::class, 'index']);

    // Nâng cấp tk 
    Route::get('/upgradeAcc/index', [UpgradeAccController::class, 'index']);
    // Đọc thông báo
    Route::get('readNotification', [ReadNotificationController::class, 'readNotification']);
});
 
Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/test/{userInfo_id}', [App\Http\Controllers\HomeController::class, 'editTest']);

