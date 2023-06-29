<?php

namespace App\Repositories;

use App\Models\Employees;
use App\Repositories\Interfaces\EmployeeInterface;

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
        $this->model->destroy($id); 
    }

}    