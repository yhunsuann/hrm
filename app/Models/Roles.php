<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Roles extends Model
{
    protected $table = 'roles';
    public $timestamps = false;
    use HasFactory;
    use SoftDeletes;
    const UPDATED_AT = NULL;
  
    protected $fillable = [
        'role_name',
        'deleted_at',
    ];
}
