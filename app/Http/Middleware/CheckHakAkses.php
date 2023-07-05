<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckHakAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, int $level_akses): Response
    {
        if($level_akses === session('level_akses'))
            return $next($request);

        toast('Anda tidak berhak mengakses halaman ini.', 'error');
        return redirect()->back();
    }
}
