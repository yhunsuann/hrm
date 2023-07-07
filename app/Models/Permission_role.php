<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Permissions;

class Permission_role extends Model
{
    protected $table = 'permission_role';
    public $timestamps = false;
    const UPDATED_AT = NULL;
  
    protected $fillable = [
        'role_id',
        'permission_id',
    ];
    public function permissions()
    {
        return $this->hasOne(Permissions::class, 'id', 'permission_id');
    }
}
