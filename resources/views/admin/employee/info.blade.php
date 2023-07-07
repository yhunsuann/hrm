@extends('admin.layout.layout') @section('content') @include('admin.layout.partials.flag')
<div class="container-fluid mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
            <li class="breadcrumb-item">
                <!-- if breadcrumb is single--><span>Home</span>
            </li>
            <li class="breadcrumb-item "><span>employee</span></li>
            <li class="breadcrumb-item active"><span>Information</span></li>
    </nav>
</div>
<div class="container-content">
    <div class="row">
        <div class="col">
            <h4>Information</h4>
        </div>
    </div>
    <form class="form-create bg-white p-4" action="{{ route('admin.employee.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mt-5">
            <div class="col">
                <div class="row">
                    <div class="col-3">
                        <label for="">Full name</label>
                    </div>
                    <div class="col-9">
                        <h6>{{ $employee->full_name }}</h6>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col-3">
                        <label for="">Email</label>
                    </div>
                    <div class="col-9">
                        <h6>{{ $employee->email }}</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <div class="row">
                    <div class="col-3">
                        <label for="">Address</label>
                    </div>
                    <div class="col-9">
                         <h6>{{ $employee->address }}</h6> 
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col-3">
                        <label for="">Phone</label>
                    </div>
                    <div class="col-9">
                        <h6>{{ $employee->number_phone }}</h6> 
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <div class="row">
                    <div class="col-3">
                        <label for="">Bank Account</label>
                    </div>
                    <div class="col-9">
                        <h6>{{ $employee->bank_account }}</h6> 
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col-3">
                        <label for="">Bank name</label>
                    </div>
                    <div class="col-9">
                        <h6>{{ $employee->bank_name }}</h6> 
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <div class="row">
                    <div class="col-3">
                        <label class="label-search" for="">Birthday</label>
                    </div>
                    <div class="col-9">
                         <h6>{{ $employee->birthday }}</h6> 
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col-3">
                        <label class="label-search" for="">Sex</label>
                    </div>
                    <div class="col-9 select-custom">
                        <h6>{{ $employee->sex }}</h6> 
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-6">
                <div class="row">
                    <div class="col-3">
                        <label class="label-search" for="">Avatar</label>
                    </div>
                    <div class="col-9">
                        <img class="my-2 avatar-employee" src="{{ asset('storage/assets/img/employee/'.$employee->image) }}" alt="1">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col-3">
                        <label class="label-search" for="">Role</label>
                    </div>
                    <div class="col-9 select-custom">
                        @forelse($roles as $role)
                        <h6>@if($employee->role_id ==$role->id ){{ $role->role_name }} @endif</h6>
                        @empty 
                        @endforelse
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