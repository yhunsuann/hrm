<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Roles;

class Employees extends Model
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
        'sex',
        'address',
        'deleted_at'
    ];
    public function role_employee()
    {
        return $this->hasOne(Roles::class, 'id', 'role_id');
    }
}
