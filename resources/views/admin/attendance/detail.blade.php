@extends('admin.layout.layout') @section('content')
<div class="container-fluid mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
            <li class="breadcrumb-item">
                <!-- if breadcrumb is single--><span>Home</span>
            </li>
            <li class="breadcrumb-item"><span>attendance</span></li>
            <li class="breadcrumb-item active"><span>detail</span></li>
        </ol>
    </nav>
</div>
<div class="container-content">
    <div class="row px-4 mt-3">
        <div class="col p-0">
            <h5>Attendance every month of {{ $attendances[0]->full_name }}</h5>
        </div>
        <form id="form-employee" class="mb-0" method="get">
        <div class="col search">
            <div class="row float-end search-row">
                    <div class="col-10 p-0">
                        <div class="input-group">
                        <select class="form-control" name="month" class="" id="status" style="width: 100% !important">
                                @for ($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}" @if ($i == date('n')) selected @endif>
                                        {{ date('F', mktime(0, 0, 0, $i, 1)) }}
                                    </option>
                                @endfor
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
        </form>
    </div>
    <div class="row mt-4">
        <div class="col col-table px-3 bg-white" style="overflow-x:auto;">
            <table class="table caption-top bg-white table table-striped table-hover mb-1">
                <thead>
                    <tr class="py-3">
                        <th scope="col"><b>Date</b></th>
                        <th scope="col"><b>Check in</b></th>
                        <th scope="col"><b>Check out</b></th>
                        <th scope="col"><b>Status</b></th>
                        <th scope="col" class="text-center"><b>Action</b></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse($attendances as $attendance)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($attendance->attendances_date)->format('d-m-Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($attendance->check_in)->format('H:i') }}</td>
                        <td>{{ \Carbon\Carbon::parse($attendance->check_out)->format('H:i') }}</td>
                        <td>{{ $attendance->status }}</td>
                        <td class="text-center action-form">
                        <a href="{{ route('admin.attendance.detail',1) }}" class="cursor-pointer btn-edit"><i class="fa fa-solid fa-wrench"></i></a>&nbsp;
                            <a data-id="" m-type="recruitment" type="button" data-coreui-toggle="modal" data-coreui-target="#exampleModal" class="open-modal btn-delete"><i class="fa fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    @empty
                        <td colspan="5" class="text-center">No data</td>
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