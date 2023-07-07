@extends('admin.layout.layout') @section('content')
<div class="container-fluid mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
            <li class="breadcrumb-item">
                <!-- if breadcrumb is single--><span>Home</span>
            </li>
            <li class="breadcrumb-item"><span>Role</span></li>
            <li class="breadcrumb-item active"><span>create</span></li>
        </ol>
    </nav>
</div>
<div class="container-content">
<form class="form-create bg-white p-4" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row mt-3 mb-5">
        <div class="col">
            <h5>Role edit</h5>
        </div>
        <div class="col">
            <a href="{{ route('admin.role.index') }}" class="btn btn-success float-end text-white">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <label class="title" class="lable-role" for="">Name role</label>
        </div>
        <div class="col-10">
            <input type="text" name="role_name" class="form-control" id="title" placeholder="Enter title">
        </div>
    </div>
    <div class="row permission mt-5">
        <div class="col-2">
            <label class="title" class="lable-role" for="">Permission</label>
        </div>
        <div class="col-10">
            <div class="row">
            @foreach ($permissions as $key => $permission)
                <div class="col-3">
                    <p class="title">{{ $key }}</p>
                            @foreach ($permission as $item)
                            <div class="container-checkbox">
                                <input value="{{ $item['id'] }}" type="checkbox" name="permission_id[]" id="">
                                <label for="">{{ $item['permission_name'] }}</label>
                                </div>
                             @endforeach
                </div>
            @endforeach
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="submit" class="btn btn-primary" value="Save"></input>
        </div>
    </div>
    </form>
</div>
@endsection