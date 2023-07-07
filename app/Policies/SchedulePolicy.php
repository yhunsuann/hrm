<?php

namespace App\Policies;

use App\Models\Employees;

class SchedulePolicy
{
    public const LIST = 'role-list';
    public const MENU = 'role-menu';
    public const CREATE = 'role-create';
    public const EDIT = 'role-edit';
    public const DELETE = 'role-delete';

    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function menu(Employees $employee)
    {
        return $employee->hasPermission(static::MENU);
    }

    public function view(Employees $employee)
    {
        return $employee->hasPermission(static::LIST);
    }

    public function edit(Employees $employee)
    {
        return $employee->hasPermission(static::EDIT);
    }

    public function create(Employees $employee)
    {
        return $employee->hasPermission(static::CREATE);
    }

    public function delete(Employees $employee)
    {
        return $employee->hasPermission(static::DELETE);
    }
}
