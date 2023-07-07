<?php

namespace App\Policies;

use App\Models\Attendances;
use App\Models\Employees;
use Illuminate\Auth\Access\Response;

class AttendancesPolicy
{
    public const MENU = 'attendance-menu';
    public const LIST = 'attendance-list';
    public const CREATE = 'attendance-create';
    public const EDIT = 'attendance-edit';
    public const DELETE = 'attendance-delete';
    public const DETAIL = 'attendance-detail';
    public const TODAY = 'attendance-today';
    /**
     * Determine whether the user can view any models.
     */
    public function menu(Employees $employee)
    {
        return $employee->hasPermission(static::MENU);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Employees $employee)
    {
        return $employee->hasPermission(static::LIST);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Employees $employee)
    {
        return $employee->hasPermission(static::CREATE);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function edit(Employees $employee, Attendances $attendances = null)
    {
        return $employee->hasPermission(static::EDIT);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Employees $employee, Attendances $attendances = null)
    {
        return $employee->hasPermission(static::DELETE);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function detail(Employees $employee, Attendances $attendances = null)
    {
        return $employee->hasPermission(static::DETAIL);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function today(Employees $employee, Attendances $attendances = null)
    {
        return $employee->hasPermission(static::TODAY);
    }
}
