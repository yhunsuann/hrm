<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Employees;

class Attendances extends Model
{
    protected $table = 'attendances';
    use HasFactory;
    use SoftDeletes;
    const UPDATED_AT = NULL;
    public $timestamps = false;
    protected $fillable = [
        'employee_id',
        'attendance_date',
        'check_in',
        'check_out',
        'status',
        'deleted_at',
    ];
    public function attendance_employee()
    {
        return $this->hasOne(Employees::class, 'id', 'employee_id');
    }
}
