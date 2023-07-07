<?php

namespace App\Policies;

use App\Models\Employees;
use App\Models\Roles;

use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;
    /**
     * Create a new policy instance.
     */
    public const LIST = 'role-list';
    public const MENU = 'role-menu';
    public const CREATE = 'role-create';
    public const EDIT = 'role-edit';
    public const DELETE = 'role-delete';

    public function __construct()
    {
        //
    }
    
    public function menu(Employees $employee, Roles $model = null)
    {
        return $employee->hasPermission(static::MENU);
    }

    public function view(Employees $employee, Roles $model = null)
    {
        return $employee->hasPermission(static::LIST);
    }

    public function create(Employees $employee, Roles $model = null)
    {
        return $employee->hasPermission(static::CREATE);
    }

    public function edit(Employees $employee, Roles $model = null)
    {
        return $employee->hasPermission(static::EDIT);
    }


    public function delete(Employees $employee, Roles $model = null)
    {
        return $employee->hasPermission(static::DELETE);
    }
}
