<?php

namespace App\Policies;

use App\Models\Employees;

class DashboardPolicy
{
    public const MENU = 'dashboard-menu';
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
}
