@extends('admin.layout.layout') @section('content') @include('admin.layout.partials.flag')
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
        <div class="col-6 p-0">
            <h5>List project</h5>
        </div>
    </div>
    <div class="row">
        <div class="col"></div>
        <div class="col search">
            <form id="form-employee" class="mb-0" method="get">
                <div class="row">
                    <div class="col-10 p-0">
                        <div class="input-group">
                            <select class="form-control" name="name" class="" id="status">
                            <option selected value="">Choosee project...</option>
                            @forelse($projects as $project_name)
                                <option value="{{$project_name->project_name}}">{{$project_name->project_name}}</option>
                            @empty
                                <option value=""></option>
                            @endforelse
                        </select>
                        </div>
                    </div>
                    <div class="col-1 text-end">
                        <a type="button" id="submit-button" class="search-button">
                            <svg class="icon-search">
                            <use xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-search') }}"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="col-1 text-start p-0">
                        <a href="{{ route('admin.project.index') }}" class="reset-button">
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
                        <th scope="col"><b>Name</b></th>
                        <th width="300px" scope="col"><b>Team</b></th>
                        <th scope="col"><b>Start date</b></th>
                        <th scope="col"><b>End date</b></th>
                        <th scope="col"><b>Status</b></th>
                        <th scope="col" class="text-center"><b>Action</b></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse($projects as $project)
                    <tr>
                        <td>{{ $project->project_name }}</td>
                        <td>
                            <p class="team-project">{{ $project->team === null ? '--' : $project->team }} </p>
                        </td>
                        <td>{{ $project->start_date === null ? '--' : \Carbon\Carbon::parse($project->start_date)->format('d-m-Y') }}</td>
                        <td>{{ $project->start_date === null ? '--' : \Carbon\Carbon::parse($project->end_date)->format('d-m-Y') }}</td>
                        <td>{{ $project->status === null ? '--' : $project->status }}</td>
                        <td class="text-center action-form">
                            <a href="{{ route('admin.project.edit', $project->id) }}" class="cursor-pointer btn-edit"><i class="fa fa-solid fa-wrench"></i></a>&nbsp;
                            <a data-id="{{ $project->id }}" m-type="project" type="button" data-coreui-toggle="modal" data-coreui-target="#exampleModal" class="open-modal btn-delete"><i class="fa fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    @empty
                    <td colspan="6" class="text-center">No data</td>
                    @endforelse
                </tbody>
            </table>
            <div class="pagination--custom row mt-3">
                <div class="col-5 pagination-info">
                    @php $from = ($projects->currentPage() - 1) * $projects->perPage(); $to = $projects->currentPage() * $projects->perPage(); $total = $projects->total() @endphp Showing {{ $from }} to {{ $to
                    < $total ? $to : $total }} of {{ $total }} entries </div>
                        <div class="pagination-box col-7">
                            {{ $projects->appends($_GET)->links() }}
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection