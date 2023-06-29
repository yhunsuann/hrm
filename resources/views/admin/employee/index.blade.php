@extends('admin.layout.layout') @section('content')
<div class="container-fluid mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
            <li class="breadcrumb-item">
                <!-- if breadcrumb is single--><span>Home</span>
            </li>
            <li class="breadcrumb-item active"><span>employee</span></li>
        </ol>
    </nav>
</div>
<div class="container-content">
<form id="form-employee" class="mb-0" method="get">
    <div class="row px-4 mt-3">
        <div class="col p-0">
            <h5>List employee</h5>
        </div>
        <div class="col search">
            <div class="row float-end search-row">
                <div class="col-10 p-0">
                    <div class="input-group">
                        <select class="form-control" name="name"  id="status" style="width: 100% !important">
                            <option selected value="">Search employee...</option>
                            @forelse($emlpoyees as $data_name)
                                <option value="{{ $data_name->full_name }}">{{ $data_name->full_name }}</option>
                            @empty 
                                <option value="">No option</option>
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="col-2">
                    <a type="button" id="submit-button" class="search-button">
                        <svg class="icon-search">
                        <use xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-search') }}"></use>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</form>
    <div class="row mt-4">
        <div class="col col-table px-3 bg-white" style="overflow-x:auto;">
            <table class="table caption-top bg-white table table-striped table-hover mb-1">
                <thead>
                    <tr class="py-3">
                        <th scope="col"><b>Full name</b></th>
                        <th scope="col"><b>Role</b></th>
                        <th scope="col"><b>Number Phone</b></th>
                        <th scope="col"><b>Email</b></th>
                        <th scope="col"><b>Joining Date</b></th>
                        <th scope="col" class="text-center"><b>Action</b></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse($emlpoyees as $emlpoyee)
                    <tr>
                        <td>{{ $emlpoyee->full_name }}</td>
                        <td>{{ $emlpoyee->role_employee->role_name}}</td>
                        <td>{{ $emlpoyee->number_phone }}</td>
                        <td>{{ $emlpoyee->email }}</td>
                        <td>{{ $emlpoyee->created_at }}</td>
                        <td class="text-center action-form">
                            <a href="{{ route('admin.employee.edit',$emlpoyee->id) }}" class="cursor-pointer btn-edit"><i class="fa fa-solid fa-wrench"></i></a>&nbsp;
                            <a data-id="{{ $emlpoyee->id }}" m-type="employee" type="button" data-coreui-toggle="modal" data-coreui-target="#exampleModal" class="open-modal btn-delete"><i class="fa fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    @empty 
                    <td class="text-center">No data</td>
                    @endforelse
                </tbody>
            </table>
            <div class="pagination--custom row mt-3">
                    <div class="col-5 pagination-info">
                        @php
                            $from = ($emlpoyees->currentPage() - 1) * $emlpoyees->perPage();
                            $to = $emlpoyees->currentPage() * $emlpoyees->perPage();
                            $total = $emlpoyees->total()
                        @endphp
                        Showing {{ $from }} to {{ $to < $total ? $to : $total  }} of {{ $total }} entries
                    </div>
                    <div class="pagination-box col-7">
                        {{ $emlpoyees->appends($_GET)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection