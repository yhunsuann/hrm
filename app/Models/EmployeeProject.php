<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeProject extends Model
{
    protected $table = 'employee_project';
    public $timestamps = false;
    use HasFactory;
    const UPDATED_AT = NULL;
  
    protected $fillable = [
        'employee_id',
        'project_id',
    ];
}
