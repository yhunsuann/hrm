@extends('admin.layout.layout') @section('content')
<div class="container-fluid mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
            <li class="breadcrumb-item">
                <!-- if breadcrumb is single--><span>Home</span>
            </li>
            <li class="breadcrumb-item active"><span>leave</span></li>
        </ol>
    </nav>
</div>
<div class="container-content">
    <div class="row px-4 mt-3">
        <div class="col p-0">
            <h5>Leave this month</h5>
        </div>
        <div class="col search">
            <div class="row float-end search-row">
                <div class="col-10 p-0">
                    <div class="input-group">
                    <select class="form-control" name="status" class="" id="status" style="width: 100% !important">
                            <option selected value="">June</option>
                            <option value="Manager">Manager</option>
                            <option value="Leader">Leader</option>
                            <option value="PM">PM</option>
                            <option value="Dev">Dev</option>
                        </select>
                    </div>
                </div>
                <div class="col-2">
                    <a href="">
                        <svg class="icon-search">
                            <use
                                xlink:href="{{ asset('CoreUi/vendors/@coreui/icons/svg/free.svg#cil-search') }}">
                            </use>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col col-table px-3 bg-white" style="overflow-x:auto;">
            <table class="table caption-top bg-white table table-striped table-hover mb-1">
                <thead>
                    <tr class="py-3">
                        <th scope="col"><b>Name</b></th>
                        <th scope="col"><b>Role</b></th>
                        <th scope="col"><b>Leave from</b></th>
                        <th scope="col"><b>Leave to</b></th>
                        <th scope="col"><b>Status</b></th>
                        <th scope="col" class="text-center"><b>Action</b></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr>
                        <td>Phuoc</td>
                        <td>Dev</td>
                        <td>25/06/2023</td>
                        <td>27/06/2023</td>
                        <td>Approve</td>
                        <td class="text-center action-form">
                        <a href="{{ route('admin.leave.detail',1) }}" class="cursor-pointer btn-edit"><i class="fa fa-solid fa-wrench"></i></a>&nbsp;
                            <a data-id="" m-type="recruitment" type="button" data-coreui-toggle="modal" data-coreui-target="#exampleModal" class="open-modal btn-delete"><i class="fa fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Danh</td>
                        <td>Dev</td>
                        <td>25/06/2023</td>
                        <td>27/06/2023</td>
                        <td>Approve</td>
                        <td class="text-center action-form">
                        <a href="{{ route('admin.attendance.detail',1) }}" class="cursor-pointer btn-edit"><i class="fa fa-solid fa-wrench"></i></a>&nbsp;
                            <a data-id="" m-type="recruitment" type="button" data-coreui-toggle="modal" data-coreui-target="#exampleModal" class="open-modal btn-delete"><i class="fa fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Tuan</td>
                        <td>Dev</td>
                        <td>25/06/2023</td>
                        <td>27/06/2023</td>
                        <td>--</td>
                        <td class="text-center action-form">
                        <a href="{{ route('admin.attendance.detail',1) }}" class="cursor-pointer btn-edit"><i class="fa fa-solid fa-wrench"></i></a>&nbsp;
                            <a data-id="" m-type="recruitment" type="button" data-coreui-toggle="modal" data-coreui-target="#exampleModal" class="open-modal btn-delete"><i class="fa fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Tuong</td>
                        <td>Dev</td>
                        <td>25/06/2023</td>
                        <td>27/06/2023</td>
                        <td>Refuse</td>
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