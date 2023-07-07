<?php

namespace App\Repositories;

use App\Models\Projects;
use App\Repositories\Interfaces\ProjectInterface;
use Illuminate\Database\Query\Expression;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ProjectRepository implements ProjectInterface
{   
    protected $model;
    
    public function __construct(Projects $model) {
        $this->model = $model;
    }

    public function list($data = [])
    {
        $name = isset($data['name']) ? str_replace("+", " ", $data['name']) : null;
        
        return $this->model->select('projects.id', 'project_name', 'start_date', 'end_date', 'status')
                            ->selectRaw("GROUP_CONCAT(DISTINCT employees.full_name SEPARATOR ', ') AS team")
                            ->when(!empty($name), function ($query) use ($name) {
                                $query->where('project_name', $name);
                            })
                            ->leftJoin('employee_project', 'projects.id', '=', 'project_id')
                            ->leftJoin('employees', 'employee_project.employee_id', '=', 'employees.id')
                            ->groupBy('projects.id')
                            ->paginate(8);
    }

    public function create($data)
    {
        $this->model->create($data); 
    }

    public function getInfoById($id)
    {
        $project = $this->model->find($id);

        return $project;
    }

    public function update($data , $id)
    {
        $this->model->Where('id', $id)->update($data);
    }

    public function delete($id)
    {
        $employee = $this->model->findOrFail($id);

        if (!empty($employee) && Storage::disk('public')->exists('assets/img/project/' . $employee->image)) {
            Storage::disk('public')->delete('assets/img/project/' . $employee->image);
        }

        $this->model->destroy($id); 
    }

   
}    