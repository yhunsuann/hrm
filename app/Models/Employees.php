<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Roles;

class Employees extends Authenticatable
{
    protected $table = 'employees';
    use HasFactory;
    use SoftDeletes;
    const UPDATED_AT = NULL;
  
    protected $fillable = [
        'role_id',
        'full_name',
        'number_phone',
        'email',
        'birthday',
        'image',
        'created_at',
        'bank_account',
        'bank_name',
        'password',
        'sex',
        'address',
        'deleted_at'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function role_employee()
    {
        return $this->hasOne(Roles::class, 'id', 'role_id');
    }
    
    public function role()
    {
        return $this->hasOne(Roles::class, 'id', 'role_id');
    }

    public function hasPermission($permission)
    {
        $permissionRoles = $this->role->permission_role;
        $permissionNames = $permissionRoles->pluck('permissions.permission_name')->toArray();
        
        return in_array($permission, $permissionNames);
    }
}
