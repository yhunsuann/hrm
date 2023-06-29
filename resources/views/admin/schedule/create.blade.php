@extends('admin.layout.layout') @section('content')
<div class="container-fluid mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
            <li class="breadcrumb-item">
                <!-- if breadcrumb is single--><span>Home</span>
            </li>
            <li class="breadcrumb-item"><span>schedule</span></li>
            <li class="breadcrumb-item active"><span>create</span></li>
        </ol>
    </nav>
</div>
<div class="container-content">
    <div class="row px-4 mt-3">
        <div class="col-3 p-0">
            <h5>Create schedule</h5>
        </div>
        <div class="col-9 search">
            <div class="row float-end search-row select-filter">
                <div class="col-5">
                    <select onchange="changeInput()" class="form-control" name="status" id="select-filter" style="width: 100% !important">
                            <option value="date" selected>Date</option>
                            <option value="month">Month</option>
                            <option value="year">Year</option>
                        </select>
                </div>
                <div class="col-5 value-select">

                </div>
                <div class="col-2 text-center">
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
                        <th scope="col"><b>Shift-1</b></th>
                        <th scope="col"><b>Shift-2</b></th>
                        <th scope="col"><b>Shift-3</b></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr>
                        <td>Bui Phuoc</td>
                        <td>Manager</td>
                        <td>26/06/2023</td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>

                    </tr>
                    <tr>
                        <td>Danh</td>
                        <td>Manager</td>
                        <td>26/06/2023</td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                    </tr>
                    <tr>
                        <td>Tuan</td>
                        <td>Manager</td>
                        <td>26/06/2023</td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                    </tr>
                    <tr>
                        <td>Tho</td>
                        <td>Manager</td>
                        <td>26/06/2023</td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                    </tr>
                    <tr>
                        <td>Linh</td>
                        <td>Manager</td>
                        <td>26/06/2023</td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                    </tr>
                    <tr>
                        <td>Nam</td>
                        <td>Manager</td>
                        <td>26/06/2023</td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                    </tr>
                    <tr>
                        <td>Nghia</td>
                        <td>Manager</td>
                        <td>26/06/2023</td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                    </tr>
                    <tr>
                        <td>Nhi</td>
                        <td>Manager</td>
                        <td>26/06/2023</td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                    </tr>
                    <tr>
                        <td>Tram</td>
                        <td>Manager</td>
                        <td>26/06/2023</td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                    </tr>
                    <tr>
                        <td>Nho</td>
                        <td>Manager</td>
                        <td>26/06/2023</td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
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
    <div class="row mt-5">
        <div class="col text-end">
            <div class="btn btn-primary">Save</div>
        </div>
    </div>
</div>
</div>
@endsection