<?php
namespace App\Repositories\Interfaces;

Interface PermissionInterface
{   
    public function list();
    public function create($data);
} 
