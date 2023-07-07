<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
class ScheduleController extends Controller
{
    public function index()
    {
        if (Gate::denies('schedule-list')) {
            abort(403, 'Unauthorized');
        }
        
        return view('admin.schedule.index');
    }

    public function edit()
    {
        if (Gate::denies('schedule-edit')) {
            abort(403, 'Unauthorized');
        }

        return view('admin.schedule.edit');
    }

    public function create()
    {
        if (Gate::denies('schedule-create')) {
            abort(403, 'Unauthorized');
        }

        return view('admin.schedule.create');
    }
}
