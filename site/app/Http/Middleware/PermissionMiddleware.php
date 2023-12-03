<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Exceptions\UnauthorizedException;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission = null, $guard = null)
    {
        //dd($request->route()->getName());
        $user = Auth::user();
        foreach($user->roles as $role){
            foreach($role->permissions as $permission){
                $permissions[]= $permission->name;
            }
        }
        if(in_array($request->route()->getName(),$permissions)){
            return $next($request);
        }
        throw UnauthorizedException::forPermissions($permissions);
    }
}
