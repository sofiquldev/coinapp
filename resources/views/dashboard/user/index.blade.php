@extends('layouts.dashboard')

@section('content')
    <!-- header-section start -->
    <div class="two-column_logo d-none gap-3">
        <a href="{{ route('home') }}">
             <img src="{{ asset('images/logo-light.png') }}" class="logo_light" alt="Logo ">
             <img src="{{ asset('images/logo.png') }}" class="logo_dark" alt="Logo">
        </a>
        <span class="material-symbols-outlined close_nav p-1 d-xl-none"> close </span>
     </div>

     <div class="manu-wrapper">
         <!--header-section start-->
         <header class="top-menu">
             <nav class="top-menu__content py-5 py-xxl-8 px-3 px-lg-4 px-xxl-6 d-flex align-items-center justify-content-between gap-6">
                 <div class="top-menu__left d-flex gap-3 gap-xxl-6">
                     <button class="nav_tab  d-center cus-rounded-2 left d-none d-md-flex">
                         <span class="material-symbols-outlined fs-two n700-color"> menu </span>
                     </button>
                     <button class="nav_tab second p1-bg d-center cus-rounded-2 left">
                         <span class="navbar-toggle-btn box_15 overflow-hidden cus-border-dashed rounded-circle d-md-none">
                             <span></span>
                             <span></span>
                             <span></span>
                             <span></span>
                         </span>
                     </button>
                     <div class="company-short-logo d-center justify-content-between gap-2 d-xl-none">
                         <a href="{{ route('dashboard') }}" class="logo_area">
                             <span class="logo-xl">
                                 <img src="{{ asset('images/logo.png') }}" class="logo" alt="Logo">
                             </span>
                             <span class="logo-xl logo_dark">
                                 <img src="{{ asset('images/logo-light.png') }}" class="logo" alt="Logo">
                             </span>
                         </a>
                     </div>
                     <div class="d-flex align-items-center gap-3">
                         <form method="POST" class="search__form_nav d-none d-md-flex">
                             <div class="d-center gap-1 bg1-opty p-1 ps-6 ps-lg-8 cus-border cus-rounded-1 alt_form">
                                 <input type="text" name="search__text" placeholder="Search" required>
                                 <button type="submit" class="p1-bg rounded-3 d-center box_10" name="search__submit">
                                     <span class="material-symbols-outlined fs-four n0-fixed"> search </span>
                                 </button>
                             </div>
                         </form>

                         {{-- <div class="nav_layout box_12 d-center bg1-opty cus-border rounded-3">
                             <button class="d-center box_12" id="layout_change" type="button" >
                                 <span class="material-symbols-outlined fs-four-up p1-color position-absolute"> bento </span>
                                 <span class="tooltipBox position-absolut"> Layout</span>
                             </button>
                             <ul class="nav_layout__dropdown cus-border cus-rounded-1 n0-bg py-2 py-lg-3">
                                 <li class="active">Vertical</li>
                                 <li>Hovered</li>
                                 <li>Two-Column</li>
                                 <li>Horizontal</li>
                             </ul>
                         </div> --}}
                     </div>
                 </div>
                 <div class="top-menu__right d-flex gap-1 gap-md-3 gap-xxl-6 z-0 align-items-center">
                     <button type="submit" class="connect btn_box cus-border py-2 py-lg-3 px-3  px-lg-5 px-xxl-6" data-bs-toggle="modal" data-bs-target="#connect"> Connect</button>
                     <div class="btn_box btn_alt box_12 cus-border nav_search_short d-md-none">
                         <span class="material-symbols-outlined  fs-four"> search </span>
                     </div>
                     <div class="toggle-switch btn_box btn_alt box_12 cus-border ">
                         <input type="checkbox" class="checkbox" id="checkbox">
                         <label for="checkbox" class="checkbox-label">
                             <span class="material-symbols-outlined fs-four"> dark_mode </span>
                             <span class="material-symbols-outlined fs-four light_mode"> light_mode  </span>
                         </label>
                     </div>
                     <div class="position-relative notification_area">
                         <div class="notification_icon btn_box btn_alt box_12 cus-border d-center">
                             <span class="material-symbols-outlined fs-four"> notifications </span>
                         </div>
                         <ul class="notification_nav hover-scroll d-flex flex-column gap-4 n0-bg px-4 px-lg-5 py-4 cus-rounded-1 ">
                             <li>
                                 <div class="d-flex align-items-center gap-3">
                                     <a href="#" class="user_profile_thumb">
                                         <img src="{{ asset('dashboard/images/user_profile10.png') }}" class="rounded-circle" alt="image">
                                     </a>
                                     <div class="user_profile_title flex-fill">
                                         <a href="#" >Theresa Webb</a>
                                         <p class="mt-1 fs-eight">just ideas for next time</p>
                                     </div>
                                     <div class="notification just_active d-center flex-column">
                                         <span class="notification__count box_6 rounded-circle d-center fs-eight">5</span>
                                         <span class="notification__time fs-eight">4m</span>
                                     </div>
                                 </div>
                             </li>
                             <li>
                                 <div class="d-flex align-items-center gap-3">
                                     <a href="#" class="user_profile_thumb">
                                         <img src="{{ asset('dashboard/images/user_profile9.png') }}" class="rounded-circle" alt="image">
                                     </a>
                                     <div class="user_profile_title flex-fill">
                                         <a href="#" >Bessie Cooper</a>
                                         <p class="mt-1 fs-eight">omg, this is amazing</p>
                                     </div>
                                     <div class="notification just_active d-center flex-column">
                                         <span class="notification__count box_6 rounded-circle d-center fs-eight">1</span>
                                         <span class="notification__time fs-eight">5m</span>
                                     </div>
                                 </div>
                             </li>
                             <li>
                                 <div class="d-flex align-items-center gap-3">
                                     <a href="#" class="user_profile_thumb">
                                         <img src="{{ asset('dashboard/images/user_profile3.png') }}" class="rounded-circle" alt="image">
                                     </a>
                                     <div class="user_profile_title flex-fill">
                                         <a href="#" >Jerome Bell</a>
                                         <p class="mt-1 fs-eight">woohoooo</p>
                                     </div>
                                     <div class="notification just_active d-center flex-column">
                                         <span class="notification__count box_6 rounded-circle d-center fs-eight">3</span>
                                         <span class="notification__time fs-eight">10m</span>
                                     </div>
                                 </div>
                             </li>
                             <li>
                                 <div class="d-flex align-items-center gap-3">
                                     <a href="#" class="user_profile_thumb">
                                         <img src="{{ asset('dashboard/images/user_profile4.png') }}" class="rounded-circle" alt="image">
                                     </a>
                                     <div class="user_profile_title flex-fill">
                                         <a href="#" >Floyd Miles</a>
                                         <p class="mt-1 fs-eight">You : Wow, this is really</p>
                                     </div>
                                     <div class="notification just_active d-center flex-column">
                                         <span class="notification__count box_6 rounded-circle d-center fs-eight">4</span>
                                         <span class="notification__time fs-eight">1m</span>
                                     </div>
                                 </div>
                             </li>
                             <li>
                                 <div class="d-flex align-items-center gap-3">
                                     <a href="#" class="user_profile_thumb">
                                         <img src="{{ asset('dashboard/images/user_profile5.png') }}" class="rounded-circle" alt="image">
                                     </a>
                                     <div class="user_profile_title flex-fill">
                                         <a href="#" >Theresa Webb</a>
                                         <p class="mt-1 fs-eight">just ideas for next time</p>
                                     </div>
                                     <div class="notification d-center flex-column">
                                         <span class="notification__time fs-eight">30m</span>
                                     </div>
                                 </div>
                             </li>
                             <li>
                                 <div class="d-flex align-items-center gap-3">
                                     <a href="#" class="user_profile_thumb">
                                         <img src="{{ asset('dashboard/images/user_profile6.png') }}" class="rounded-circle" alt="image">
                                     </a>
                                     <div class="user_profile_title flex-fill">
                                         <a href="#" >Theresa Webb</a>
                                         <p class="mt-1 fs-eight">just ideas for next time</p>
                                     </div>
                                     <div class="notification d-center flex-column">
                                         <span class="notification__time fs-eight">3h</span>
                                     </div>
                                 </div>
                             </li>
                             <li>
                                 <div class="d-flex align-items-center gap-3">
                                     <a href="#" class="user_profile_thumb">
                                         <img src="{{ asset('dashboard/images/user_profile7.png') }}" class="rounded-circle" alt="image">
                                     </a>
                                     <div class="user_profile_title flex-fill">
                                         <a href="#" >Floyd Miles</a>
                                         <p class="mt-1 fs-eight">You : Wow, this is really</p>
                                     </div>
                                     <div class="notification d-center flex-column">
                                         <span class="notification__time fs-eight">2h</span>
                                     </div>
                                 </div>
                             </li>
                             <li>
                                 <div class="d-flex align-items-center gap-3">
                                     <a href="#" class="user_profile_thumb">
                                         <img src="{{ asset('dashboard/images/user_profile8.png') }}" class="rounded-circle" alt="image">
                                     </a>
                                     <div class="user_profile_title flex-fill">
                                         <a href="#" >Theresa Webb</a>
                                         <p class="mt-1 fs-eight">just ideas for next time</p>
                                     </div>
                                     <div class="notification d-center flex-column">
                                         <span class="notification__time fs-eight">2h</span>
                                     </div>
                                 </div>
                             </li>
                             <li>
                                 <div class="d-flex align-items-center gap-3">
                                     <a href="#" class="user_profile_thumb">
                                         <img src="{{ asset('dashboard/images/user_profile9.png') }}" class="rounded-circle" alt="image">
                                     </a>
                                     <div class="user_profile_title flex-fill">
                                         <a href="#" >Theresa Webb</a>
                                         <p class="mt-1 fs-eight">just ideas for next time</p>
                                     </div>
                                     <div class="notification d-center flex-column">
                                         <span class="notification__time fs-eight">2h</span>
                                     </div>
                                 </div>
                             </li>
                         </ul>
                     </div>

                     <div class="lang_nav box_12 position-relative cus-border rounded-3" style="display: none">
                        <div onclick="toggleDropNav()" class="nav_dropdown_btn btn_box btn_alt box_12 d-center bg1-opty ">
                            <img src="{{ asset('dashboard/images/australia.png') }}" alt="Image 1" class="flag-img rounded-circle box_6">
                            <span class="nav_lang d-none">Australia</span>
                        </div>
                        <ul class="lang_nav_list hover-scroll position-absolute py-1 py-lg-2 n0-bg cus-rounded-1">
                            <li onclick="selectOptionNav('Australia', 'assets/images/australia.png')" class="d-flex align-items-center gap-2 px-3 px-lg-5 py-2">
                                <img src="{{ asset('dashboard/images/australia.png') }}" alt="Image 1" class="flag-img rounded-circle box_5">
                                <span class="nav_lang">Australia</span>
                            </li>
                            <li onclick="selectOptionNav('Italy', 'assets/images/italy.png')" class="d-flex align-items-center gap-2 px-3 px-lg-5 py-2">
                                <img src="{{ asset('dashboard/images/italy.png') }}" alt="Image 1" class="flag-img rounded-circle box_5">
                                <span class="nav_lang">Italy</span>
                            </li>
                            <li onclick="selectOptionNav('France', 'assets/images/france.png')" class="d-flex align-items-center gap-2 px-3 px-lg-5 py-2">
                                <img src="{{ asset('dashboard/images/france.png') }}" alt="Image 2" class="flag-img rounded-circle box_5">
                                <span class="nav_lang">France</span>
                            </li>
                            <li onclick="selectOptionNav('Australia', 'assets/images/australia.png')" class="d-flex align-items-center gap-2 px-3 px-lg-5 py-2">
                                <img src="{{ asset('dashboard/images/australia.png') }}" alt="Image 2" class="flag-img rounded-circle box_5">
                                <span class="nav_lang">Australia</span>
                            </li>
                            <li onclick="selectOptionNav('Brazil', 'assets/images/brazil.png')" class="d-flex align-items-center gap-2 px-3 px-lg-5 py-2">
                                <img src="{{ asset('dashboard/images/brazil.png') }}" alt="Image 2" class="flag-img rounded-circle box_5">
                                <span class="nav_lang">Brazil</span>
                            </li>
                            <li onclick="selectOptionNav('Canada', 'assets/images/canada.png')" class="d-flex align-items-center gap-2 px-3 px-lg-5 py-2">
                                <img src="{{ asset('dashboard/images/canada.png') }}" alt="Image 2" class="flag-img rounded-circle box_5">
                                <span class="nav_lang">Canada</span>
                            </li>
                            <li onclick="selectOptionNav('China', 'assets/images/china.png')" class="d-flex align-items-center gap-2 px-3 px-lg-5 py-2">
                                <img src="{{ asset('dashboard/images/china.png') }}" alt="Image 2" class="flag-img rounded-circle box_5">
                                <span class="nav_lang">China</span>
                            </li>
                            <li onclick="selectOptionNav('Italy', 'assets/images/italy.png')" class="d-flex align-items-center gap-2 px-3 px-lg-5 py-2">
                                <img src="{{ asset('dashboard/images/italy.png') }}" alt="Image 1" class="flag-img rounded-circle box_5">
                                <span class="nav_lang">Italy</span>
                            </li>
                            <li onclick="selectOptionNav('France', 'assets/images/france.png')" class="d-flex align-items-center gap-2 px-3 px-lg-5 py-2">
                                <img src="{{ asset('dashboard/images/france.png') }}" alt="Image 2" class="flag-img rounded-circle box_5">
                                <span class="nav_lang">France</span>
                            </li>
                            <li onclick="selectOptionNav('Australia', 'assets/images/australia.png')" class="d-flex align-items-center gap-2 px-3 px-lg-5 py-2">
                                <img src="{{ asset('dashboard/images/australia.png') }}" alt="Image 2" class="flag-img rounded-circle box_5">
                                <span class="nav_lang">Australia</span>
                            </li>
                            <li onclick="selectOptionNav('France', 'assets/images/france.png')" class="d-flex align-items-center gap-2 px-3 px-lg-5 py-2">
                                <img src="{{ asset('dashboard/images/france.png') }}" alt="Image 2" class="flag-img rounded-circle box_5">
                                <span class="nav_lang">France</span>
                            </li>
                            <li onclick="selectOptionNav('Canada', 'assets/images/canada.png')" class="d-flex align-items-center gap-2 px-3 px-lg-5 py-2">
                                <img src="{{ asset('dashboard/images/canada.png') }}" alt="Image 2" class="flag-img rounded-circle box_5">
                                <span class="nav_lang">Canada</span>
                            </li>
                        </ul>
                    </div>

                     <div class="user-account box_12 position-relative">
                         <div class="profile-nav">
                             <img src="{{ asset('dashboard/images/user.png') }}" class="box_12 cus-rounded-1" alt="img">
                         </div>
                         <ul class="user-profile hover-scroll n0-bg d-flex flex-column gap-1 p-3 cus-rounded-1">
                             <li><a href="#" class="d-flex align-items-center gap-2 p1-color"><span class="material-symbols-outlined fs-four"> person </span>My Account</a></li>
                             <li><a href="#" class="d-flex align-items-center gap-2 p1-color"><span class="material-symbols-outlined fs-four"> settings </span>Settings</a></li>
                             <li><a href="#" class="d-flex align-items-center gap-2 p1-color"><span class="material-symbols-outlined fs-four"> lock </span>Password</a></li>
                             <li><a href="#" class="d-flex align-items-center gap-2 p1-color"><span class="material-symbols-outlined fs-four"> image </span>Media</a></li>
                             <li><a href="#" class="d-flex align-items-center gap-2 p1-color"><span class="material-symbols-outlined fs-four"> ios_share </span>Share</a></li>
                             <li><a href="#" class="d-flex align-items-center gap-2 p1-color"><span class="material-symbols-outlined fs-four"> logout </span>Log Out</a></li>
                         </ul>
                     </div>
                 </div>
             </nav>
         </header>

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
                     <li class="nav_dropdown"><button class="dropdown_arrow"><span class="material-symbols-outlined fs-four-up"> house </span> <span class="nav_text">Dashboards</span></button>
                         <ul class="nav_dropdown-menu ">
                             <li><a href="{{ route('dashboard') }}">Default</a></li>
                             <li><a href="analytics.html">Analytics</a></li>
                             <li><a href="wallet.html">Wallet</a></li>
                         </ul>
                     </li>
                     {{-- <li class="nav_dropdown"><button class="dropdown_arrow"><span class="material-symbols-outlined fs-four-up"> layers </span> <span class="nav_text">Pages</span></button>
                         <ul class="nav_dropdown-menu ">
                             <li><a href="overview.html">Overview</a></li>
                             <li><a href="table-listing.html">Table Listing</a></li>
                             <li><a href="details.html">Details</a></li>
                             <li><a href="create-form.html">Create Form</a></li>
                             <li><a href="large-list.html">Large List</a></li>
                             <li><a href="checklist.html">Checklist</a></li>
                             <li><a href="collection.html">Collection</a></li>
                         </ul>
                     </li>
                     <li class="nav_dropdown"><button class="dropdown_arrow"><span class="material-symbols-outlined fs-four-up"> account_circle </span> <span class="nav_text">Account</span></button>
                         <ul class="nav_dropdown-menu ">
                             <li><a href="settings.html">Settings</a></li>
                             <li><a href="password.html">Password</a></li>
                             <li><a href="billing.html">Billing</a></li>
                             <li><a href="notifications.html">Notifications</a></li>
                             <li><a href="team.html">Team</a></li>
                             <li><a href="login.html">Login</a></li>
                             <li><a href="signup.html">signup</a></li>
                         </ul>
                     </li>
                     <li class="nav_dropdown"><button class="dropdown_arrow"><span class="material-symbols-outlined fs-four-up"> insert_drive_file </span> <span class="nav_text">Others</span></button>
                         <ul class="nav_dropdown-menu ">
                             <li><a href="pricing-plans.html">Pricing Plans</a></li>
                             <li><a href="terms-service.html">Terms of Service</a></li>
                             <li><a href="error-page.html">Error Page</a></li>
                             <li><a href="contact.html">Contact Us</a></li>
                         </ul>
                     </li> --}}
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
                     <a href="{{ route('home') }}" class="btn_box cus-border cus-rounded-2 w-100 py-2 py-lg-3 px-3 px-lg-5 px-xxl-6 mt-6 mt-xxl-8 mt-xxl-10"><i class="icofont-sign-out"></i><span class="nav_text">Go Home</span></a>
                 </div>
             </div>
         </aside>

         <!-- aside end -->
     </div>
     <div class="clone_area d-center"></div>
     <!-- header-section end -->

     <!-- main-body start -->
     <div class="main-content">
         <div class="container-fluid ">
             <div class="row">
                 <div class="col-12">
                     <div class="top-area flex-wrap d-center justify-content-between gap-8 row-gap-3">
                         <h2 >Default</h2>
                         <div class="d-flex align-items-center gap-3 gap-lg-6">
                             <button type="submit" class="btn_box cus-border border-color py-2 py-lg-3 py-xxl-4 px-4 px-lg-5 px-xxl-8 gap-2 gap-lg-3" data-bs-toggle="modal" data-bs-target="#liquidity"> <span class="material-symbols-outlined">add_circle </span> Liquidity</button>
                             <a href="overview.html" class="btn_box btn_alt cus-border border-color py-2 py-lg-3 py-xxl-4 px-4 px-lg-5 px-xxl-8"> Trade</a>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="row g-4 g-md-6 four_grid">
                 <div class="col-sm-6 col-xxl-3 ">
                     <div class="n0-bg cus-rounded-1 p-4 p-lg-6 cus-border h-100">
                         <div class="header-part pb-4 mb-4">
                             <h4 class="d-flex align-items-center gap-3">
                                 <img src="{{ asset('dashboard/images/bitcoin_mid.png') }}" class="box_8" alt="Icon">BTC
                             </h4>
                         </div>
                         <div class="d-flex align-items-center justify-content-between gap-1 gap-sm-2 gap-lg-4 ">
                             <div class="text-nowrap">
                                 <h4 class="n700-color">671.28 USDT</h4>
                                 <p class="s1-color d-flex align-items-center gap-1 mt-3"><span class="material-symbols-outlined"> show_chart </span>92.4%</p>
                             </div>
                             <div class="fin_area_short"></div>
                         </div>
                     </div>
                 </div>
                 <div class="col-sm-6 col-xxl-3 ">
                     <div class="n0-bg cus-rounded-1 p-4 p-lg-6 cus-border h-100">
                         <div class="header-part pb-4 mb-4">
                             <h4 class="d-flex align-items-center gap-3">
                                 <img src="{{ asset('dashboard/images/cardano_mid.png') }}" class="box_8" alt="Icon">ADA
                             </h4>
                         </div>
                         <div class="d-flex align-items-center justify-content-between gap-1 gap-sm-2 gap-lg-4">
                             <div class="text-nowrap">
                                 <h4 class="n700-color">456.12 ADA</h4>
                                 <p class="p1-color d-flex align-items-center gap-1 mt-3"><span class="material-symbols-outlined"> show_chart </span>50.9%</p>
                             </div>
                             <div class="fin_area_short"></div>
                         </div>
                     </div>
                 </div>
                 <div class="col-sm-6 col-xxl-3 ">
                     <div class="n0-bg cus-rounded-1 p-4 p-lg-6 cus-border h-100">
                         <div class="header-part pb-4 mb-4">
                             <h4 class="d-flex align-items-center gap-3">
                                 <img src="{{ asset('dashboard/images/electro_mid.png') }}" class="box_8" alt="Icon">EOS
                             </h4>
                         </div>
                         <div class="d-flex align-items-center justify-content-between gap-1 gap-sm-2 gap-lg-4">
                             <div class="text-nowrap">
                                 <h4 class="n700-color">324.17 EOS</h4>
                                 <p class="s2-color d-flex align-items-center gap-1 mt-3"><span class="material-symbols-outlined"> show_chart </span>19.3%</p>
                             </div>
                             <div class="fin_area_short"></div>
                         </div>
                     </div>
                 </div>
                 <div class="col-sm-6 col-xxl-3">
                     <div class="n0-bg cus-rounded-1 p-2 cus-border h-100">
                         <a href="#" class="cus_border d-block w-100 p-4 p-lg-6 text-center cus-border-dashed border-color cus-rounded-1 h-100"   data-bs-toggle="modal" data-bs-target="#token">
                             <span class="material-symbols-outlined fs-two p1-color"> add_circle </span>
                             <p class=" mb-4 ">Add any finance coin and enjoy empowering your portfolio</p>
                             <span class="fw-semibold p1-color">Add More</span>
                         </a>
                     </div>
                 </div>
             </div>
             <div class="row g-6">
                 <div class="col-xxl-9">
                     <div class="d-flex flex-column gap-6 h-100">
                         <div class="n0-bg cus-rounded-1 p-4 p-lg-6 cus-border ">
                             <div class="header-part d-flex flex-wrap justify-content-between align-items-center gap-8 row-gap-3 pb-5 pb-xxl-6 mb-2">
                                 <h4 class="fw-semibold">Earnings</h4>
                                 <div class="d-flex flex-wrap flex-sm-nowrap gap-4 gap-xxl-6 ">
                                     <div class="cus_select d-flex align-items-center gap-2">
                                         <span class="flex-shrink-0 fs-seven">Sort By:</span>
                                         <div class="d-flex align-items-center gap-2 bg1-opty cus-border cus-rounded-1 py-2 ps-3 ps-xxl-4 ">
                                             <select class="pe-8 pe-xxl-10 ">
                                                 <option data-display="Last 15 Days">Last 15 Days</option>
                                                 <option>Last 30 Days </option>
                                                 <option>Last 7 Days </option>
                                                 <option>Last 24 Hours </option>
                                             </select>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="customer_impression"></div>
                         </div>
                         <div class="table-area n0-bg cus-rounded-1 p-4 p-lg-6 cus-border ">
                             <div class="header-part d-flex flex-wrap justify-content-between align-items-center gap-8 row-gap-3 pb-5 pb-xxl-6 mb-5 mb-xxl-6">
                                 <h4 class="fw-semibold">Transaction History</h4>
                                 <div class="d-flex flex-wrap flex-sm-nowrap gap-4 gap-xxl-6 ">
                                     <form method="POST" class="search__form">
                                         <div class="d-center gap-1 bg1-opty p-1 ps-6 ps-lg-8 cus-border cus-rounded-1 alt_form">
                                             <input type="text" name="search__text" placeholder="Search" required>
                                             <button type="submit" class=" p1-bg rounded-3 d-center box_10" name="search__submit">
                                                 <span class="material-symbols-outlined fs-four n0-fixed"> search </span></button>
                                         </div>
                                     </form>
                                     <div class="cus_select d-flex align-items-center gap-2">
                                         <span class="flex-shrink-0 fs-seven">Sort By:</span>
                                         <div class="d-flex align-items-center gap-2 bg1-opty cus-border cus-rounded-1 py-2 ps-3 ps-xxl-4 ">
                                             <select class="pe-8 pe-xxl-10 ">
                                                 <option data-display="Last 15 Days">Last 15 Days</option>
                                                 <option>Last 30 Days </option>
                                                 <option>Last 7 Days </option>
                                                 <option>Last 24 Hours </option>
                                             </select>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="table-main">
                                 <table>
                                     <tr>
                                         <th>Title</th>
                                         <th>Date</th>
                                         <th>History</th>
                                         <th>Status</th>
                                         <th>Transaction</th>
                                     </tr>
                                     <tr>
                                         <td>
                                             <div class="d-flex align-items-center gap-3">
                                                 <img src="{{ asset('dashboard/images/bitcoin.png') }}" alt="icon">
                                                 <span class="fw-medium">Bitcoin</span>
                                             </div>
                                         </td>
                                         <td>03/05/2024</td>
                                         <td>0df3635...eq23</td>
                                         <td>
                                         <span class="bg2-opty s1-color cus-border py-2 px-4 px-lg-5 text-center cus-rounded-2 w-100"> Successful</span>
                                         </td>
                                         <td>
                                             <div class="d-flex flex-column gap-1">
                                                 <span class="fw-medium">+0.2948 BTC</span>
                                                 <span class="fs-eight">+$10,930.90</span>
                                             </div>
                                         </td>
                                     </tr>
                                     <tr>
                                         <td>
                                             <div class="d-flex align-items-center gap-3">
                                                 <img src="{{ asset('dashboard/images/cardano.png') }}" alt="icon">
                                                 <span class="fw-medium">Cardano</span>
                                             </div>
                                         </td>
                                         <td>03/05/2024</td>
                                         <td>0df3635...eq23</td>
                                         <td>
                                         <span class="bg2-opty s1-color cus-border py-2 px-4 px-lg-5 text-center cus-rounded-2 w-100"> Successful</span>
                                         </td>
                                         <td>
                                             <div class="d-flex flex-column gap-1">
                                                 <span class="fw-medium">+0.8475 ADA</span>
                                                 <span class="fs-eight">+$10,930.90</span>
                                             </div>
                                         </td>
                                     </tr>
                                     <tr>
                                         <td>
                                             <div class="d-flex align-items-center gap-3">
                                                 <img src="{{ asset('dashboard/images/bitcoin.png') }}" alt="icon">
                                                 <span class="fw-medium">Bitcoin</span>
                                             </div>
                                         </td>
                                         <td>03/05/2024</td>
                                         <td>0df3635...eq23</td>
                                         <td>
                                         <span class="bg4-opty s3-color cus-border py-2 px-4 px-lg-5 text-center cus-rounded-2 w-100"> Pending</span>
                                         </td>
                                         <td>
                                             <div class="d-flex flex-column gap-1">
                                                 <span class="fw-medium">+0.2948 BTC</span>
                                                 <span class="fs-eight">+$10,930.90</span>
                                             </div>
                                         </td>
                                     </tr>
                                     <tr>
                                         <td>
                                             <div class="d-flex align-items-center gap-3">
                                                 <img src="{{ asset('dashboard/images/cardano.png') }}" alt="icon">
                                                 <span class="fw-medium">Cardano</span>
                                             </div>
                                         </td>
                                         <td>03/05/2024</td>
                                         <td>0df3635...eq23</td>
                                         <td>
                                         <span class="bg2-opty s1-color cus-border py-2 px-4 px-lg-5 text-center cus-rounded-2 w-100"> Successful</span>
                                         </td>
                                         <td>
                                             <div class="d-flex flex-column gap-1">
                                                 <span class="fw-medium">+0.8475 ADA</span>
                                                 <span class="fs-eight">+$10,930.90</span>
                                             </div>
                                         </td>
                                     </tr>
                                     <tr>
                                         <td>
                                             <div class="d-flex align-items-center gap-3">
                                                 <img src="{{ asset('dashboard/images/bitcoin.png') }}" alt="icon">
                                                 <span class="fw-medium">Bitcoin</span>
                                             </div>
                                         </td>
                                         <td>03/05/2024</td>
                                         <td>0df3635...eq23</td>
                                         <td>
                                         <span class="bg3-opty s2-color cus-border py-2 px-4 px-lg-5 text-center cus-rounded-2 w-100"> Canceled</span>
                                         </td>
                                         <td>
                                             <div class="d-flex flex-column gap-1">
                                                 <span class="fw-medium">+0.2948 BTC</span>
                                                 <span class="fs-eight">+$10,930.90</span>
                                             </div>
                                         </td>
                                     </tr>
                                     <tr>
                                         <td>
                                             <div class="d-flex align-items-center gap-3">
                                                 <img src="{{ asset('dashboard/images/bitcoin.png') }}" alt="icon">
                                                 <span class="fw-medium">Bitcoin</span>
                                             </div>
                                         </td>
                                         <td>03/05/2024</td>
                                         <td>0df3635...eq23</td>
                                         <td>
                                         <span class="bg4-opty s3-color cus-border py-2 px-4 px-lg-5 text-center cus-rounded-2 w-100"> Pending</span>
                                         </td>
                                         <td>
                                             <div class="d-flex flex-column gap-1">
                                                 <span class="fw-medium">+0.2948 BTC</span>
                                                 <span class="fs-eight">+$10,930.90</span>
                                             </div>
                                         </td>
                                     </tr>
                                     <tr>
                                         <td>
                                             <div class="d-flex align-items-center gap-3">
                                                 <img src="{{ asset('dashboard/images/electro.png') }}" alt="icon">
                                                 <span class="fw-medium">Electro</span>
                                             </div>
                                         </td>
                                         <td>03/05/2024</td>
                                         <td>0df3635...eq23</td>
                                         <td>
                                         <span class="bg2-opty s1-color cus-border py-2 px-4 px-lg-5 text-center cus-rounded-2 w-100"> Successful</span>
                                         </td>
                                         <td>
                                             <div class="d-flex flex-column gap-1">
                                                 <span class="fw-medium">+0.9545 EOS</span>
                                                 <span class="fs-eight">+$10,930.90</span>
                                             </div>
                                         </td>
                                     </tr>
                                     <tr>
                                         <td>
                                             <div class="d-flex align-items-center gap-3">
                                                 <img src="{{ asset('dashboard/images/bitcoin.png') }}" alt="icon">
                                                 <span class="fw-medium">Bitcoin</span>
                                             </div>
                                         </td>
                                         <td>03/05/2024</td>
                                         <td>0df3635...eq23</td>
                                         <td>
                                         <span class="bg4-opty s3-color cus-border py-2 px-4 px-lg-5 text-center cus-rounded-2 w-100"> Pending</span>
                                         </td>
                                         <td>
                                             <div class="d-flex flex-column gap-1">
                                                 <span class="fw-medium">+0.2948 BTC</span>
                                                 <span class="fs-eight">+$10,930.90</span>
                                             </div>
                                         </td>
                                     </tr>
                                     <tr>
                                         <td>
                                             <div class="d-flex align-items-center gap-3">
                                                 <img src="{{ asset('dashboard/images/bitcoin.png') }}" alt="icon">
                                                 <span class="fw-medium">Bitcoin</span>
                                             </div>
                                         </td>
                                         <td>03/05/2024</td>
                                         <td>0df3635...eq23</td>
                                         <td>
                                         <span class="bg4-opty s3-color cus-border py-2 px-4 px-lg-5 text-center cus-rounded-2 w-100"> Pending</span>
                                         </td>
                                         <td>
                                             <div class="d-flex flex-column gap-1">
                                                 <span class="fw-medium">+0.2948 BTC</span>
                                                 <span class="fs-eight">+$10,930.90</span>
                                             </div>
                                         </td>
                                     </tr>
                                     <tr>
                                         <td>
                                             <div class="d-flex align-items-center gap-3">
                                                 <img src="{{ asset('dashboard/images/cardano.png') }}" alt="icon">
                                                 <span class="fw-medium">Cardano</span>
                                             </div>
                                         </td>
                                         <td>03/05/2024</td>
                                         <td>0df3635...eq23</td>
                                         <td>
                                         <span class="bg2-opty s1-color cus-border py-2 px-4 px-lg-5 text-center cus-rounded-2 w-100"> Successful</span>
                                         </td>
                                         <td>
                                             <div class="d-flex flex-column gap-1">
                                                 <span class="fw-medium">+0.8475 ADA</span>
                                                 <span class="fs-eight">+$10,930.90</span>
                                             </div>
                                         </td>
                                     </tr>
                                 </table>
                             </div>
                             <div class="table-bottom d-center justify-content-between mt-5 mt-lg-6 flex-wrap gap-6 row-gap-3">
                                 <p>Showing 1 to 10 of 500 entries</p>
                                 <nav aria-label="Page navigation">
                                     <ul class="pagination gap-2">
                                         <li class="page-item btn_box btn_alt box_10 cus-border border-color"><a class="page-link d-center" href="javascript:void(0)"  aria-label="Previous">
                                             <span class="material-symbols-outlined">chevron_left </span></a>
                                         </li>
                                         <li class="page-item btn_box box_10 cus-border border-color"><a class="page-link d-center" href="javascript:void(0)">1</a></li>
                                         <li class="page-item btn_box btn_alt box_10 cus-border border-color"><a class="page-link d-center" href="javascript:void(0)">2</a></li>
                                         <li class="page-item btn_box btn_alt box_10 cus-border border-color align-items-end"><a class="page-link d-center" href="javascript:void(0)"><span class="material-symbols-outlined">more_horiz </span></a></li>
                                         <li class="page-item btn_box btn_alt box_10 cus-border border-color"><a class="page-link d-center" href="javascript:void(0)">5</a></li>
                                         <li class="page-item btn_box box_10 cus-border border-color "><a class="page-link d-center" href="javascript:void(0)" aria-label="Next">
                                             <span class="material-symbols-outlined">chevron_right </span></a>
                                         </li>
                                     </ul>
                                 </nav>
                             </div>
                         </div>
                    </div>
                 </div>
                <div class="col-xxl-3">
                     <div class="d-flex flex-column gap-6 h-100">
                         <div class="n0-bg cus-rounded-1 p-4 p-lg-6 p-xxl-8 cus-border">
                             <div class="d-center justify-content-between">
                                 <span class="fw-medium">Balance</span>
                                 <p class="p1-color d-flex align-items-center gap-1"><span class="material-symbols-outlined fs-five"> arrow_upward </span>15.4%</p>
                             </div>
                             <h3 class="n700-color mt-4 mb-8 mb-lg-10">$324.74 USD</h3>
                             <div class="d-center justify-content-between gap-6 flex-wrap">
                                 <div class="d-flex flex-column gap-4">
                                     <p class="d-flex align-items-center gap-1"><span class="material-symbols-outlined fs-five p1-color "> arrow_downward </span>Income</p>
                                     <span class="fw-semibold">$23.863,21 USD</span>
                                 </div>
                                 <div class="d-flex flex-column gap-4">
                                     <p class="d-flex align-items-center gap-1"><span class="material-symbols-outlined fs-five s2-color "> arrow_upward </span>Expenses</p>
                                     <span class="fw-semibold">$5.678,45 USD</span>
                                 </div>
                             </div>
                         </div>
                         <div class="n0-bg cus-rounded-1 p-4 p-lg-6 p-xxl-8 cus-border">
                             <div class="header-part d-flex flex-wrap justify-content-between align-items-center gap-8 row-gap-3 pb-5 pb-xxl-6 mb-5 mb-xxl-6">
                                 <h4 class="fw-semibold">Staking rewards</h4>
                                 <span class="material-symbols-outlined fs-four n500-color"> refresh </span>
                             </div>
                             <div class="d-flex flex-column gap-5 gap-lg-6">
                                 <div class="separator_line_dashed d-flex gap-3 gap-lg-5 pb-5 pb-lg-6">
                                     <div class="icon">
                                         <img src="{{ asset('dashboard/images/bitcoin_lg.png') }}" alt="image">
                                     </div>
                                     <div class="d-flex flex-column gap-2 w-100">
                                         <div class="d-flex justify-content-between">
                                             <span class="fw-medium fs-five">Staked BTC</span>
                                             <span class="fs-five">95 BTC</span>
                                         </div>
                                         <div class="progress_area d-flex gap-3 align-items-center">
                                             <span class="cssProgress-label">0%</span>
                                             <div class="cssProgress">
                                                 <div class="cssProgress-bar" data-percent="73"></div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="separator_line_dashed d-flex gap-3 gap-lg-5 pb-5 pb-lg-6">
                                     <div class="icon">
                                         <img src="{{ asset('dashboard/images/cardano_lg.png') }}" alt="image">
                                     </div>
                                     <div class="d-flex flex-column gap-2 w-100">
                                         <div class="d-flex justify-content-between">
                                             <span class="fw-medium fs-five">Stake ADA</span>
                                             <span class="fs-five">56 ADA</span>
                                         </div>
                                         <div class="progress_area d-flex gap-3 align-items-center">
                                             <span class="cssProgress-label">0%</span>
                                             <div class="cssProgress">
                                                 <div class="cssProgress-bar" data-percent="73"></div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="separator_line_dashed d-flex gap-3 gap-lg-5 pb-5 pb-lg-6">
                                     <div class="icon">
                                         <img src="{{ asset('dashboard/images/bnb.png') }}" alt="image">
                                     </div>
                                     <div class="d-flex flex-column gap-2 w-100">
                                         <div class="d-flex justify-content-between">
                                             <span class="fw-medium fs-five">Staked BNB</span>
                                             <span class="fs-five">44 BNB</span>
                                         </div>
                                         <div class="progress_area d-flex gap-3 align-items-center">
                                             <span class="cssProgress-label">0%</span>
                                             <div class="cssProgress">
                                                 <div class="cssProgress-bar" data-percent="73"></div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="separator_line_dashed d-flex gap-3 gap-lg-5">
                                     <div class="icon">
                                         <img src="{{ asset('dashboard/images/dogecoin_lg.png') }}" alt="image">
                                     </div>
                                     <div class="d-flex flex-column gap-2 w-100">
                                         <div class="d-flex justify-content-between">
                                             <span class="fw-medium fs-five">Staked DOG</span>
                                             <span class="fs-five">32 DOG</span>
                                         </div>
                                         <div class="progress_area d-flex gap-3 align-items-center">
                                             <span class="cssProgress-label">0%</span>
                                             <div class="cssProgress">
                                                 <div class="cssProgress-bar" data-percent="73"></div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="n0-bg cus-rounded-1 p-4 p-lg-6 p-xxl-8 cus-border h-100">
                             <div class="header-part d-flex flex-wrap justify-content-between align-items-center gap-8 row-gap-3 pb-5 pb-xxl-6 mb-5 mb-xxl-6">
                                 <h4 class="fw-semibold">Subscriptions</h4>
                                 <p class="p1-color d-flex align-items-center gap-1"><span class="material-symbols-outlined fs-five"> arrow_upward </span>15.4%</p>
                             </div>
                             <div class="d-flex flex-column gap-4">
                                 <div class="subscriptions__part bg1-opty cus-border cus-rounded-1 py-4 px-4 px-lg-6">
                                     <div class="d-flex align-items-center gap-3 gap-lg-5 ">
                                         <div class="icon">
                                             <img src="{{ asset('dashboard/images/youtube.png') }}" alt="image">
                                         </div>
                                         <span class="fw-medium fs-five">Youtube</span>
                                     </div>
                                     <h4 class="fw-semibold pt-4">$10.99</h4>
                                 </div>
                                 <div class="subscriptions__part bg1-opty cus-border cus-rounded-1 py-4 px-4 px-lg-6">
                                     <div class="d-flex align-items-center gap-3 gap-lg-5 ">
                                         <div class="icon">
                                             <img src="{{ asset('dashboard/images/spotify.png') }}" alt="image">
                                         </div>
                                         <span class="fw-medium fs-five">Spotify</span>
                                     </div>
                                     <h4 class="fw-semibold pt-4">$10.99</h4>
                                 </div>
                                 <div class="subscriptions__part bg1-opty cus-border cus-rounded-1 py-4 px-4 px-lg-6">
                                     <div class="d-flex align-items-center gap-3 gap-lg-5 ">
                                         <div class="icon">
                                             <img src="{{ asset('dashboard/images/github.png') }}" alt="image">
                                         </div>
                                         <span class="fw-medium fs-five">GitHub</span>
                                     </div>
                                     <h4 class="fw-semibold pt-4">$10.99</h4>
                                 </div>
                             </div>
                            <a href="#"><h6 class="d-flex align-items-center gap-2 p1-color mt-5 mt-lg-6">Manage subcriptions <span class="material-symbols-outlined">arrow_right_alt</span></h6> </a>
                         </div>
                     </div>
                </div>
             </div>
         </div>
     </div>
     <!-- main end -->


     <!-- Modal -->

     <!-- Deposit Liquidity start -->
     <div class="modal calendar-modal fade" id="liquidity" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content n0-bg p-4 p-md-6 p-xxl-8">
                 <div class="modal-header header-part mb-5 mb-lg-6 pb-5 pb-lg-6">
                     <h4 class="modal-title">Deposit Liquidity</h4>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <form method="post" class="d-flex flex-column gap-5 gap-lg-6">
                         <div class="position-relative d-center flex-column gap-4 cus-border-dashed bottom border-color-30 pb-5 pb-lg-6">
                             <div class="exchange_btn box_12 n0-bg p1-color d-center rounded-3 position-absolute cursor-pointer">
                                 <span class="material-symbols-outlined fs-three"> swap_vert </span>
                             </div>
                             <div class="from_area bg1-opty cus-rounded-1 cus-border p-4 p-md-6 p-xxl-8 w-100">
                                 <div class="d-flex justify-content-between cus-border-dashed bottom pb-4 mb-4">
                                     <span>From</span>
                                     <span>Balance: 10,000 ADA</span>
                                 </div>
                                 <div class="input_area d-center justify-content-between gap-3">
                                     <input type="text" name="from" class="alt_input fw-medium fs-five" placeholder="0.00" required>
                                     <div class="d-center gap-3">
                                         <img src="{{ asset('dashboard/images/cardano_mid.png') }}" class="box_7" alt="icon">
                                         <span class="fw-medium fs-five">ADA</span>
                                     </div>
                                 </div>
                             </div>
                             <div class="to_area bg1-opty cus-rounded-1 cus-border p-4 p-md-6 p-xxl-8 w-100">
                                 <div class="d-flex justify-content-between cus-border-dashed bottom pb-4 mb-4">
                                     <span>To</span>
                                     <span>Balance: 0.00 BTC</span>
                                 </div>
                                 <div class="input_area d-center justify-content-between gap-3">
                                     <input type="text" name="from" class="alt_input fw-medium fs-five" placeholder="0.00" required>
                                     <div class="d-center gap-3">
                                         <img src="{{ asset('dashboard/images/bitcoin_mid.png') }}" class="box_7" alt="icon">
                                         <span class="fw-medium fs-five">BTC</span>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="tolerance d-flex flex-column gap-5 gap-lg-6">
                             <label class="fs-six-up fw-medium">Slippage Tolerance</label>
                             <div class="input_area d-center gap-4 bg1-opty cus-border cus-rounded-1  ps-1 pe-4 pe-lg-6 py-1">
                                 <span class="material-symbols-outlined rounded-3 box_8 p1-bg d-center n0-fixed fs-six"> percent </span>
                                 <input type="text" name="from" class="alt_input" placeholder="0.00" required>
                             </div>
                             <div class="d-flex gap-5 gap-lg-6">
                                 <div class="flex-fill">
                                     <input type="radio" class="btn-check" name="options" id="option1">
                                     <label class="btn_box btn_alt w-100 py-2 py-lg-3 px-5 px-lg-6 cus-rounded-1 cus-border border-color fs-six fw-semibold p1-color" for="option1">0.5%</label>
                                 </div>
                                 <div class="flex-fill">
                                     <input type="radio" class="btn-check" name="options" id="option2" checked="checked">
                                     <label class="btn_box btn_alt w-100 py-2 py-lg-3 px-5 px-lg-6 cus-rounded-1 cus-border border-color fs-six fw-semibold p1-color" for="option2">1%</label>
                                 </div>
                                 <div class="flex-fill">
                                     <input type="radio" class="btn-check" name="options" id="option3">
                                     <label class="btn_box btn_alt w-100 py-2 py-lg-3 px-5 px-lg-6 cus-rounded-1 cus-border border-color fs-six fw-semibold p1-color" for="option3">3%</label>
                                 </div>
                             </div>
                         </div>
                         <button type="button" class="btn_box w-100 mt-2 py-2 py-lg-3 px-5 px-lg-6 cus-rounded-1 cus-border border-color">Provide liquidity</button>
                     </form>
                 </div>
             </div>
         </div>
     </div>

      <!-- Select Token Start -->
      <div class="modal calendar-modal fade" id="token" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content n0-bg py-4 py-sm-6 py-lg-8 px-2 px-lg-4">
                 <div class="modal-header header-part mb-5 mb-lg-6 pb-5 pb-lg-6 mx-3 mx-lg-4">
                     <h4 class="modal-title">Select Token</h4>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body d-flex flex-column">
                     <form method="POST" class="search__form_modal d-none d-md-flex mb-5 mb-lg-6 mx-2 mx-lg-4">
                         <div class="alt_form d-center gap-1 bg1-opty p-1 ps-6 ps-lg-8 cus-border cus-rounded-1 w-100">
                             <input type="text" name="search__text" placeholder="Search" required>
                             <button type="submit" class="p1-bg rounded-3 d-center box_10" name="search__submit">
                                 <span class="material-symbols-outlined fs-four n0-fixed"> search </span>
                             </button>
                         </div>
                     </form>
                     <div class="token_content d-flex flex-column">
                         <a href="#" class="d-flex p-2 p-lg-4 cus-rounded-1 transition">
                             <div class="flex-fill d-flex align-items-center gap-4 gap-lg-5 gap-xxl-6">
                                 <img src="{{ asset('dashboard/images/bitcoin_lg.png') }}" class="box_12" alt="icon">
                                 <div class="d-flex flex-column gap-1">
                                     <span class="fs-five fw-medium">BTC</span>
                                     <span class="fs-seven">Bitcoin</span>
                                 </div>
                             </div>
                             <div class="d-flex flex-column gap-1 align-items-end">
                                 <span class="fs-six-up">215.3 USDT</span>
                                 <div class="s1-color d-flex align-items-center gap-1"><span class="material-symbols-outlined"> show_chart </span>92.4%</div>
                             </div>
                         </a>
                         <a href="#" class="d-flex p-2 p-lg-4 cus-rounded-1 transition">
                             <div class="flex-fill d-flex align-items-center gap-4 gap-lg-5 gap-xxl-6">
                                 <img src="{{ asset('dashboard/images/dogecoin_lg.png') }}" class="box_12" alt="icon">
                                 <div class="d-flex flex-column gap-1">
                                     <span class="fs-five fw-medium">DOGE</span>
                                     <span class="fs-seven">Dogecoin</span>
                                 </div>
                             </div>
                             <div class="d-flex flex-column gap-1 align-items-end">
                                 <span class="fs-six-up">635.89 DOGE</span>
                                 <div class="s1-color d-flex align-items-center gap-1"><span class="material-symbols-outlined"> show_chart </span>72.6%</div>
                             </div>
                         </a>
                         <a href="#" class="d-flex p-2 p-lg-4 cus-rounded-1 transition">
                             <div class="flex-fill d-flex align-items-center gap-4 gap-lg-5 gap-xxl-6">
                                 <img src="{{ asset('dashboard/images/cardano_lg.png') }}" class="box_12" alt="icon">
                                 <div class="d-flex flex-column gap-1">
                                     <span class="fs-five fw-medium">ADA</span>
                                     <span class="fs-seven">Cardano</span>
                                 </div>
                             </div>
                             <div class="d-flex flex-column gap-1 align-items-end">
                                 <span class="fs-six-up">546.7 ADA</span>
                                 <div class="s3-color d-flex align-items-center gap-1"><span class="material-symbols-outlined"> show_chart </span>55.3%</div>
                             </div>
                         </a>
                         <a href="#" class="d-flex p-2 p-lg-4 cus-rounded-1 transition">
                             <div class="flex-fill d-flex align-items-center gap-4 gap-lg-5 gap-xxl-6">
                                 <img src="{{ asset('dashboard/images/bnb.png') }}" class="box_12" alt="icon">
                                 <div class="d-flex flex-column gap-1">
                                     <span class="fs-five fw-medium">BNB</span>
                                     <span class="fs-seven">Binance</span>
                                 </div>
                             </div>
                             <div class="d-flex flex-column gap-1 align-items-end">
                                 <span class="fs-six-up">7845.9 BNB</span>
                                 <div class="s2-color d-flex align-items-center gap-1"><span class="material-symbols-outlined"> show_chart </span>42.2%</div>
                             </div>
                         </a>
                         <a href="#" class="d-flex p-2 p-lg-4 cus-rounded-1 transition">
                             <div class="flex-fill d-flex align-items-center gap-4 gap-lg-5 gap-xxl-6">
                                 <img src="{{ asset('dashboard/images/bitcoin_lg.png') }}" class="box_12" alt="icon">
                                 <div class="d-flex flex-column gap-1">
                                     <span class="fs-five fw-medium">CHAIN</span>
                                     <span class="fs-seven">Linkchain</span>
                                 </div>
                             </div>
                             <div class="d-flex flex-column gap-1 align-items-end">
                                 <span class="fs-six-up">66.75 CHAIN</span>
                                 <div class="s2-color d-flex align-items-center gap-1"><span class="material-symbols-outlined"> show_chart </span>33.3%</div>
                             </div>
                         </a>
                     </div>

                     <div class="mx-2 mx-lg-4 cus-border-dashed top border-color-30 mt-2 pt-5 pt-lg-6">
                         <button type="button" class="btn_box w-100 mt-2 py-2 py-lg-3 px-4  gap-3 cus-rounded-1 cus-border border-color"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="17" viewBox="0 0 18 17" fill="none">
                             <path d="M6.99147 9.33073C7.44981 9.33073 7.82481 9.70573 7.82481 10.1641C7.82481 10.6224 7.44981 10.9974 6.99147 10.9974C6.53314 10.9974 6.15814 10.6224 6.15814 10.1641C6.15814 9.70573 6.53314 9.33073 6.99147 9.33073ZM6.99147 7.66406C5.60814 7.66406 4.49147 8.78073 4.49147 10.1641C4.49147 11.5474 5.60814 12.6641 6.99147 12.6641C8.37481 12.6641 9.49147 11.5474 9.49147 10.1641C9.49147 8.78073 8.37481 7.66406 6.99147 7.66406ZM14.0748 5.9974L14.9831 3.98906L16.9915 3.08073L14.9831 2.1724L14.0748 0.164062L13.1665 2.1724L11.1581 3.08073L13.1665 3.98906L14.0748 5.9974ZM16.3915 9.0974L15.7415 7.66406L15.0915 9.0974L13.6581 9.7474L15.0915 10.3974L15.7415 11.8307L16.3915 10.3974L17.8248 9.7474L16.3915 9.0974ZM12.1998 10.1641C12.1998 10.0641 12.1998 9.95573 12.1915 9.85573L13.8081 8.63073L11.7248 5.0224L9.85814 5.80573C9.69147 5.6974 9.50814 5.58906 9.32481 5.4974L9.07481 3.4974H4.90814L4.65814 5.50573C4.4748 5.5974 4.2998 5.70573 4.1248 5.81406L2.25814 5.0224L0.174805 8.63073L1.79147 9.85573C1.78314 9.95573 1.78314 10.0641 1.78314 10.1641C1.78314 10.2641 1.78314 10.3724 1.79147 10.4724L0.174805 11.6974L2.25814 15.3057L4.1248 14.5224C4.29147 14.6307 4.4748 14.7391 4.65814 14.8307L4.90814 16.8307H9.07481L9.32481 14.8224C9.50814 14.7307 9.68314 14.6307 9.85814 14.5141L11.7248 15.2974L13.8081 11.6891L12.1915 10.4641C12.1998 10.3724 12.1998 10.2641 12.1998 10.1641ZM11.0165 13.1974L9.57481 12.5891C9.10814 13.0891 8.49147 13.4557 7.79981 13.6141L7.5998 15.1641H6.38314L6.19147 13.6141C5.4998 13.4557 4.88314 13.0891 4.41647 12.5891L2.9748 13.1974L2.36647 12.1391L3.60814 11.1974C3.50814 10.8724 3.45814 10.5307 3.45814 10.1724C3.45814 9.81406 3.50814 9.4724 3.60814 9.1474L2.36647 8.20573L2.9748 7.1474L4.41647 7.75573C4.88314 7.25573 5.4998 6.88906 6.19147 6.73073L6.38314 5.16406H7.60814L7.79981 6.71406C8.49147 6.8724 9.10814 7.23906 9.57481 7.73906L11.0165 7.13073L11.6248 8.18906L10.3831 9.13073C10.4831 9.45573 10.5331 9.7974 10.5331 10.1557C10.5331 10.5141 10.4831 10.8557 10.3831 11.1807L11.6248 12.1224L11.0165 13.1974Z" fill="white"/>
                             </svg>Manage Token
                         </button>
                     </div>
                 </div>
             </div>
         </div>
     </div>


     <!-- connect start -->
     <div class="modal calendar-modal fade" id="connect" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content n0-bg p-4 p-md-6 p-xxl-8">
                 <div class="modal-header header-part mb-5 mb-lg-6 pb-5 pb-lg-6">
                     <h4 class="modal-title">Connect your wallet</h4>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body d-flex flex-column gap-3 gap-lg-4">
                     <a href="#" class="d-center justify-content-between gap-4 gap-lg-6 px-5 px-lg-6 py-3 py-lg-4  cus-border cus-rounded-1">
                         <div class="d-flex align-items-center gap-4">
                             <img src="{{ asset('dashboard/images/meta_mask.png') }}" alt="icon">
                             <span class="fs-six-up fw-medium">MetaMask</span>
                         </div>
                         <span class="p1-bg n0-fixed lh_130 fw-semibold cus-rounded-1 cus-border border-color py-2 py-lg-3 px-4 px-lg-5 px-xxl-6"> Solana</span>
                     </a>

                     <a href="#" class="d-center justify-content-between gap-4 gap-lg-6 px-5 px-lg-6 py-3 py-lg-4  cus-border cus-rounded-1">
                         <div class="d-flex align-items-center gap-4">
                             <img src="{{ asset('dashboard/images/coinbase.png') }}" alt="icon">
                             <span class="fs-six-up fw-medium">Coinbase Wallet</span>
                         </div>
                     </a>
                     <a href="#" class="d-center justify-content-between gap-4 gap-lg-6 px-5 px-lg-6 py-3 py-lg-4  cus-border cus-rounded-1">
                         <div class="d-flex align-items-center gap-4">
                             <img src="{{ asset('dashboard/images/cardano.png') }}" alt="icon">
                             <span class="fs-six-up fw-medium">WalletConnect</span>
                         </div>
                     </a>
                     <a href="#" class="d-center justify-content-between gap-4 gap-lg-6 px-5 px-lg-6 py-3 py-lg-4  cus-border cus-rounded-1">
                         <div class="d-flex align-items-center gap-4">
                             <img src="{{ asset('dashboard/images/phantom.png') }}" alt="icon">
                             <span class="fs-six-up fw-medium">Phantom</span>
                         </div>
                         <span class="p1-color lh_130 fw-semibold cus-rounded-1 cus-border border-color py-2 py-lg-3 px-4 px-lg-5 px-xxl-6"> Solana</span>
                     </a>
                     <a href="#" class="d-center justify-content-between gap-4 gap-lg-6 px-5 px-lg-6 py-3 py-lg-4  cus-border cus-rounded-1">
                         <div class="d-flex align-items-center gap-4">
                             <img src="{{ asset('dashboard/images/core.png') }}" alt="icon">
                             <span class="fs-six-up fw-medium">Avalanche</span>
                         </div>
                         <span class="p1-color lh_130 fw-semibold cus-rounded-1 cus-border border-color py-2 py-lg-3 px-4 px-lg-5 px-xxl-6"> Avalanche</span>
                     </a>
                     <a href="#" class="d-center justify-content-between gap-4 gap-lg-6 px-5 px-lg-6 py-3 py-lg-4  cus-border cus-rounded-1">
                         <div class="d-flex align-items-center gap-4">
                             <img src="{{ asset('dashboard/images/glow.png') }}" alt="icon">
                             <span class="fs-six-up fw-medium">Glow</span>
                         </div>
                         <span class="p1-color lh_130 fw-semibold cus-rounded-1 cus-border border-color py-2 py-lg-3 px-4 px-lg-5 px-xxl-6"> Solana</span>
                     </a>
                 </div>
                 <p class="mt-5 mt-lg-6">By connecting wallet, you agree to Coin App <a href="terms-service.html" class="p1-color">Terms of Service</a></p>
             </div>
         </div>
     </div>

     <!-- Modal -->

     <!-- Footer Area Start -->
     <footer class="footer">
         <div class="col-12">
             <div class="footer__copyright justify-content-center justify-content-sm-between gap-10 row-gap-2">
                 <p class="copyright text-center">Copyright © <span id="copyYear"></span> <a href="https://oneinit.com" class="p1-color">Coin App</a>. All Rights Reserved</p>
                 <ul class="footer__copyright-conditions">
                     <li><a href="terms-service.html">Privacy policy</a></li>
                     <li><a href="terms-service.html">Terms & Conditions</a></li>
                 </ul>
             </div>
         </div>
     </footer>
     <!-- Footer Area End -->


@endsection