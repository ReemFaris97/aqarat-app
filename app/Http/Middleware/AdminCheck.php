<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth('admin')->check() && auth('admin')->user()->status == 1)
            return $next($request);
        else
            \Auth::guard('admin')->logout();
        toastr()->success('عفوا الحساب غير مفعل');
        return redirect()->route('admin.login');
    }
}
