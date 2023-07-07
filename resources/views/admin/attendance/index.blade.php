@extends('admin.layout.layout') @section('content') @include('admin.layout.partials.flag')
<div class="container-fluid mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
            <li class="breadcrumb-item">
                <!-- if breadcrumb is single--><span>Home</span>
            </li>
            <li class="breadcrumb-item active"><span>attendance </span></li>
        </ol>
    </nav>
</div>
<div class="container-content">
    <div class="row px-4 mt-3">
        <div class="col p-0">
            <h5>Attendance this month</h5>
        </div>
    </div>
    <div class="row">
        <div class="col"></div>
        <div class="col search">
            <form id="form-employee" class="mb-0" method="get">
                <div class="row">
                    <div class="col-5 p-0">
                        <div class="datepicker-month date d-flex  mt-0 mx-auto">
                            <div class="input-group">
                                <input placeholder="Change month..." value="{{ request()->month }}" name="month" type="text" class="form-control date-picker">
                                <div class="input-group-append">
                                    <span class="input-group-text h-100"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-5">
                        <select class="form-control" name="name" id="status" style="width: 100% !important">
                            <option selected value="">Search employee...</option>
                            @if(request()->has('name'))
                            <option value="{{ request()->name  }}" selected>{{ request()->name }}</option>
                            @endif
                            @forelse($emlpoyees as $data_name)
                                <option value="{{ $data_name->full_name }}">{{ $data_name->full_name }}</option>
                            @empty 
                                <option value="">No option</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="col-1 text-end">
                        <a type="button" id="submit-button" class="search-button">
                            <svg class="icon-search">
                            <use xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-search') }}"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="col-1 text-start p-0">
                        <a href="{{ route('admin.attendance.index') }}" class="reset-button">
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
                        <th scope="col"><b>Full name</b></th>
                        <th scope="col"><b>Role</b></th>
                        <th scope="col"><b>Total work</b></th>
                        <th scope="col"><b>Total days off</b></th>
                        <th scope="col"><b>Total days late</b></th>
                        <th scope="col" class="text-center"><b>Action</b></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse($attendances as $attendance)
                    <tr>
                        <td>{{ $attendance->full_name }}</td>
                        <td>{{ $attendance->role_name }}</td>
                        <td>{{ $attendance->total_working_days }}</td>
                        <td>{{ $attendance->total_off }}</td>
                        <td>{{ $attendance->total_late }}</td>

                        <td class="text-center action-form">
                            <a href="{{ route('admin.attendance.detail',$attendance->employee_id) }}" class="cursor-pointer btn-edit"><i class="fa fa-solid fa-wrench"></i></a>&nbsp;
                            <a data-id="" m-type="recruitment" type="button" data-coreui-toggle="modal" data-coreui-target="#exampleModal" class="open-modal btn-delete"><i class="fa fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    @empty
                    <td colspan="6" class="text-center">No Data</td>
                    @endforelse
                </tbody>
            </table>
            <div class="pagination--custom row mt-3">
                <div class="col-5 pagination-info">
                    @php $from = ($attendances->currentPage() - 1) * $attendances->perPage(); $to = $attendances->currentPage() * $attendances->perPage(); $total = $attendances->total() @endphp Showing {{ $from }} to {{ $to
                    < $total ? $to : $total }} of {{ $total }} entries </div>
                        <div class="pagination-box col-7">
                            {{ $attendances->appends($_GET)->links() }}
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection