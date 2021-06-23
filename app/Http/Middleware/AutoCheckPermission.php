<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class AutoCheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $route_name = $request->route()->getName();
        $permission =Permission ::whereRaw("FIND_IN_SET ('$route_name',route_name)")->first();
        $user=auth('admin')->user();
        if ($permission) {
            if ($user->can($permission->name) or  $user->hasRole('Super Admin')) {
                return $next($request);
            }
            abort(403);
        }
        abort(403);
    }
}
