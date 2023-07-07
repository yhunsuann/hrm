<?php

namespace App\Repositories;

use App\Models\Employees;
use App\Repositories\Interfaces\EmployeeInterface;
use Illuminate\Support\Facades\Storage;

class EmployeeRepository implements EmployeeInterface
{   
    protected $model;
    
    public function __construct(Employees $model) {
        $this->model = $model;
    }

    public function list($data = [])
    {
        $name = isset($data['name']) ? str_replace("+", " ", $data['name']) : null;
        
        return $this->model->with(['role_employee'])
                            ->when(!empty($name), function ($query) use ($name) {
                                $query->where('full_name', $name);
                            })
                            ->paginate(8);
    }

    public function getEmployeeRole($id)
    {
        return $this->model->where('role_id', $id)
                            ->get();
    }

    public function getInfoById($id)
    {
        $employee = $this->model->find($id);

        return $employee->load(['role_employee']);
    }

    public function update($data , $id)
    {
        $this->model->Where('id', $id)->update($data);
    }

    public function create($data)
    {
        $this->model->create($data);
    }

    public function delete($id)
    {
        $employee = $this->model->findOrFail($id);

        if (!empty($employee) && Storage::disk('public')->exists('assets/img/employee/' . $employee->image)) {
            Storage::disk('public')->delete('assets/img/employee/' . $employee->image);
        }

        $this->model->destroy($id); 
    }

}    