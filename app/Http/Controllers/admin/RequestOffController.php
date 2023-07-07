<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class RequestOffController extends Controller
{
    public function index()
    {
        if (Gate::denies('request-off-list')) {
            abort(403, 'Unauthorized');
        }

        return view('admin.leave.index');
    }

    public function detail()
    {
        if (Gate::denies('request-off-edit')) {
            abort(403, 'Unauthorized');
        }

        return view('admin.leave.detail');
    }

    public function create()
    {
        if (Gate::denies('request-off-create')) {
            abort(403, 'Unauthorized');
        }

        return view('admin.leave.create');
    }
}
