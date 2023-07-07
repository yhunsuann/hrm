<?php
namespace App\Repositories\Interfaces;

Interface RoleInterface
{   
    public function list($data = []);
    public function getInfoById($id);
    public function listRolePermission($data = []);
    public function create($data);
    public function delete($id);
} 
