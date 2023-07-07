<?php
namespace App\Repositories\Interfaces;

Interface AttendanceInterface
{   
    public function list($data = []);
    public function detail($data = [], $id);
    public function getInfoById($id);
    public function update($data, $id);
    public function attendanceToday();
} 
