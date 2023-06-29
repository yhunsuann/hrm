@extends('admin.layout.layout') @section('content')
<div class="container-fluid mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
            <li class="breadcrumb-item">
                <!-- if breadcrumb is single--><span>Home</span>
            </li>
            <li class="breadcrumb-item active"><span>project</span></li>
        </ol>
    </nav>
</div>
<div class="container-content">
    <div class="row px-4 mt-3">
        <div class="col p-0">
            <h5>List project</h5>
        </div>
        <div class="col search">
            <div class="row float-end search-row">
                <div class="col-10 p-0">
                    <div class="input-group">
                        <select class="form-control" name="status" class="" id="status" style="width: 100% !important">
                            <option selected value=""></option>
                            <option value="Manager">hrm_1</option>
                            <option value="Leader">hrm_2</option>
                            <option value="PM">hrm_3</option>
                            <option value="Dev">hrm_4</option>
                        </select>
                    </div>
                </div>
                <div class="col-2">
                    <a href="">
                        <svg class="icon-search">
                            <use
                                xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-search') }}">
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
                        <th scope="col"><b>Id</b></th>
                        <th scope="col"><b>Name</b></th>
                        <th scope="col"><b>Team</b></th>
                        <th scope="col"><b>Start_date</b></th>
                        <th scope="col"><b>Start_end</b></th>
                        <th scope="col"><b>Status</b></th>
                        <th scope="col" class="text-center"><b>Action</b></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr>
                        <td>hrm_1</td>
                        <td>Project HRM rubiklab</td>
                        <td>Phuoc,Linh,Tho</td>
                        <td>25/06/2023</td>
                        <td>25/07/2023</td>
                        <td>Pedding</td>
                        <td class="text-center action-form">
                            <a href="{{ route('admin.project.edit',1) }}" class="cursor-pointer btn-edit"><i class="fa fa-solid fa-wrench"></i></a>&nbsp;
                            <a data-id="" m-type="recruitment" type="button" data-coreui-toggle="modal" data-coreui-target="#exampleModal" class="open-modal btn-delete"><i class="fa fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>hrm_3</td>
                        <td>Project HRM rubiklab</td>
                        <td>Phuoc,Linh,Tho,tuan,danh</td>
                        <td>25/06/2023</td>
                        <td>25/07/2023</td>
                        <td>Pedding</td>
                        <td class="text-center action-form">
                            <a href="{{ route('admin.employee.edit',1) }}" class="cursor-pointer btn-edit"><i class="fa fa-solid fa-wrench"></i></a>&nbsp;
                            <a data-id="" m-type="recruitment" type="button" data-coreui-toggle="modal" data-coreui-target="#exampleModal" class="open-modal btn-delete"><i class="fa fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>hrm_2</td>
                        <td>Project HRM rubiklab</td>
                        <td>Phuoc,Linh,Tho,tuan</td>
                        <td>25/06/2023</td>
                        <td>25/07/2023</td>
                        <td>Pedding</td>
                        <td class="text-center action-form">
                            <a href="{{ route('admin.employee.edit',1) }}" class="cursor-pointer btn-edit"><i class="fa fa-solid fa-wrench"></i></a>&nbsp;
                            <a data-id="" m-type="recruitment" type="button" data-coreui-toggle="modal" data-coreui-target="#exampleModal" class="open-modal btn-delete"><i class="fa fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>hrm_4</td>
                        <td>Project HRM rubiklab</td>
                        <td>Phuoc,Linh,Tho,tuan</td>
                        <td>25/06/2023</td>
                        <td>25/07/2023</td>
                        <td>Pedding</td>
                        <td class="text-center action-form">
                            <a href="{{ route('admin.employee.edit',1) }}" class="cursor-pointer btn-edit"><i class="fa fa-solid fa-wrench"></i></a>&nbsp;
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