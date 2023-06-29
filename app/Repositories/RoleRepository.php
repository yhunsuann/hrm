<?php

namespace App\Repositories;

use App\Models\Roles;
use App\Repositories\Interfaces\RoleInterface;

class RoleRepository implements RoleInterface
{   

    protected $model;
    
    public function __construct(Roles $model) {
        $this->model = $model;
    }

    public function list($data = [])
    {
        $name = isset($data['name']) ? str_replace("+", " ", $data['name']) : null;
        
        return $this->model
                    ->when(!empty($name), function ($query) use ($name) {
                        $query->where('full_name', $name);
                    })
                    ->paginate();
    }

    public function getInfoById($id)
    {
        $employee = $this->model->find($id);
        return $employee->load(['role_employee']);
    }

}    