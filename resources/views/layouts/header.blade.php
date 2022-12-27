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
            <li class="nav-item"><a class="nav-link" href="#">
                    <svg class="icon icon-lg">
                        <use xlink:href="{{ asset('dashboard/vendors/@coreui/icons/svg/free.svg#cil-bell')}}"></use>
                    </svg></a></li>
        </ul>
        <ul class="header-nav ms-3">
            <li class="nav-item"><a class="nav-link py-0" href="#">
                    <svg class="icon icon-lg">
                        <use xlink:href="{{ asset('dashboard/vendors/@coreui/icons/svg/free.svg#cil-user')}}"></use>
                    </svg>
                </a>
            </li>
        </ul>
    </div>
</header>
