@extends('admin.layout.layout') @section('content')
<div class="container-fluid mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
            <li class="breadcrumb-item">
                <!-- if breadcrumb is single--><span>Home</span>
            </li>
            <li class="breadcrumb-item "><span>project</span></li>
            <li class="breadcrumb-item "><span>create</span></li>
            <li class="breadcrumb-item active"><span>team</span></li>
    </nav>
</div>
<div class="container-content">
    <div class="row">
        <div class="col">
            <h4>Create team of project</h4>
        </div>
    </div>
    <form class="form-create bg-white p-4" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mt-5">
            <div class="col">
                <div class="row">
                    <div class="col-2">
                        <label class="label-search" for="">Role</label>
                    </div>
                    <div class="col-10 select-custom">
                            <select class="form-control" name="role_id" class="" id="role-member" style="width: 100% !important">
                                    <option value="">Chosse role</option>
                                @forelse($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                @empty 
                                    <option value="">No option</option>
                                @endforelse
                            </select>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col-2">
                        <label class="label-search" for="">Member</label>
                    </div>
                    <div class="col-10 select-custom">
                        <select placeholder="Chosse member.." class="form-control" id="member-select" name="members[]" id="" style="width: 100% !important" multiple>
                            @forelse($employees_of_projects as $employees_of_project)
                            <option value="{{ $employees_of_project->id }} " selected>{{ $employees_of_project->full_name }}</option>
                            @empty
                                <option></option>
                            @endforelse 
                        </select>
                        <input type="hidden" name="project_id" value="{{ request()->segment(4) }}"></input>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <input type="submit" class="btn btn-primary" value="Save"></input>
            </div>
        </div>
    </form>
</div>
@endsection