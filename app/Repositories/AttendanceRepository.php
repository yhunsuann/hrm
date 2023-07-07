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
        $currentMonthYear = isset($data['month']) ? Carbon::parse($data['month']) : Carbon::now();

        $name = isset($data['name']) ? str_replace("+", " ", $data['name']) : null;
        
        return $this->model
            ->select('employees.full_name', 'roles.role_name', 'employee_id')
            ->selectRaw('COUNT(CASE WHEN attendances.status = "present" THEN 1 END) AS total_working_days')
            ->selectRaw('COUNT(CASE WHEN attendances.status = "leave" THEN 1 END) AS total_off')
            ->selectRaw('COUNT(CASE WHEN attendances.status = "late" THEN 1 END) AS total_late')
            ->when(!empty($name), function ($query) use ($name) {
                $query->where('employees.full_name', $name);
            })
            ->join('employees', 'attendances.employee_id', '=', 'employees.id')
            ->join('roles', 'employees.role_id', '=', 'roles.id')
            ->whereRaw('DATE_FORMAT(attendances_date, "%Y-%m") = ?', [$currentMonthYear->format('Y-m')])
            ->groupBy('attendances.employee_id', 'employees.full_name')
            ->paginate(10);
    }

    public function detail($data = [], $id)
    {
        $currentMonthYear = isset($data['month']) ? Carbon::parse($data['month']) : Carbon::now();

        return  $this->model->select('attendances.id', 'full_name', 'attendances_date', 'check_in', 'check_out', 'status')
        ->join('employees', 'attendances.employee_id', '=', 'employees.id')
        ->where('employee_id', $id)
        ->whereRaw('DATE_FORMAT(attendances_date, "%Y-%m") = ?', [$currentMonthYear->format('Y-m')])
        ->paginate(10);
    }

    public function getInfoById($id)
    {
        $attendance = $this->model->find($id);

        return $attendance; 
    }

    public function update($data , $id)
    {
        $this->model->Where('id', $id)->update($data);
    }

    public function attendanceToday()
    {
        $userId = auth()->user()->id;
        $currentDate = now()->format('Y-m-d');
        $currentTime = now()->setTimezone('Asia/Ho_Chi_Minh')->format('H:i:s');
        
        $attendance = $this->model->where('employee_id', $userId)
            ->whereDate('attendances_date', $currentDate)
            ->first();
        if ($attendance) {
            $attendance->check_out = $currentTime;
            $attendance->status = ($currentTime < '17:30:00') ? 'late' : 'present';
            $attendance->save();
        } else {
            $newAttendance = new $this->model;
            $newAttendance->employee_id = $userId;
            $newAttendance->attendances_date = $currentDate;
            $newAttendance->check_in = $currentTime;
            $newAttendance->status = ($currentTime > '08:00:00') ? 'late' : 'present';
            $newAttendance->deleted_at = null;
            $newAttendance->save();
        }
    }
}    