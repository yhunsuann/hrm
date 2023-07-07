<?php
namespace App\Repositories\Interfaces;

Interface EmployeeInterface
{   
    public function list($data = []);
    public function getInfoById($id);
    public function update($data, $id);
    public function create($data);
    public function delete($id);
    public function getEmployeeRole($id);
} 
