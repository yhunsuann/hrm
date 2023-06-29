@extends('admin.layout.layout') @section('content')
<div class="container-fluid mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
            <li class="breadcrumb-item">
                <!-- if breadcrumb is single--><span>Home</span>
            </li>
            <li class="breadcrumb-item active"><span>schedule</span></li>
        </ol>
    </nav>
</div>
<div class="container-content">
    <div class="row px-4 mt-3">
        <div class="col p-0">
            <h5>Schedule every day</h5>
        </div>
        <div class="col search">
            <div class="row float-end search-row">
                <div class="col-10 p-0">
                    <div class="datepicker date d-flex  mt-0 mx-auto">
                        <div class="input-group">
                            <input name="dateFrom" type="text" value="26/06/2023" placeholder="From date" class="form-control date-picker">
                            <div class="input-group-append">
                                <span class="input-group-text h-100"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-2 text-end">
                    <a href="">
                        <svg class="icon-search">
                            <use
                                xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-search') }}">
                            </use>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col col-table px-3 bg-white" style="overflow-x:auto;">
            <table class="table caption-top bg-white table table-striped table-hover mb-1">
                <thead>
                    <tr class="py-3">
                        <th scope="col"><b>Full name</b></th>
                        <th scope="col"><b>Role</b></th>
                        <th scope="col"><b>Day</b></th>
                        <th scope="col"><b>Shift</b></th>
                        <th scope="col" class="text-center"><b>Action</b></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr>
                        <td>Bui Phuoc</td>
                        <td>Manager</td>
                        <td>26/06/2023</td>
                        <td>Shift-1</td>
                        <td class="text-center action-form">
                            <a href="{{ route('admin.attendance.detail',1) }}" class="cursor-pointer btn-edit"><i class="fa fa-solid fa-wrench"></i></a>&nbsp;
                            <a data-id="" m-type="recruitment" type="button" data-coreui-toggle="modal" data-coreui-target="#exampleModal" class="open-modal btn-delete"><i class="fa fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Bui Phuoc</td>
                        <td>Manager</td>
                        <td>26/06/2023</td>
                        <td>Shift-2</td>
                        <td class="text-center action-form">
                            <a href="{{ route('admin.attendance.detail',1) }}" class="cursor-pointer btn-edit"><i class="fa fa-solid fa-wrench"></i></a>&nbsp;
                            <a data-id="" m-type="recruitment" type="button" data-coreui-toggle="modal" data-coreui-target="#exampleModal" class="open-modal btn-delete"><i class="fa fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Danh</td>
                        <td>Manager</td>
                        <td>26/06/2023</td>
                        <td>Shift-1</td>
                        <td class="text-center action-form">
                            <a href="{{ route('admin.attendance.detail',1) }}" class="cursor-pointer btn-edit"><i class="fa fa-solid fa-wrench"></i></a>&nbsp;
                            <a data-id="" m-type="recruitment" type="button" data-coreui-toggle="modal" data-coreui-target="#exampleModal" class="open-modal btn-delete"><i class="fa fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Tuan</td>
                        <td>Manager</td>
                        <td>26/06/2023</td>
                        <td>Shift-1</td>
                        <td class="text-center action-form">
                            <a href="{{ route('admin.attendance.detail',1) }}" class="cursor-pointer btn-edit"><i class="fa fa-solid fa-wrench"></i></a>&nbsp;
                            <a data-id="" m-type="recruitment" type="button" data-coreui-toggle="modal" data-coreui-target="#exampleModal" class="open-modal btn-delete"><i class="fa fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Tho</td>
                        <td>Manager</td>
                        <td>26/06/2023</td>
                        <td>Shift-2</td>
                        <td class="text-center action-form">
                            <a href="{{ route('admin.attendance.detail',1) }}" class="cursor-pointer btn-edit"><i class="fa fa-solid fa-wrench"></i></a>&nbsp;
                            <a data-id="" m-type="recruitment" type="button" data-coreui-toggle="modal" data-coreui-target="#exampleModal" class="open-modal btn-delete"><i class="fa fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Linh</td>
                        <td>Manager</td>
                        <td>26/06/2023</td>
                        <td>Shift-1</td>
                        <td class="text-center action-form">
                            <a href="{{ route('admin.attendance.detail',1) }}" class="cursor-pointer btn-edit"><i class="fa fa-solid fa-wrench"></i></a>&nbsp;
                            <a data-id="" m-type="recruitment" type="button" data-coreui-toggle="modal" data-coreui-target="#exampleModal" class="open-modal btn-delete"><i class="fa fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Nam</td>
                        <td>Manager</td>
                        <td>26/06/2023</td>
                        <td>Shift-2</td>
                        <td class="text-center action-form">
                            <a href="{{ route('admin.attendance.detail',1) }}" class="cursor-pointer btn-edit"><i class="fa fa-solid fa-wrench"></i></a>&nbsp;
                            <a data-id="" m-type="recruitment" type="button" data-coreui-toggle="modal" data-coreui-target="#exampleModal" class="open-modal btn-delete"><i class="fa fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Nghia</td>
                        <td>Manager</td>
                        <td>26/06/2023</td>
                        <td>Shift-1</td>
                        <td class="text-center action-form">
                            <a href="{{ route('admin.attendance.detail',1) }}" class="cursor-pointer btn-edit"><i class="fa fa-solid fa-wrench"></i></a>&nbsp;
                            <a data-id="" m-type="recruitment" type="button" data-coreui-toggle="modal" data-coreui-target="#exampleModal" class="open-modal btn-delete"><i class="fa fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Nhi</td>
                        <td>Manager</td>
                        <td>26/06/2023</td>
                        <td>Shift-2</td>
                        <td class="text-center action-form">
                            <a href="{{ route('admin.attendance.detail',1) }}" class="cursor-pointer btn-edit"><i class="fa fa-solid fa-wrench"></i></a>&nbsp;
                            <a data-id="" m-type="recruitment" type="button" data-coreui-toggle="modal" data-coreui-target="#exampleModal" class="open-modal btn-delete"><i class="fa fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Tram</td>
                        <td>Manager</td>
                        <td>26/06/2023</td>
                        <td>Shift-2</td>
                        <td class="text-center action-form">
                            <a href="{{ route('admin.attendance.detail',1) }}" class="cursor-pointer btn-edit"><i class="fa fa-solid fa-wrench"></i></a>&nbsp;
                            <a data-id="" m-type="recruitment" type="button" data-coreui-toggle="modal" data-coreui-target="#exampleModal" class="open-modal btn-delete"><i class="fa fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Nho</td>
                        <td>Manager</td>
                        <td>26/06/2023</td>
                        <td>Shift-2</td>
                        <td class="text-center action-form">
                            <a href="{{ route('admin.attendance.detail',1) }}" class="cursor-pointer btn-edit"><i class="fa fa-solid fa-wrench"></i></a>&nbsp;
                            <a data-id="" m-type="recruitment" type="button" data-coreui-toggle="modal" data-coreui-target="#exampleModal" class="open-modal btn-delete"><i class="fa fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="pagination--custom row mt-3">
                <div class="col-6 pagination-info">
                    Showing 0 to 1 of 1 entries
                </div>
                <div class="pagination-box col-6">

                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection