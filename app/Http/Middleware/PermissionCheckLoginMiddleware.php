<?php

namespace App\Http\Middleware;

use Closure;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Modules\System\Dashboard\PermissionLogin\Models\PermissionLoginModel;

class PermissionCheckLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check() && ($_SESSION["role"] == 'ADMIN' || $_SESSION["role"] == 'USERS')){
            $PermissionLogin = PermissionLoginModel::where('email',$_SESSION["email"])->first();
            if(isset($PermissionLogin) && ($_SESSION['token'] == $PermissionLogin->token)){
                return $next($request);
            }
            return redirect()->route('login');
        };
        return redirect()->route('404_notFound');
    }
}
