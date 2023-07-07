<?php

namespace App\Policies;

use App\Models\Employees;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployeePolicy
{
    use HandlesAuthorization;
    /**
     * Create a new policy instance.
     */
    public const LIST = 'employee-list';
    public const MENU = 'employee-menu';
    public const CREATE = 'employee-create';
    public const EDIT = 'employee-edit';
    public const DELETE = 'employee-delete';
    public const INFO = 'employee-info';

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

    public function create(Employees $employee)
    {
        return $employee->hasPermission(static::CREATE);
    }

    public function edit(Employees $employee)
    {
        return $employee->hasPermission(static::EDIT);
    }

    public function delete(Employees $employee)
    {
        return $employee->hasPermission(static::DELETE);
    }

    public function info(Employees $employee)
    {
        return $employee->hasPermission(static::INFO);
    }
}
