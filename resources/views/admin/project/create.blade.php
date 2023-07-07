@extends('admin.layout.layout') @section('content')
<div class="container-fluid mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
            <li class="breadcrumb-item">
                <!-- if breadcrumb is single--><span>Home</span>
            </li>
            <li class="breadcrumb-item "><span>project</span></li>
            <li class="breadcrumb-item active"><span>create</span></li>
    </nav>
</div>
<div class="container-content">
    <div class="row">
        <div class="col">
            <h4>Create Project</h4>
        </div>
    </div>
    <form class="form-create bg-white p-4" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mt-5">
            <div class="col-6">
                <div class="row">
                    <div class="col-2">
                        <label for="">Project name</label>
                    </div>
                    <div class="col-10">
                        <input name="project_name" class="form-control" type="text" placeholder="Enter name project">
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-2">
                        <label for="">Status</label>
                    </div>
                    <div class="col-10 select-custom">
                        <select name="status" class="" id="status" style="width: 100% !important">
                            <option value="">Chosse status....</option>
                            <option value="complete">Complete</option>
                            <option value="pendding">Pendding</option>
                            <option value="late">Late</option>
                            <option value="compensation">Compensation</option>
                    </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <div class="row">
                    <div class="col-2">
                        <label class="label-search" for="">Start date</label>
                    </div>
                    <div class="col-10">
                        <div class="datepicker date d-flex  mt-0 mx-auto">
                            <div class="input-group">
                                <input name="start_date" type="text" placeholder="Start date" class="form-control date-picker">
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
                        <label class="label-search" for="">Deadline</label>
                    </div>
                    <div class="col-10">
                        <div class="datepicker date d-flex  mt-0 mx-auto">
                            <div class="input-group">
                                <input name="end_start" type="text" value="{{ request()->dateFrom }}" placeholder="Deadline" class="form-control date-picker">
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
            <div class="col">
                <textarea name="description" id="summernote"></textarea>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-6">
                <div class="row">
                    <div class="col-2">
                        <label class="label-search" for="">Avatar</label>
                    </div>
                    <div class="col-10">
                        <input name="upload_image" class="form-control" type="file" name="" id="">
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