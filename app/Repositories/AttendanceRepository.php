<?php

namespace App\Repositories;

use App\Models\Attendances;
use App\Repositories\Interfaces\AttendanceInterface;
use Illuminate\Database\Query\Expression;
use Carbon\Carbon;

class AttendanceRepository implements AttendanceInterface
{   
    protected $model;
    
    public function __construct(Attendances $model) {
        $this->model = $model;
    }

    public function list($data = [])
    {
        if($data != null){
            $currentMonth = $data['month'];
        }else{
            $currentMonth = Carbon::now()->format('m');
        }  
        $name = isset($data['name']) ? str_replace("+", " ", $data['name']) : null;
        $currentYear = Carbon::now()->format('Y');
        return  $this->model->select('employees.full_name', 'roles.role_name', 'employee_id')
        ->selectRaw('COUNT(*) AS total_working_days')
        ->when(!empty($name), function ($query) use ($name) {
            $query->where('employees.full_name', $name);
        })
        ->join('employees', 'attendances.employee_id', '=', 'employees.id')
        ->join('roles', 'employees.role_id', '=', 'roles.id')
        ->where('attendances.status', 'present')
        ->whereMonth('attendances_date', $currentMonth)
        ->whereYear('attendances_date', $currentYear)
        ->groupBy('attendances.employee_id', 'employees.full_name')
        ->paginate(10);
    }
    public function detail($data = [], $id)
    {
        if ($data != null && isset($data['month'])) {
            $currentMonth = $data['month'];
        } else {
            $currentMonth = Carbon::now()->format('m');
        }
        $currentYear = Carbon::now()->format('Y');
        return  $this->model->select('full_name', 'attendances_date', 'check_in', 'check_out', 'status')
        ->join('employees', 'attendances.employee_id', '=', 'employees.id')
        ->where('employee_id', $id)
        ->whereMonth('attendances_date', $currentMonth)
        ->whereYear('attendances_date', $currentYear)
        ->paginate(10);
    }


}    