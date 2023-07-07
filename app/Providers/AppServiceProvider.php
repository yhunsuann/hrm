<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\EmployeeInterface;
use App\Repositories\EmployeeRepository;
use App\Repositories\Interfaces\RoleInterface;
use App\Repositories\RoleRepository;
use App\Repositories\Interfaces\AttendanceInterface;
use App\Repositories\AttendanceRepository;
use App\Repositories\Interfaces\ProjectInterface;
use App\Repositories\ProjectRepository;
use App\Repositories\Interfaces\EmployeeProjectInterface;
use App\Repositories\EmployeeProjectRepository;
use App\Repositories\Interfaces\AuthInterface;
use App\Repositories\AuthRepository;
use App\Repositories\Interfaces\PermissionInterface;
use App\Repositories\PermissionRepository;
use App\Repositories\Interfaces\PermissionRoleInterface;
use App\Repositories\PermissionRoleRepository;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            EmployeeInterface::class, EmployeeRepository::class
        );
        $this->app->bind(
            RoleInterface::class, RoleRepository::class
        );
        $this->app->bind(
            AttendanceInterface::class, AttendanceRepository::class
        );
        $this->app->bind(
            ProjectInterface::class, ProjectRepository::class
        );
        $this->app->bind(
            EmployeeProjectInterface::class, EmployeeProjectRepository::class
        );
        $this->app->bind(
            AuthInterface::class, AuthRepository::class
        );
        $this->app->bind(
            PermissionInterface::class, PermissionRepository::class
        );
        $this->app->bind(
            PermissionRoleInterface::class, PermissionRoleRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap(); 
    }
}
