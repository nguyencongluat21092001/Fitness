<?php

namespace Modules\Base\Providers;

use Modules\Core\Ncl\Http\Debug\ApiDebug;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Request;
use Illuminate\Support\Facades\View;
use Modules\System\Models\MenuModel;
use Modules\System\Listtype\Helpers\ListtypeHelper;
use Modules\Core\Ncl\Db\Connection;
use Illuminate\Support\Facades\Auth;

class SystemServiceProvider extends ServiceProvider
{

    protected $prefix = '';
    protected $layout = '';
    protected $arrModules = '';
    protected $currentModule = '';
    protected $arrUnit = '';
    protected $middleware = '';

    public function register()
    {
    }

    public function boot()
    {
        $layouts = config('moduleInitConfig.layouts');
        foreach ($layouts as $key => $value) {
            if (Request::is($key) || Request::is($key . '/*')) {
                if ($value == 'System') {
                    $this->FunctionSystem($value, $key);
                }
            }
        }
    }

    public function FunctionSystem($layout, $url)
    {
        session_start();


        // $this->namespace = 'Modules\\' . $layout . '\Controllers';
        // $middleware = ['web', 'CheckAdminLogin'];
        // $this->middleware = $middleware;
        // // Get all Menu
        // $arrModules = config('moduleSystem');

        // $this->arrModules = $arrModules;
        // dd($arrModules);
        // foreach ($arrModules as $urlModule => $arrModule) {
        //     $urlcheck = $url . '/' . $urlModule;
        //     if (Request::is($urlcheck) || Request::is($urlcheck . '/*')) {
        //         $module = $urlModule;
        //         $this->currentModule = $module;
        //         view()->composer('*', function ($view) {
        //             $view->with('menuItems', $this->arrModules);
        //             $view->with('module', $this->currentModule);
        //         });
        //         $layout = 'System';
        //         $this->layout = $layout;
        //         $this->modules = $module;
        //         $this->prefix = $module;
        //         $this->namespace = 'Modules' . "\\" . $layout . "\\" . ucfirst($module) . '\Controllers';
        //         // Load routes
        //         Route::group([
        //             'namespace' => $this->namespace,
        //             'middleware' => $this->middleware,
        //             'module' => $this->modules,
        //             'prefix' => $url . '/' . strtolower($this->prefix)
        //         ], function ($router) {
        //             $this->loadRoutesFrom(base_path() . '/modules/' . $this->layout . '/' . ucfirst($this->modules) . '/routes.php');
        //         });
        //         // Load views
        //         $this->loadViewsFrom(base_path() . '/modules/' . $this->layout . '/' . $this->modules . '/Views', ucfirst($this->modules));
        //         // Translations
        //         $this->loadTranslationsFrom(base_path() . '/resources/lang', "System");
        //     }
        // }
    }
}
