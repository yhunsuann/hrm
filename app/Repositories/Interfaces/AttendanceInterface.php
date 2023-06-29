<?php
namespace App\Repositories\Interfaces;

Interface AttendanceInterface
{   
    public function list($data = []);
    public function detail($data = [], $id);
} 
