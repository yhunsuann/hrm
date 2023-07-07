<?php

namespace App\Policies;

use App\Models\Employees;
use App\Models\RequestOffs;
use Illuminate\Auth\Access\Response;

class RequestOffPolicy
{
    public const MENU = 'attendance-menu';
    public const LIST = 'attendance-list';
    public const CREATE = 'attendance-create';
    public const EDIT = 'attendance-edit';
    public const DELETE = 'attendance-delete';
    public const DETAIL = 'attendance-detail';
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
    public function view(Employees $employee, RequestOffs $requestOffs = null)
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
    public function edit(Employees $employee, RequestOffs $requestOffs = null)
    {
        return $employee->hasPermission(static::EDIT);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Employees $employee, RequestOffs $requestOffs = null)
    {
        return $employee->hasPermission(static::DELETE);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function detail(Employees $employee, RequestOffs $requestOffs = null)
    {
        return $employee->hasPermission(static::DETAIL);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Employees $employee, RequestOffs $requestOffs)
    {
        //
    }
}
