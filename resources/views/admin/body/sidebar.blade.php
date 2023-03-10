<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        Admin Dashboard
    </div>
    <div class="d-flex flex-column justify-content-between h-100">
        <ul class="sidebar-nav" data-coreui="navigation">
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('dashboard/vendors/@coreui/icons/svg/free.svg#cil-speedometer')}}"></use>
                    </svg> Dashboard</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.users.index') }}">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('dashboard/vendors/@coreui/icons/svg/free.svg#cil-user')}}"></use>
                    </svg> Users</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.clients.index') }}">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('dashboard/vendors/@coreui/icons/svg/free.svg#cil-newspaper')}}"></use>
                    </svg> Clients</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.projects.index') }}">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('dashboard/vendors/@coreui/icons/svg/free.svg#cil-copy')}}"></use>
                    </svg> Projects</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.tasks.index') }}">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('dashboard/vendors/@coreui/icons/svg/free.svg#cil-calendar-check')}}"></use>
                    </svg>Tasks</a>
            </li>
        </ul>
{{--        Break--}}
        <ul class="sidebar-nav justify-content-end" data-coreui="navigation">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.logout') }}">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('dashboard/vendors/@coreui/icons/svg/free.svg#cil-account-logout')}}"></use>
                    </svg>
                    Logout
                </a>
            </li>
        </ul>
    </div>

</div>
