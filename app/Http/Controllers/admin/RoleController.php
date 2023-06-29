<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class RoleController extends Controller
{
    public function index()
    {
        return view('admin.role.index');
    }

    public function edit()
    {
        return view('admin.role.edit');
    }

    public function create()
    {
        return view('admin.role.create');
    }
    
}
