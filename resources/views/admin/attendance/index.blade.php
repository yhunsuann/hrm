@extends('admin.layout.layout') @section('content')
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
        <form id="form-employee" class="mb-0" method="get">
            <div class="col search">
                <div class="row float-end search-row">
                    <div class="col-5 p-0">
                        <div class="input-group">
                            <select name="month" class="form-control">
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}" @if ($i == date('n')) selected @endif>
                                    {{ date('F', mktime(0, 0, 0, $i, 1)) }}
                                </option>
                            @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-5">
                        <select class="form-control" name="name" id="status" style="width: 100% !important">
                            <option selected value="">Search employee...</option>
                            @forelse($emlpoyees as $data_name)
                                <option value="{{ $data_name->full_name }}">{{ $data_name->full_name }}</option>
                            @empty 
                                <option value="">No option</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="col-2 text-end">
                        <a type="button" id="submit-button" class="search-button">
                            <svg class="icon-search">
                            <use xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-search') }}"></use>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </form>
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
                        <th scope="col"><b>Overtime</b></th>
                        <th scope="col" class="text-center"><b>Action</b></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse($attendances as $attendance)
                    <tr>
                        <td>{{ $attendance->full_name }}</td>
                        <td>{{ $attendance->role_name }}</td>
                        <td>{{ $attendance->total_working_days }}</td>
                        <td>2</td>
                        <td>0</td>
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