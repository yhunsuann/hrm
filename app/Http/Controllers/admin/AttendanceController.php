<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\AttendanceInterface;
use App\Repositories\Interfaces\EmployeeInterface;

class AttendanceController extends Controller
{
    protected $model;
    protected $role;
    protected $fileUploader;
    protected $employees;
    
    public function __construct(
        AttendanceInterface $model,
        EmployeeInterface $employees
    ) {
        $this->model = $model;
        $this->employees = $employees;
    }
    public function index(Request $request)
    {
        $attendances = $this->model->list($request->all());
        $employees = $this->employees->list();
        return view('admin.attendance.index')->with('attendances', $attendances)->with('emlpoyees', $employees);
    }

    public function edit(Request $request, $id)
    {
        $attendances = $this->model->detail($request->all(), $id);
        
        return view('admin.attendance.detail')->with('attendances', $attendances);
    }

    public function create()
    {
        return view('admin.attendance.create');
    }
}
