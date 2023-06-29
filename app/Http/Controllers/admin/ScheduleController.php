<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScheduleController extends Controller
{
    public function index()
    {
        return view('admin.schedule.index');
    }

    public function edit()
    {
        return view('admin.schedule.edit');
    }

    public function create()
    {
        return view('admin.schedule.create');
    }
}
