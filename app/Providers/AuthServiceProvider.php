<?php

namespace App\Providers;

use App\Models\Attendances;
use App\Policies\ProjectPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\EmployeePolicy;
use App\Policies\RolePolicy;
use App\Models\Employees;
use App\Models\Roles;
use App\Models\Projects;
use App\Models\Request_offs;
use App\Policies\AttendancesPolicy;
use App\Policies\DashboardPolicy;
use App\Policies\RequestOffPolicy;
use App\Policies\SchedulePolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Employees::class => EmployeePolicy::class,
        Roles::class => RolePolicy::class,
        Projects::class => ProjectPolicy::class,
        Attendances::class => AttendancesPolicy::class,
        RequestOffs::class => RequestOffPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('employee-list', [EmployeePolicy::class, 'view']);
        Gate::define('employee-menu', [EmployeePolicy::class, 'menu']);
        Gate::define('employee-create', [EmployeePolicy::class, 'create']);
        Gate::define('employee-edit', [EmployeePolicy::class, 'edit']);
        Gate::define('employee-delete', [EmployeePolicy::class, 'delete']);
        Gate::define('employee-info', [EmployeePolicy::class, 'info']);

        Gate::define('role-list', [RolePolicy::class, 'view']);
        Gate::define('role-menu', [RolePolicy::class, 'menu']);
        Gate::define('role-create', [RolePolicy::class, 'create']);
        Gate::define('role-edit', [RolePolicy::class, 'edit']);
        Gate::define('role-delete', [RolePolicy::class, 'delete']);

        Gate::define('project-list', [ProjectPolicy::class, 'view']);
        Gate::define('project-menu', [ProjectPolicy::class, 'menu']);
        Gate::define('project-create', [ProjectPolicy::class, 'create']);
        Gate::define('project-edit', [ProjectPolicy::class, 'edit']);
        Gate::define('project-delete', [ProjectPolicy::class, 'delete']);

        Gate::define('attendance-list', [AttendancesPolicy::class, 'view']);
        Gate::define('attendance-menu', [AttendancesPolicy::class, 'menu']);
        Gate::define('attendance-create', [AttendancesPolicy::class, 'create']);
        Gate::define('attendance-edit', [AttendancesPolicy::class, 'edit']);
        Gate::define('attendance-delete', [AttendancesPolicy::class, 'delete']);
        Gate::define('attendance-detail', [AttendancesPolicy::class, 'detail']);
        Gate::define('attendance-today', [AttendancesPolicy::class, 'today']);

        Gate::define('dashboard-menu', [DashboardPolicy::class, 'menu']);

        Gate::define('request-off-list', [RequestOffPolicy::class, 'view']);
        Gate::define('request-off-menu', [RequestOffPolicy::class, 'menu']);
        Gate::define('request-off-create', [RequestOffPolicy::class, 'create']);
        Gate::define('request-off-edit', [RequestOffPolicy::class, 'edit']);
        Gate::define('request-off-delete', [RequestOffPolicy::class, 'delete']);
        Gate::define('request-off-detail', [RequestOffPolicy::class, 'detail']);

        Gate::define('schedule-list', [SchedulePolicy::class, 'view']);
        Gate::define('schedule-menu', [SchedulePolicy::class, 'menu']);
        Gate::define('schedule-create', [SchedulePolicy::class, 'create']);
        Gate::define('schedule-edit', [SchedulePolicy::class, 'edit']);
        Gate::define('schedule-delete', [SchedulePolicy::class, 'delete']);
    }
}
