<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();
        if ($user){
            $permissions = Permission::get();
//            $permissions = $user->role->permissions;
            foreach ($permissions as $permission){
                \Illuminate\Support\Facades\Gate::define($permission->name, function (User $user) use ($permission){
                    return $user->hasPermissionTo($permission->name);
                });
            }
        }
        return $next($request);
    }


}
