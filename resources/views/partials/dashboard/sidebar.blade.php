<!-- aside start -->
<div class="company-logo d-center justify-content-between gap-2">
    <a href="{{ route('home') }}" class="logo_area">
        <span class="logo-xl">
            <img src="{{ asset('images/logo.png') }}" class="full_logo" alt="Logo">
            <img src="{{ asset('images/logo.png') }}" class="short_logo" alt="Logo">
        </span>
        <span class="logo-xl logo_dark">
            <img src="{{ asset('images/logo-light.png') }}" class="full_logo" alt="Logo">
            <img src="{{ asset('images/logo-light.png') }}" class="short_logo" alt="Logo">
        </span>
    </a>
    <span class="material-symbols-outlined close_nav p-1 d-xl-none"> close </span>
</div>

<aside class="aside-wrapper">
    <div class="main-menu">
        <ul class="main-menu__part">
            <li class="main-menu__title fw-semibold ">Dashboard</li>
            <li class="nav_dropdown"><button class="dropdown_arrow"><span class="material-symbols-outlined fs-four-up">
                        house </span> <span class="nav_text">Dashboards</span></button>
                <ul class="nav_dropdown-menu ">
                    <li><a href="{{ route('dashboard') }}">Default</a></li>
                    <li><a href="analytics.html">Analytics</a></li>
                    <li><a href="wallet.html">Wallet</a></li>
                </ul>
            </li>
            <li class="nav_dropdown"><button class="dropdown_arrow"><span class="material-symbols-outlined fs-four-up">
                        group </span> <span class="nav_text">Users</span></button>
                <ul class="nav_dropdown-menu ">
                    <li><a href="#">Create User</a></li>
                    <li><a href="#">All Users</a></li>
                    <li><a href="#">Users Group</a></li>
                </ul>
            </li>
            <li class="nav_dropdown"><button class="dropdown_arrow"><span class="material-symbols-outlined fs-four-up">
                        paid </span> <span class="nav_text">Trade</span></button>
                <ul class="nav_dropdown-menu ">
                    <li><a href="#">All Trades</a></li>
                    <li><a href="#">Pending Trades</a></li>
                    <li><a href="#">Transection History</a></li>
                    <li><a href="{{ route('dashboard.active-coins') }}">Active Coins</a></li>
                </ul>
            </li>
            <li class="nav_dropdown"><button class="dropdown_arrow"><span class="material-symbols-outlined fs-four-up">
                        settings </span> <span class="nav_text">Site Options</span></button>
                <ul class="nav_dropdown-menu ">
                    <li><a href="{{ route('dashboard.settings') }}">Settings</a></li>
                    <li><a href="#">Pages</a></li>
                    <li><a href="#">Subscribers</a></li>
                    <li><a href="#">Pricing</a></li>
                </ul>
            </li>
        </ul>
        {{-- <ul class="main-menu__part">
                    <li class="main-menu__title fw-semibold ">Resources</li>
                    <li><a href="charts.html"><span class="material-symbols-outlined p1-color fs-four-up"> insert_chart </span> <span class="nav_text">Charts</span></a></li>
                </ul>
                <ul class="main-menu__part logout_area mt-auto d-none">
                    <li><a href="logout.html"><span class="material-symbols-outlined p1-color"> logout </span></a></li>
                </ul> --}}
        <div class="upgrade_area pb-4 pb-xl-6 mt-auto pt-12">
            {{-- <img src="{{ asset('dashboard/images/upgrade.png') }}" alt="Images">
                    <p class="mt-4 fs-seven">Upgrade your account to <strong>PRO</strong> for even more examples.</p> --}}
            <a href="{{ route('home') }}"
                class="btn_box cus-border cus-rounded-2 w-100 py-2 py-lg-3 px-3 px-lg-5 px-xxl-6 mt-6 mt-xxl-8 mt-xxl-10"><i
                    class="icofont-sign-out"></i><span class="nav_text">Go Home</span></a>
        </div>
    </div>
</aside>

<!-- aside end -->
