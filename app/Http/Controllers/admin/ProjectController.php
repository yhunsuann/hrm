<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function index()
    {
        return view('admin.project.index');
    }

    public function edit()
    {
        return view('admin.project.edit');
    }

    public function create()
    {
        return view('admin.project.create');
    }

    public function createTeam()
    {
        return view('admin.project.create-team');
    }
}
