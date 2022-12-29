@php
    $user_notifications = auth()->user()->unreadNotifications;
    $user = auth()->user();
@endphp
<style>
    .notification-dot {
        height: 8px;
        width: 8px;
        background-color: red;
        border-radius: 50%;
        border: 1px solid white;
        display: inline-block;
        position: relative;
        top: -8px;
        left: -8px;
    }
</style>

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
                        @unless($user_notifications->isEmpty())
                            <span class="notification-dot"></span>
                        @endunless
                    </svg>
                </a>
                <div class="dropdown-menu dropdown-menu-end pt-0 pb-0">
                    <div class="dropdown-header bg-light py-2">
                        <div class="fw-semibold">Notifications</div>
                    </div>
                    @forelse($user_notifications->take(3) as $notification)
                        @if($user_notifications->last() == $notification)
                            <span class="dropdown-item mb-2">
                              {{ Str::limit($notification->data['message'], 40) }}
                            </span>
                        @else
                            <span class="dropdown-item">
                              {{ Str::limit($notification->data['message'], 40) }}
                            </span>
                        @endif
                        @if($loop->last)
                            <a class="btn btn-success w-100 rounded-0" href="{{ route('user.notifications', $user) }}">View all</a>
                        @endif

                    @empty
                        <p style="width: 200px;" class="text-center px-3 pt-3">
                            Hey! You have no new notifications.
                        </p>
                    @endforelse
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
