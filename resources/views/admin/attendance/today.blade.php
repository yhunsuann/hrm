@extends('admin.layout.layout') @section('content')
<div class="container-today">
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <h6>{{ auth()->user()->full_name }}</h6>
        <h6 id="current-time"></h6>
        <input class="btn btn-success text-white" type="submit" value="Attendance">
    </form>
</div>
@endsection