<?php

namespace App\Http\Middleware;

use Closure;
use App\Providers\RouteServiceProvider;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check() && ($_SESSION["role"] == 'ADMIN' || $_SESSION["role"] == 'MANAGE' || $_SESSION["role"] == 'CV_ADMIN' || $_SESSION["role"] == 'CV_PRO' || $_SESSION["role"] == 'SALE_ADMIN')){
            return $next($request);
        };
        return redirect()->route('404_notFound');
    }
}
