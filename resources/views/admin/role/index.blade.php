@extends('admin.layout.layout') @section('content')
<div class="container-fluid mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
            <li class="breadcrumb-item">
                <!-- if breadcrumb is single--><span>Home</span>
            </li>
            <li class="breadcrumb-item active"><span>Role</span></li>
        </ol>
    </nav>
</div>
<div class="container-content">
    <div class="row px-4 mt-3">
        <div class="col p-0">
            <h5>List Role</h5>
        </div>
        <div class="col search">
            <div class="row float-end search-row">
                <div class="col-10 p-0">
                    <select class="form-control" name="status" class="" id="status" style="width: 100% !important">
                        <option selected value="">Choose role...</option>
                        <option value="Manager">Manager</option>
                        <option value="Leader">Leader</option>
                        <option value="PM">PM</option>
                        <option value="Dev">Dev</option>
                    </select>
                </div>
                <div class="col-2">
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
    <div class="row mt-4">
        <div class="col col-table px-3 bg-white" style="overflow-x:auto;">
            <table class="table caption-top bg-white table table-striped table-hover mb-1">
                <thead>
                    <tr class="py-3">
                        <th scope="col"><b>Role Name</b></th>
                        <th class="text-center" scope="col"><b>Total permission allow</b></th>
                        <th scope="col" class="text-center"><b>Action</b></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr>
                        <td>Admin</td>
                        <td class="text-center">12</td>
                        <td class="text-center action-form">
                            <a href="{{ route('admin.role.edit',1) }}" class="cursor-pointer btn-edit"><i class="fa fa-solid fa-wrench"></i></a>&nbsp;
                            <a data-id="" m-type="recruitment" type="button" data-coreui-toggle="modal" data-coreui-target="#exampleModal" class="open-modal btn-delete"><i class="fa fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>PM</td>
                        <td class="text-center">9</td>
                        <td class="text-center action-form">
                            <a href="" class="cursor-pointer btn-edit"><i class="fa fa-solid fa-wrench"></i></a>&nbsp;
                            <a data-id="" m-type="recruitment" type="button" data-coreui-toggle="modal" data-coreui-target="#exampleModal" class="open-modal btn-delete"><i class="fa fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Leader</td>
                        <td class="text-center">7</td>
                        <td class="text-center action-form">
                            <a href="" class="cursor-pointer btn-edit"><i class="fa fa-solid fa-wrench"></i></a>&nbsp;
                            <a data-id="" m-type="recruitment" type="button" data-coreui-toggle="modal" data-coreui-target="#exampleModal" class="open-modal btn-delete"><i class="fa fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Manager</td>
                        <td class="text-center">6</td>
                        <td class="text-center action-form">
                            <a href="" class="cursor-pointer btn-edit"><i class="fa fa-solid fa-wrench"></i></a>&nbsp;
                            <a data-id="" m-type="recruitment" type="button" data-coreui-toggle="modal" data-coreui-target="#exampleModal" class="open-modal btn-delete"><i class="fa fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Dev</td>
                        <td class="text-center">5</td>
                        <td class="text-center action-form">
                            <a href="" class="cursor-pointer btn-edit"><i class="fa fa-solid fa-wrench"></i></a>&nbsp;
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