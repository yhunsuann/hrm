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
    <form class="form-create bg-white p-4" action="{{ route('admin.attendance.update', $attendance->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mt-5">
            <div class="col-6">
                <div class="row">
                    <div class="col-2">
                        <label class="label-search" for="">Check in</label>
                    </div>
                    <div class="col-10">
                        <input value="{{ $attendance->check_in  }}" name="check_in" class="form-control" type="time">
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-2">
                        <label class="label-search" for="">Check out</label>
                    </div>
                    <div class="col-10">
                        <input value="{{ $attendance->check_out }}" name="check_out" class="form-control" type="time">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <div class="row">
                    <div class="col-2">
                        <label class="label-search" for="">Date</label>
                    </div>
                    <div class="col-10">
                        <div class="datepicker date d-flex  mt-0 mx-auto">
                            <div class="input-group">
                                <input name="attendances_date" type="text" value="{{ $attendance->attendances_date }}" class="form-control date-picker">
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
                        <label class="label-search" for="">Status</label>
                    </div>
                    <div class="col-10 select-custom">
                        <select name="status" class="" id="status" style="width: 100% !important">
                        <option @if($attendance->status =="present" ) selected @endif value="present">Present</option>
                        <option @if($attendance->status =="late" ) selected @endif value="late">Late</option>
                        <option @if($attendance->status =="leave" ) selected @endif value="leave">leave</option>
                    </select>
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