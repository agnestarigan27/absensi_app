<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated as RedirectIfAuthenticatedMiddleware;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;


class RedirectifAuthenticated extends RedirectIfAuthenticatedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response | JsonResponse
    {
        if(Auth::guard('operator')->check()){
            return redirect(route('operator.dashboard.index'));
        }else if(Auth::guard('siswa')->check()){
            return redirect(route('siswa.dashboard.index'));
        }else if(Auth::guard('guru')->check()){
            return redirect(to: route('guru.dashboard.index'));
        }else if(Auth::guard('orangtua')->check()){
            return redirect(route('orangtua.dashboard.index'));
        } 
        return $next($request);
    }
}
