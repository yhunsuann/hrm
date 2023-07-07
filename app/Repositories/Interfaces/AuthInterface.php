<?php
namespace App\Repositories\Interfaces;

Interface AuthInterface
{   
    public function recoverPass($data);
    public function updatePass($data);

} 
