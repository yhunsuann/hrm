<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\AttendanceInterface;
use App\Repositories\Interfaces\EmployeeInterface;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;

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
        if (Gate::denies('attendance-list')) {
            abort(403, 'Unauthorized');
        }

        $attendances = $this->model->list($request->all());
        $employees = $this->employees->list();

        return view('admin.attendance.index')->with('attendances', $attendances)->with('emlpoyees', $employees);
    }

    public function detail(Request $request, $id)
    {
        if (Gate::denies('attendance-detail')) {
            abort(403, 'Unauthorized');
        }
        $attendances = $this->model->detail($request->all(), $id);
        
        return view('admin.attendance.detail')->with('attendances', $attendances);
    }

    public function create()
    {
        if (Gate::denies('attendance-create')) {
            abort(403, 'Unauthorized');
        }
        
        return view('admin.attendance.create');
    }

    public function today()
    {
        if (Gate::denies('attendance-today')) {
            abort(403, 'Unauthorized');
        }
        
        return view('admin.attendance.today');
    }

    public function todayProcess()
    {
        $this->model->attendanceToday();
        return view('admin.attendance.today');
    }

    public function edit($id)
    {
        if (Gate::denies('attendance-edit')) {
            abort(403, 'Unauthorized');
        }
        
        $attendance = $this->model->getInfoById($id);
    
        return view('admin.attendance.edit', compact('attendance'));
    }

    public function update(Request $request, $id)
    { 
        $validator = Validator::make($request->all(), [
            'check_in' => 'required',
            'check_out' => 'required',
            'attendances_date' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors('Please enter full information !'); 
        }

        $data = array();
        $data['check_in'] = $request->check_in;
        $data['check_out'] = $request->check_out;
        $data['attendances_date'] = $request->attendances_date;
        $data['status'] = $request->status;
        $this->model->update($data,$id);

        return redirect()->route('admin.attendance.index')->withSuccess('Edit Recruitments Successfully');
    }
}
