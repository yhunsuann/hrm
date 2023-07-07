<?php

namespace App\Repositories;

use App\Models\Permissions;
use App\Repositories\Interfaces\PermissionInterface;
use Illuminate\Database\Query\Expression;
use Carbon\Carbon;

class PermissionRepository implements PermissionInterface
{   
    protected $model;
    
    public function __construct(Permissions $model) {
        $this->model = $model;
    }

    public function list()
    {
       return $this->model
        ->select('id', 'permission_name', 'label')
        ->get()
        ->groupBy('label')
        ->toArray();
    }

    public function create($data)
    {
        return $this->model->create($data);
    }
}    