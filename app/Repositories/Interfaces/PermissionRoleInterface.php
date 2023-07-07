<?php
namespace App\Repositories\Interfaces;

Interface PermissionRoleInterface
{   
    public function create($data);
    public function getInfoById($id);
    public function delete($role_id,$permission_name);
} 
