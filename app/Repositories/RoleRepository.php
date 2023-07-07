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
        return $this->model->find($id);
    }

    public function listRolePermission($data = [])
    {
        $name = isset($data['name']) ? str_replace("+", " ", $data['name']) : null;
        return $this->model->select('roles.role_name','roles.id')
            ->selectRaw('COUNT(permission_role.role_id) AS total_permission_allow')
            ->when(!empty($name), function ($query) use ($name) {
                $query->where('roles.role_name', $name);
            })
            ->leftJoin('permission_role', 'roles.id', '=', 'permission_role.role_id')
            ->leftJoin('permissions', 'permission_role.permission_id', '=', 'permissions.id')
            ->groupBy('roles.id', 'roles.role_name')
            ->get();
    }

    public function create($data)
    {
       return $this->model->create($data);
    }

    public function delete($id)
    {
        $this->model->destroy($id); 
    }
}    