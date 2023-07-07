@extends('admin.layout.layout') @section('content') @include('admin.layout.partials.flag')
<div class="container-fluid mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
            <li class="breadcrumb-item">
                <!-- if breadcrumb is single--><span>Home</span>
            </li>
            <li class="breadcrumb-item "><span>project</span></li>
            <li class="breadcrumb-item active"><span>edit</span></li>
    </nav>
</div>
<div class="container-content">
    <div class="row">
        <div class="col">
            <h4>Edit Project</h4>
        </div>
    </div>
    <form class="form-create bg-white p-4" action="{{ route('admin.project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mt-5">
            <div class="col-6">
                <div class="row">
                    <div class="col-2">
                        <label for="">Project name</label>
                    </div>
                    <div class="col-10">
                        <input name="project_name" class="form-control" type="text" value="{{ $project->project_name }}">
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-2">
                    <label for="">Team</label>
                    </div>
                    <div class="col-10">
                        <div class="row">
                            <div class="col-8 select-custom">
                                <select class="form-control" style="width: 100% !important" multiple>
                                    @forelse($employees_of_projects as $employees_of_project)
                                    <option value="{{ $employees_of_project->id }} " selected>{{ $employees_of_project->full_name }}</option>
                                    @empty
                                        <option></option>
                                    @endforelse  
                                </select>
                            </div>
                            <div class="col-4">
                                <a href="{{ route('admin.project.createTeam' , $project->id) }}" class="btn btn-success text-white w-100">
                                    {{ empty($employees_of_projects[0]->full_name) ? 'Add team' : 'Edit Team' }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <div class="row">
                    <div class="col-2">
                        <label for="">Start date</label>
                    </div>
                    <div class="col-10">
                        <div class="datepicker date d-flex  mt-0 mx-auto">
                            <div class="input-group">
                                <input name="start_date" type="text" value="{{ $project->start_date }}" placeholder="From date" class="form-control date-picker">
                                <div class="input-group-append">
                                    <span class="input-group-text h-100"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col-2">
                        <label for="">Deadline</label>
                    </div>
                    <div class="col-10">
                        <div class="datepicker date d-flex  mt-0 mx-auto">
                            <div class="input-group">
                                <input name="end_date" type="text" value="{{ $project->end_date }}" placeholder="From date" class="form-control date-picker">
                                <div class="input-group-append">
                                    <span class="input-group-text h-100"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <label class="ml-1" for="">Description</label>
            <div class="col mt-3">
                <textarea name="description" id="summernote">{{  $project->description }}</textarea>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-6">
                <div class="row">
                    <div class="col-2">
                        <label for="">Avatar</label>
                    </div>
                    <div class="col-10">
                        <img class="my-2 avatar-employee" src="{{ asset('storage/assets/img/project/'.$project->image) }}" alt="1">
                        <input name="upload_image" class="form-control" type="file" id="">
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