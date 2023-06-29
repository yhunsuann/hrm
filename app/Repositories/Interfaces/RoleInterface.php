<?php
namespace App\Repositories\Interfaces;

Interface RoleInterface
{   
    public function list($data = []);
    public function getInfoById($id);

} 
