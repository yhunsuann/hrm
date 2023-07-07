<?php

namespace App\Repositories;

use App\Models\Permission_role;
use App\Repositories\Interfaces\PermissionRoleInterface;

class PermissionRoleRepository implements PermissionRoleInterface
{   

    protected $model;
    
    public function __construct(Permission_role $model) {
        $this->model = $model;
    }
    
    public function create($data)
    {
        return  $this->model->create($data);
    }

    public function getInfoById($id)
    {
        return $this->model
        ->select('permission_role.permission_id','permission_role.role_id', 'permissions.permission_name', 'roles.role_name')
        ->join('permissions', 'permission_id', '=', 'permissions.id')
        ->join('roles', 'role_id', '=', 'roles.id')
        ->where('role_id', $id)->get();
    }

    public function delete($role_id,$permission_id)
    {
        $this->model->where('role_id',$role_id)->where('permission_id', $permission_id)->delete();
    }
}    