<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\LeaveController;
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
Route::get('/', [DashBoardController::class, 'dashboard'])->name('dashboard');
Route::get('login', function (){
    return view('admin.login');
});
Route::group(['prefix' => 'role', 'as' => 'role.'], function () {
    Route::get('', [RoleController::class, 'index'])->name('index');
    Route::get('edit/{id}', [RoleController::class, 'edit'])->name('edit');
    Route::get('create', [RoleController::class, 'create'])->name('create');
});

Route::group(['prefix' => 'employee', 'as' => 'employee.'], function () {
    Route::get('', [EmployeeController::class, 'index'])->name('index');
    Route::get('edit/{id}', [EmployeeController::class, 'edit'])->name('edit');
    Route::get('create', [EmployeeController::class, 'create'])->name('create');
    Route::post('create', [EmployeeController::class, 'store'])->name('store');
    Route::post('update/{id}', [EmployeeController::class, 'update'])->name('update');
    Route::get('delete/{id}', [EmployeeController::class, 'delete'])->name('delete');
});

Route::group(['prefix' => 'attendance', 'as' => 'attendance.'], function () {
    Route::get('', [AttendanceController::class, 'index'])->name('index');
    Route::get('detail/{id}', [AttendanceController::class, 'edit'])->name('detail');
    Route::get('create', [AttendanceController::class, 'create'])->name('create');
});

Route::group(['prefix' => 'leave', 'as' => 'leave.'], function () {
    Route::get('', [LeaveController::class, 'index'])->name('index');
    Route::get('detail/{id}', [LeaveController::class, 'edit'])->name('detail');
    Route::get('create', [LeaveController::class, 'create'])->name('create');
});

Route::group(['prefix' => 'project', 'as' => 'project.'], function () {
    Route::get('', [ProjectController::class, 'index'])->name('index');
    Route::get('edit/{id}', [ProjectController::class, 'edit'])->name('edit');
    Route::get('create', [ProjectController::class, 'create'])->name('create');
    Route::get('create-team', [ProjectController::class, 'createTeam'])->name('createTeam');
});

Route::group(['prefix' => 'schedule', 'as' => 'schedule.'], function () {
    Route::get('', [ScheduleController::class, 'index'])->name('index');
    Route::get('edit/{id}', [ScheduleController::class, 'edit'])->name('edit');
    Route::get('create', [ScheduleController::class, 'create'])->name('create');
});

?>