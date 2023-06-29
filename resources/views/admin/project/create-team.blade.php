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
    <div class="row mt-5">
    <div class="col">
            <div class="row">
                <div class="col-2">
                    <label class="label-search" for="">Role</label>
                </div>
                <div class="col-10 select-custom">
                    <select class="form-control" name="status" class="" id="status" style="width: 100% !important">
                        <option value="active">Manager</option>
                        <option value="inactive">PM</option>
                        <option value="inactive">Dev</option>
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
                    <select class="form-control" name="status" class="" id="status" style="width: 100% !important">
                        <option value="active">Phuoc</option>
                        <option value="inactive">Danh</option>
                        <option value="inactive">Lang</option>
                    </select>
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