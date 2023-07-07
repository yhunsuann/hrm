<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Permission_role;

class Roles extends Model
{
    protected $table = 'roles';
    public $timestamps = false;
    use HasFactory;
    use SoftDeletes;
    const UPDATED_AT = NULL;
  
    protected $fillable = [
        'id',
        'role_name',
        'deleted_at',
    ];
    public function permission_role()
    {
        return $this->hasMany(Permission_role::class, 'role_id', 'id');
    }
}
