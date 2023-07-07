<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\RequestOffController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\DashBoardController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('login',[AuthController::class, 'login'])->name('login');
Route::post('login',[AuthController::class, 'loginProcess'])->name('login.process');
Route::get('forgot-password',[AuthController::class, 'forgotPassword'])->name('forgot-password');
Route::post('forgot-password',[AuthController::class, 'recoverPass'])->name('recoverPass');
Route::get('update-pass',[AuthController::class, 'updatePass'])->name('updatePass');
Route::post('update-pass',[AuthController::class, 'updatePassProcess'])->name('updatePassProcess');

Route::group(['middleware' => 'check-login'], function() {
    Route::get('', [DashBoardController::class, 'dashboard'])->name('dashboard');
    Route::get('home', [DashBoardController::class, 'home'])->name('home');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::group(['prefix' => 'role', 'as' => 'role.'], function () {
        Route::get('', [RoleController::class, 'index'])->name('index');
        Route::get('edit/{id}', [RoleController::class, 'edit'])->name('edit');
        Route::get('create', [RoleController::class, 'create'])->name('create');
        Route::post('create', [RoleController::class, 'store'])->name('store');
        Route::post('update/{id}', [RoleController::class, 'update'])->name('update');
        Route::get('delete/{id}', [RoleController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'employee', 'as' => 'employee.'], function () {
        Route::get('', [EmployeeController::class, 'index'])->name('index');
        Route::get('edit/{id}', [EmployeeController::class, 'edit'])->name('edit');
        Route::get('info/{id}', [EmployeeController::class, 'info'])->name('info');
        Route::get('create', [EmployeeController::class, 'create'])->name('create');
        Route::post('create', [EmployeeController::class, 'store'])->name('store');
        Route::post('update/{id}', [EmployeeController::class, 'update'])->name('update');
        Route::get('delete/{id}', [EmployeeController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'attendance', 'as' => 'attendance.'], function () {
        Route::get('', [AttendanceController::class, 'index'])->name('index');
        Route::get('detail/{id}', [AttendanceController::class, 'detail'])->name('detail');
        Route::get('create', [AttendanceController::class, 'create'])->name('create');
        Route::get('today', [AttendanceController::class, 'today'])->name('today');
        Route::post('today', [AttendanceController::class, 'todayProcess'])->name('todayProcess');
        Route::get('edit/{id}', [AttendanceController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [AttendanceController::class, 'update'])->name('update');
    });

    Route::group(['prefix' => 'leave', 'as' => 'leave.'], function () {
        Route::get('', [RequestOffController::class, 'index'])->name('index');
        Route::get('detail/{id}', [RequestOffController::class, 'detail'])->name('detail');
        Route::get('create', [RequestOffController::class, 'create'])->name('create');
    });

    Route::group(['prefix' => 'project', 'as' => 'project.'], function () {
        Route::get('', [ProjectController::class, 'index'])->name('index');
        Route::get('/create-team/get-employees/{id}', [ProjectController::class, 'getEmployeeRole'])->name('getEmployeeRole');
        Route::get('edit/{id}', [ProjectController::class, 'edit'])->name('edit');
        Route::get('create', [ProjectController::class, 'create'])->name('create');
        Route::post('create', [ProjectController::class, 'store'])->name('store');
        Route::post('update/{id}', [ProjectController::class, 'update'])->name('update');
        Route::get('create-team/{id}', [ProjectController::class, 'createTeam'])->name('createTeam');
        Route::post('create-team/{id}', [ProjectController::class, 'storeTeam'])->name('storeTeam');
        Route::get('delete/{id}', [ProjectController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'schedule', 'as' => 'schedule.'], function () {
        Route::get('', [ScheduleController::class, 'index'])->name('index');
        Route::get('edit/{id}', [ScheduleController::class, 'edit'])->name('edit');
        Route::get('create', [ScheduleController::class, 'create'])->name('create');
    });
});
?>