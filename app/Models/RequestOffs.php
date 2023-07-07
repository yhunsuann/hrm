<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestOffs extends Model
{
    protected $table = 'request_offs';
    public $timestamps = false;
    use HasFactory;
    use SoftDeletes;
    const UPDATED_AT = NULL;
  
    protected $fillable = [
        'employee_id',
        'start_date',
        'end_date',
        'reason',
        'note',
        'reviewer',
        'deleted_at',
        'status'
    ];
}
