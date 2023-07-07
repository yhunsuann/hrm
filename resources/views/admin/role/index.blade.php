@extends('admin.layout.layout') @section('content') @include('admin.layout.partials.flag')
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
        <div class="col-8 p-0">
            <h5>List Role</h5>
        </div>
        <div class="col-4 search">
            <form id="form-employee" class="mb-0" method="get">
                <div class="row">
                    <div class="col-9 p-0 select-custom">
                        <select class="form-control" name="name" class="" id="status" style="width: 100% !important">
                        <option value="">Chosse role...</option>
                        @forelse($roles as $role)
                            <option value="{{ $role->role_name }}">{{ $role->role_name }}</option>
                        @empty 
                            <option value="">No option</option>
                        @endforelse
                    </select>
                    </div>
                    <div class="col-2 text-center">
                        <a type="button" id="submit-button" class="search-button">
                            <svg class="icon-search">
                            <use xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-search') }}"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="col-1 p-0">
                        <a href="{{ route('admin.role.index') }}" class="reset-button">
                            <i class="fa fas fa-undo"></i>
                        </a>
                    </div>
                </div>
            </form>
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
                    @forelse($permission_roles as $permission_role)
                    <tr>
                        <td>{{ $permission_role->role_name }}</td>
                        <td class="text-center">{{ $permission_role->total_permission_allow }}</td>
                        <td class="text-center action-form">
                            <a href="{{ route('admin.role.edit', $permission_role->id) }}" class="cursor-pointer btn-edit"><i class="fa fa-solid fa-wrench"></i></a>&nbsp;
                            <a data-id="{{ $permission_role->id }}" m-type="role" type="button" data-coreui-toggle="modal" data-coreui-target="#exampleModal" class="open-modal btn-delete"><i class="fa fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    @empty
                    <td colspan="3" class="text-center">No data</td>
                    @endforelse
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