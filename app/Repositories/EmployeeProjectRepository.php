<?php

namespace App\Repositories;

use App\Models\EmployeeProject;
use App\Repositories\Interfaces\EmployeeProjectInterface;
use Illuminate\Support\Facades\Storage;

class EmployeeProjectRepository implements EmployeeProjectInterface
{   
    protected $model;
    
    public function __construct(EmployeeProject $model) {
        $this->model = $model;
    }

    public function addTeam($data)
    {
        $employee_data = [];
        foreach ($data['members'] as $member) {
            $employee_data[] = ['employee_id' => $member , 'project_id' => $data['project_id']];
        }
        foreach ($employee_data as $data) {
            $this->model->create($data);
        } 
    }

    public function getInfoById($id)
    {
        return $this->model
        ->select('employees.id', 'employees.full_name', 'employee_project.project_id')
        ->join('employees', 'employee_project.employee_id', '=', 'employees.id')
        ->where('project_id',$id)
        ->groupBy('employee_id', 'project_id')
        ->get();
    }
}    