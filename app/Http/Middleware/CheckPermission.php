<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Policies\EmployeePolicy;
use App\Policies\RolePolicy;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $permissions = [
            'employeeList',
            'employeeCreate',
            'employeeEdit',
            'employeeUpdate',
            'employeeDelete',
            'roleList',
            'roleCreate',
            'roleEdit',
            'roleUpdate',
            'roleDelete',
        ];
        
        $hasPermission = false;
    
        foreach ($permissions as $permission) {
            if ($request->user()->can($permission, auth()->user())) {
                $hasPermission = true;
                break;
            }
        }

        if (!$hasPermission) {
            abort(403, 'Unauthorized');
        }
    
        return $next($request);
    }
}
