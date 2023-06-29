@extends('admin.layout.layout') @section('content')
<div class="container-fluid mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
            <li class="breadcrumb-item">
                <!-- if breadcrumb is single--><span>Home</span>
            </li>
            <li class="breadcrumb-item"><span>Role</span></li>
            <li class="breadcrumb-item active"><span>edit</span></li>
        </ol>
    </nav>
</div>
<div class="container-content">
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
            <input type="text" class="form-control" id="title" placeholder="Enter title" value="Manager">
        </div>
    </div>
    <div class="row permission mt-5">
        <div class="col-2">
            <label class="title" class="lable-role" for="">Permission</label>
        </div>
        <div class="col-10">
            <div class="row">
                <div class="col-3">
                    <p class="title">Employee</p>
                    <div class="container-checkbox">
                        <input type="checkbox" name="" id="" checked>
                        <label for="">Employee menu</label>
                    </div>
                    <div class="container-checkbox">
                        <input type="checkbox" name="" id="" checked>
                        <label for="">Employee list</label>
                    </div>
                    <div class="container-checkbox">
                        <input type="checkbox" name="" id="" checked>
                        <label for="">Employee create</label>
                    </div>
                    <div class="container-checkbox">
                        <input type="checkbox" name="" id="" checked>
                        <label for="">Employee edit</label>
                    </div>
                    <div class="container-checkbox">
                        <input type="checkbox" name="" id="" checked>
                        <label for="">Employee delete</label>
                    </div>
                </div>
                <div class="col-3">
                    <p class="title">Role</p>
                    <div class="container-checkbox">
                        <input type="checkbox" name="" id="" checked>
                        <label for="">Role menu</label>
                    </div>
                    <div class="container-checkbox">
                        <input type="checkbox" name="" id="" checked>
                        <label for="">Role list</label>
                    </div>
                    <div class="container-checkbox">
                        <input type="checkbox" name="" id="" checked>
                        <label for="">Role create</label>
                    </div>
                    <div class="container-checkbox">
                        <input type="checkbox" name="" id="" checked>
                        <label for="">Role edit</label>
                    </div>
                    <div class="container-checkbox">
                        <input type="checkbox" name="" id="" checked>
                        <label for="">Role delete</label>
                    </div>
                </div>
                <div class="col-3">
                    <p class="title">Attendance</p>
                    <div class="container-checkbox">
                        <input type="checkbox" name="" id="" checked>
                        <label for="">Attendance menu</label>
                    </div>
                    <div class="container-checkbox">
                        <input type="checkbox" name="" id="" checked>
                        <label for="">Attendance list</label>
                    </div>
                    <div class="container-checkbox">
                        <input type="checkbox" name="" id="" checked>
                        <label for="">Attendance create</label>
                    </div>
                    <div class="container-checkbox">
                        <input type="checkbox" name="" id="" checked>
                        <label for="">Attendance edit</label>
                    </div>
                    <div class="container-checkbox">
                        <input type="checkbox" name="" id="" checked>
                        <label for="">Attendance delete</label>
                    </div>
                </div>
                <div class="col-3">
                    <p class="title">Request off</p>
                    <div class="container-checkbox">
                        <input type="checkbox" name="" id="" checked>
                        <label for="">Request off menu</label>
                    </div>
                    <div class="container-checkbox">
                        <input type="checkbox" name="" id="" checked>
                        <label for="">Request off list</label>
                    </div>
                    <div class="container-checkbox">
                        <input type="checkbox" name="" id="" checked>
                        <label for="">Request off create</label>
                    </div>
                    <div class="container-checkbox">
                        <input type="checkbox" name="" id="" checked>
                        <label for="">Request off edit</label>
                    </div>
                    <div class="container-checkbox">
                        <input type="checkbox" name="" id="" checked>
                        <label for="">Request off delete</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row permission mt-5">
        <div class="col-2">
            <label class="lable-role" for=""></label>
        </div>
        <div class="col-10">
            <div class="row">
                <div class="col-3">
                    <p class="title">Employee</p>
                    <div class="container-checkbox">
                        <input type="checkbox" name="" id="">
                        <label for="">Employee menu</label>
                    </div>
                    <div class="container-checkbox">
                        <input type="checkbox" name="" id="">
                        <label for="">Employee list</label>
                    </div>
                    <div class="container-checkbox">
                        <input type="checkbox" name="" id="" checked>
                        <label for="">Employee create</label>
                    </div>
                    <div class="container-checkbox">
                        <input type="checkbox" name="" id="">
                        <label for="">Employee edit</label>
                    </div>
                    <div class="container-checkbox">
                        <input type="checkbox" name="" id="">
                        <label for="">Employee delete</label>
                    </div>
                </div>
                <div class="col-3">
                    <p class="title">Employee</p>
                    <div class="container-checkbox">
                        <input type="checkbox" name="" id="">
                        <label for="">Employee menu</label>
                    </div>
                    <div class="container-checkbox">
                        <input type="checkbox" name="" id="">
                        <label for="">Employee list</label>
                    </div>
                    <div class="container-checkbox">
                        <input type="checkbox" name="" id="" checked>
                        <label for="">Employee create</label>
                    </div>
                    <div class="container-checkbox">
                        <input type="checkbox" name="" id="">
                        <label for="">Employee edit</label>
                    </div>
                    <div class="container-checkbox">
                        <input type="checkbox" name="" id="" checked>
                        <label for="">Employee delete</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="btn btn-primary">Save</div>
        </div>
    </div>
</div>
@endsection