@extends('admin.layout.layout') @section('content')
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
    <div class="row mt-5">
        <div class="col-6">
            <div class="row">
                <div class="col-2">
                    <label for="">Project name</label>
                </div>
                <div class="col-10">
                    <input class="form-control" type="text" value="Project HRM rubiklab">
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-10">
                    <a href="{{ route('admin.project.createTeam') }}" class="btn btn-success text-white">
                         Add Member
                    </a>
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
                            <input name="dateFrom" type="text" value="25/06/2023" placeholder="From date" class="form-control date-picker">
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
                            <input name="dateFrom" type="text" value="25/07/2023" placeholder="From date" class="form-control date-picker">
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
            <textarea id="summernote">Dự án HRM (Quản lý nguồn nhân lực) là một dự án nhằm tối ưu hóa việc quản lý và tận dụng tài nguyên con người trong một tổ chức hoặc doanh nghiệp. Dự án HRM bao gồm việc phân tích, thiết kế và triển khai các quy trình, hệ thống và công cụ để quản lý các hoạt động liên quan đến nhân sự.</textarea>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-6">
            <div class="row">
                <div class="col-2">
                    <label for="">Avatar</label>
                </div>
                <div class="col-10">
                    <img class="my-2 avatar-employee" src="{{ asset('storage/assets/img/avatar.jpg') }}" alt="1">
                    <input class="form-control" type="file" name="" id="">
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col">
            <div class="btn btn-primary">Save</div>
        </div>
    </div>
</div>
@endsection