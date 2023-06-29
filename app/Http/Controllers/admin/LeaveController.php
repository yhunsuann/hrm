<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LeaveController extends Controller
{
    public function index()
    {
        return view('admin.leave.index');
    }

    public function edit()
    {
        return view('admin.leave.detail');
    }

    public function create()
    {
        return view('admin.leave.create');
    }
}
