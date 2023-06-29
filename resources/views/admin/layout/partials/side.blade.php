<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
    HRM Project
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="init">
        <div class="simplebar-wrapper" style="margin: 0px;">
            <div class="simplebar-height-auto-observer-wrapper">
                <div class="simplebar-height-auto-observer"></div>
            </div>
            <div class="simplebar-mask">
                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                    <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
                        <div class="simplebar-content" style="padding: 0px;">
                            <li class="nav-item ">
                                <a class="nav-link {{ request()->segment(2) === null ? 'active' : '' }}">
                                    <svg class="nav-icon">
                                        <use
                                            xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}">
                                        </use>
                                    </svg> Dashboard
                                </a>
                            </li>
                            <li class="nav-group">
                                <a class="nav-link nav-group-toggle {{ request()->segment(2) === 'role' ? 'active' : '' }}">
                                    <svg class="nav-icon">
                                <use xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-building') }}"></use>
                                </svg>Role</a>
                                <ul class="nav-group-items">
                                    <li class="nav-item"><a href="{{ route('admin.role.index') }}" class="nav-link" ><span class="nav-icon"></span>List</a></li>
                                    <li class="nav-item"><a href="{{ route('admin.role.create') }}" class="nav-link"><span class="nav-icon"></span>Create</a></li>
                                </ul>
                            </li>
                            <li class="nav-group">
                                <a class="nav-link nav-group-toggle {{ request()->segment(2) === 'employee' ? 'active' : '' }}">
                                    <svg class="nav-icon">
                                <use xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-cursor') }}"></use>
                                </svg>Employees</a>
                                <ul class="nav-group-items">
                                    <li class="nav-item"><a  href="{{ route('admin.employee.index') }}" class="nav-link"><span class="nav-icon"></span>List</a></li>
                                    <li class="nav-item"><a  href="{{ route('admin.employee.create') }}" class="nav-link"><span class="nav-icon"></span>Create</a></li>
                                </ul>
                            </li>
                            <li class="nav-group">
                                <a class="nav-link nav-group-toggle {{ request()->segment(2) === 'project' ? 'active' : '' }}">
                                    <svg class="nav-icon">
                                <use xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-cursor') }}"></use>
                                </svg>Project</a>
                                <ul class="nav-group-items">
                                    <li class="nav-item"><a  href="{{ route('admin.project.index') }}" class="nav-link"><span class="nav-icon"></span>List</a></li>
                                    <li class="nav-item"><a  href="{{ route('admin.project.create') }}" class="nav-link"><span class="nav-icon"></span>Create</a></li>
                                </ul>
                            </li>
                            <li class="nav-group">
                                <a class="nav-link nav-group-toggle {{ request()->segment(2) === 'schedule' ? 'active' : '' }}">
                                    <svg class="nav-icon">
                                <use xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-building') }}"></use>
                                </svg>Schedule</a>
                                <ul class="nav-group-items">
                                    <li class="nav-item"><a  href="{{ route('admin.schedule.index') }}" class="nav-link"><span class="nav-icon"></span>List</a></li>
                                    <li class="nav-item"><a  href="{{ route('admin.schedule.create') }}" class="nav-link"><span class="nav-icon"></span>Create</a></li>
                                </ul>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link {{ request()->segment(2) === 'attendance' ? 'active' : '' }}"  href="{{ route('admin.attendance.index') }}">
                                    <svg class="nav-icon">
                                        <use
                                            xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-settings') }}">
                                        </use>
                                    </svg> Attendance
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link {{ request()->segment(2) === 'leave' ? 'active' : '' }}"  href="{{ route('admin.leave.index') }}">
                                    <svg class="nav-icon">
                                        <use
                                            xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-user') }}">
                                        </use>
                                    </svg> Leave Management
                                </a>
                            </li>
                        </div>
                    </div>
                </div>
            </div>
            <div class="simplebar-placeholder" style="width: auto; height: 841px;"></div>
        </div>
        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
            <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
        </div>
        <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
            <div class="simplebar-scrollbar" style="height: 442px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
        </div>
    </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>