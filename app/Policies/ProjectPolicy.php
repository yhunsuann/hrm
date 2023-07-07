<?php

namespace App\Policies;

use App\Models\Employees;
use App\Models\Projects;
use Illuminate\Auth\Access\Response;

class ProjectPolicy
{
    public const MENU = 'project-menu';
    public const LIST = 'project-list';
    public const CREATE = 'project-create';
    public const EDIT = 'project-edit';
    public const DELETE = 'project-delete';
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
    public function create(Employees $employee, Projects $projects = null)
    {
        return $employee->hasPermission(static::CREATE);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function edit(Employees $employee, Projects $projects = null)
    {
        return $employee->hasPermission(static::EDIT);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Employees $employee, Projects $projects = null)
    {
        return $employee->hasPermission(static::DELETE);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Employees $employee, Projects $projects = null)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Employees $employee, Projects $projects = null)
    {
        //
    }
}
