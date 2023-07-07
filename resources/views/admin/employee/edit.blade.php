@extends('admin.layout.layout') @section('content') @include('admin.layout.partials.flag')
<div class="container-fluid mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
            <li class="breadcrumb-item">
                <!-- if breadcrumb is single--><span>Home</span>
            </li>
            <li class="breadcrumb-item "><span>employee</span></li>
            <li class="breadcrumb-item active"><span>edit</span></li>
    </nav>
</div>
<div class="container-content">
    <div class="row">
        <div class="col">
            <h4>Edit employee</h4>
        </div>
    </div>
    <form class="form-create bg-white p-4" action="{{ route('admin.employee.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mt-5">
            <div class="col">
                <div class="row">
                    <div class="col-2">
                        <label for="">Full name</label>
                    </div>
                    <div class="col-10">
                        <input name="full_name" class="form-control" type="text" value="{{ $employee->full_name }}">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col-2">
                        <label for="">Email</label>
                    </div>
                    <div class="col-10">
                        <input name="email" class="form-control" type="text" value="{{ $employee->email }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <div class="row">
                    <div class="col-2">
                        <label for="">Address</label>
                    </div>
                    <div class="col-10">
                        <input name="address" class="form-control" type="text" value="{{ $employee->address }}">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col-2">
                        <label for="">Phone</label>
                    </div>
                    <div class="col-10">
                        <input name="number_phone" class="form-control" type="text" value="{{ $employee->number_phone }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <div class="row">
                    <div class="col-2">
                        <label for="">Bank Account</label>
                    </div>
                    <div class="col-10">
                        <input name="bank_account" class="form-control" type="text" value="{{ $employee->bank_account }}">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col-2">
                        <label for="">Bank name</label>
                    </div>
                    <div class="col-10">
                        <input name="bank_name" class="form-control" type="text" value="{{ $employee->bank_name }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <div class="row">
                    <div class="col-2">
                        <label class="label-search" for="">Birthday</label>
                    </div>
                    <div class="col-10">
                        <div class="datepicker date d-flex  mt-0 mx-auto">
                            <div class="input-group">
                                <input name="birthday" type="text" value="{{ date('Y-m-d', strtotime($employee->birthday)) }}" class="form-control date-picker">
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
                        <label class="label-search" for="">Sex</label>
                    </div>
                    <div class="col-10 select-custom">
                        <select name="sex" class="" id="status" style="width: 100% !important">
                        <option @if($employee->sex=="male" ) selected @endif value="male">Male</option>
                        <option @if($employee->sex =="female") selected @endif value="female">Female</option>
                    </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <div class="row">
                    <div class="col-2">
                        <label class="label-search" class="label-search" for="">Password</label>
                    </div>
                    <div class="col-10">
                        <input name="password" class="form-control" type="text">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col-2">
                        <label class="label-search" for="">Role</label>
                    </div>
                    <div class="col-10 select-custom">
                        <select class="form-control" name="role_id" class="" id="status" style="width: 100% !important">
                        @forelse($roles as $role)
                            <option value="{{ $role->id }}" @if($employee->role_id ==$role->id ) selected @endif>{{ $role->role_name }}</option>
                        @empty 
                            <option value="">No option</option>
                        @endforelse
                    </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-6">
                <div class="row">
                    <div class="col-2">
                        <label class="label-search" for="">Avatar</label>
                    </div>
                    <div class="col-10">
                        <img class="my-2 avatar-employee" src="{{ asset('storage/assets/img/employee/'.$employee->image) }}" alt="1">
                        <input class="form-control" type="file" name="upload_image" id="">
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