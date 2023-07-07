<?php
namespace App\Repositories\Interfaces;

Interface ProjectInterface
{   
    public function list($data = []);
    public function create($data);
    public function getInfoById($id);
    public function update($data, $id);
    public function delete($id);
} 
