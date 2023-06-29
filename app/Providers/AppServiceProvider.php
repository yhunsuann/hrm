<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\EmployeeInterface;
use App\Repositories\EmployeeRepository;
use App\Repositories\Interfaces\RoleInterface;
use App\Repositories\RoleRepository;
use App\Repositories\Interfaces\AttendanceInterface;
use App\Repositories\AttendanceRepository;
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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap(); 
    }
}
