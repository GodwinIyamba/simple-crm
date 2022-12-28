@php
    $user_notifications = auth()->user()->unreadNotifications
@endphp

<header class="header header-sticky mb-4">
    <div class="container-fluid">
        <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            <svg class="icon icon-lg">
                <use xlink:href="{{ asset('dashboard/vendors/@coreui/icons/svg/free.svg#cil-menu')}}"></use>
            </svg>
        </button>
        <a class="header-brand d-md-none" href="#">
            <svg width="118" height="46" alt="CoreUI Logo">
                <use xlink:href="{{ asset('dashboard/assets/brand/coreui.svg#full')}}"></use>
            </svg>
        </a>
        <ul class="header-nav ms-auto">
            <li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                    <svg class="icon icon-lg">
                        <use xlink:href="{{ asset('dashboard/vendors/@coreui/icons/svg/free.svg#cil-bell')}}"></use>
                    </svg>
                </a>
                <div class="dropdown-menu dropdown-menu-end pt-0">
                    <div class="dropdown-header bg-light py-2">
                        <div class="fw-semibold">Notifications</div>
                    </div>
                    @foreach($user_notifications->take(3) as $notification)
                        <span class="dropdown-item">
                             {{ $notification->type }}
                        </span>
                    @endforeach
                </div>
            </li>
        </ul>
        <ul class="header-nav ms-0">
            <li class="nav-item"><a class="nav-link py-0" href="#">
                    <svg class="icon icon-lg">
                        <use xlink:href="{{ asset('dashboard/vendors/@coreui/icons/svg/free.svg#cil-user')}}"></use>
                    </svg>
                </a>
            </li>
        </ul>
    </div>
</header>
