<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckHakAksesMulti
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ... $level_akses): Response
    {
        if (in_array(session('level_akses'), $level_akses))
            return $next($request);

        toast('Anda tidak berhak mengakses halaman ini.', 'error');
        return redirect()->back();
    }
}
