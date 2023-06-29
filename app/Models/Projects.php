<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Employees;

class Projects extends Model
{
    protected $table = 'projects';
    use HasFactory;
    use SoftDeletes;
    const UPDATED_AT = NULL;
  
    protected $fillable = [
        'project_name',
        'start_date',
        'end_date',
        'status',
        'image',
        'description',
        'deleted_at'
    ];
}
