<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permissions extends Model
{
    protected $table = 'permissions';
    public $timestamps = false;
    const UPDATED_AT = NULL;
  
    protected $fillable = [
        'id',
        'permission_name',
        'lable',
        'deleted_at'
    ];
}
