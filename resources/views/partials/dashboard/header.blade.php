<header class="top-menu">
    <nav
        class="top-menu__content py-5 py-xxl-8 px-3 px-lg-4 px-xxl-6 d-flex align-items-center justify-content-between gap-6">
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
            {{-- <button type="submit" class="connect btn_box cus-border py-2 py-lg-3 px-3  px-lg-5 px-xxl-6"
                data-bs-toggle="modal" data-bs-target="#connect"> Connect</button> --}}
            <div class="btn_box btn_alt box_12 cus-border nav_search_short d-md-none">
                <span class="material-symbols-outlined  fs-four"> search </span>
            </div>
            <div class="toggle-switch btn_box btn_alt box_12 cus-border ">
                <input type="checkbox" class="checkbox" id="checkbox">
                <label for="checkbox" class="checkbox-label">
                    <span class="material-symbols-outlined fs-four"> dark_mode </span>
                    <span class="material-symbols-outlined fs-four light_mode"> light_mode </span>
                </label>
            </div>
            <div class="position-relative notification_area">
                <div class="notification_icon btn_box btn_alt box_12 cus-border d-center">
                    <span class="material-symbols-outlined fs-four"> notifications </span>
                </div>
                <ul
                    class="notification_nav hover-scroll d-flex flex-column gap-4 n0-bg px-4 px-lg-5 py-4 cus-rounded-1 ">
                    <li>
                        <div class="d-flex align-items-center gap-3">
                            <a href="#" class="user_profile_thumb">
                                <img src="{{ asset('dashboard/images/user_profile10.png') }}" class="rounded-circle"
                                    alt="image">
                            </a>
                            <div class="user_profile_title flex-fill">
                                <a href="#">Theresa Webb</a>
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
                                <img src="{{ asset('dashboard/images/user_profile9.png') }}" class="rounded-circle"
                                    alt="image">
                            </a>
                            <div class="user_profile_title flex-fill">
                                <a href="#">Bessie Cooper</a>
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
                                <img src="{{ asset('dashboard/images/user_profile3.png') }}" class="rounded-circle"
                                    alt="image">
                            </a>
                            <div class="user_profile_title flex-fill">
                                <a href="#">Jerome Bell</a>
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
                                <img src="{{ asset('dashboard/images/user_profile4.png') }}" class="rounded-circle"
                                    alt="image">
                            </a>
                            <div class="user_profile_title flex-fill">
                                <a href="#">Floyd Miles</a>
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
                                <img src="{{ asset('dashboard/images/user_profile5.png') }}" class="rounded-circle"
                                    alt="image">
                            </a>
                            <div class="user_profile_title flex-fill">
                                <a href="#">Theresa Webb</a>
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
                                <img src="{{ asset('dashboard/images/user_profile6.png') }}" class="rounded-circle"
                                    alt="image">
                            </a>
                            <div class="user_profile_title flex-fill">
                                <a href="#">Theresa Webb</a>
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
                                <img src="{{ asset('dashboard/images/user_profile7.png') }}" class="rounded-circle"
                                    alt="image">
                            </a>
                            <div class="user_profile_title flex-fill">
                                <a href="#">Floyd Miles</a>
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
                                <img src="{{ asset('dashboard/images/user_profile8.png') }}" class="rounded-circle"
                                    alt="image">
                            </a>
                            <div class="user_profile_title flex-fill">
                                <a href="#">Theresa Webb</a>
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
                                <img src="{{ asset('dashboard/images/user_profile9.png') }}" class="rounded-circle"
                                    alt="image">
                            </a>
                            <div class="user_profile_title flex-fill">
                                <a href="#">Theresa Webb</a>
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
                    <img src="{{ asset('dashboard/images/australia.png') }}" alt="Image 1"
                        class="flag-img rounded-circle box_6">
                    <span class="nav_lang d-none">Australia</span>
                </div>
                <ul class="lang_nav_list hover-scroll position-absolute py-1 py-lg-2 n0-bg cus-rounded-1">
                    <li onclick="selectOptionNav('Australia', 'assets/images/australia.png')"
                        class="d-flex align-items-center gap-2 px-3 px-lg-5 py-2">
                        <img src="{{ asset('dashboard/images/australia.png') }}" alt="Image 1"
                            class="flag-img rounded-circle box_5">
                        <span class="nav_lang">Australia</span>
                    </li>
                    <li onclick="selectOptionNav('Italy', 'assets/images/italy.png')"
                        class="d-flex align-items-center gap-2 px-3 px-lg-5 py-2">
                        <img src="{{ asset('dashboard/images/italy.png') }}" alt="Image 1"
                            class="flag-img rounded-circle box_5">
                        <span class="nav_lang">Italy</span>
                    </li>
                    <li onclick="selectOptionNav('France', 'assets/images/france.png')"
                        class="d-flex align-items-center gap-2 px-3 px-lg-5 py-2">
                        <img src="{{ asset('dashboard/images/france.png') }}" alt="Image 2"
                            class="flag-img rounded-circle box_5">
                        <span class="nav_lang">France</span>
                    </li>
                    <li onclick="selectOptionNav('Australia', 'assets/images/australia.png')"
                        class="d-flex align-items-center gap-2 px-3 px-lg-5 py-2">
                        <img src="{{ asset('dashboard/images/australia.png') }}" alt="Image 2"
                            class="flag-img rounded-circle box_5">
                        <span class="nav_lang">Australia</span>
                    </li>
                    <li onclick="selectOptionNav('Brazil', 'assets/images/brazil.png')"
                        class="d-flex align-items-center gap-2 px-3 px-lg-5 py-2">
                        <img src="{{ asset('dashboard/images/brazil.png') }}" alt="Image 2"
                            class="flag-img rounded-circle box_5">
                        <span class="nav_lang">Brazil</span>
                    </li>
                    <li onclick="selectOptionNav('Canada', 'assets/images/canada.png')"
                        class="d-flex align-items-center gap-2 px-3 px-lg-5 py-2">
                        <img src="{{ asset('dashboard/images/canada.png') }}" alt="Image 2"
                            class="flag-img rounded-circle box_5">
                        <span class="nav_lang">Canada</span>
                    </li>
                    <li onclick="selectOptionNav('China', 'assets/images/china.png')"
                        class="d-flex align-items-center gap-2 px-3 px-lg-5 py-2">
                        <img src="{{ asset('dashboard/images/china.png') }}" alt="Image 2"
                            class="flag-img rounded-circle box_5">
                        <span class="nav_lang">China</span>
                    </li>
                    <li onclick="selectOptionNav('Italy', 'assets/images/italy.png')"
                        class="d-flex align-items-center gap-2 px-3 px-lg-5 py-2">
                        <img src="{{ asset('dashboard/images/italy.png') }}" alt="Image 1"
                            class="flag-img rounded-circle box_5">
                        <span class="nav_lang">Italy</span>
                    </li>
                    <li onclick="selectOptionNav('France', 'assets/images/france.png')"
                        class="d-flex align-items-center gap-2 px-3 px-lg-5 py-2">
                        <img src="{{ asset('dashboard/images/france.png') }}" alt="Image 2"
                            class="flag-img rounded-circle box_5">
                        <span class="nav_lang">France</span>
                    </li>
                    <li onclick="selectOptionNav('Australia', 'assets/images/australia.png')"
                        class="d-flex align-items-center gap-2 px-3 px-lg-5 py-2">
                        <img src="{{ asset('dashboard/images/australia.png') }}" alt="Image 2"
                            class="flag-img rounded-circle box_5">
                        <span class="nav_lang">Australia</span>
                    </li>
                    <li onclick="selectOptionNav('France', 'assets/images/france.png')"
                        class="d-flex align-items-center gap-2 px-3 px-lg-5 py-2">
                        <img src="{{ asset('dashboard/images/france.png') }}" alt="Image 2"
                            class="flag-img rounded-circle box_5">
                        <span class="nav_lang">France</span>
                    </li>
                    <li onclick="selectOptionNav('Canada', 'assets/images/canada.png')"
                        class="d-flex align-items-center gap-2 px-3 px-lg-5 py-2">
                        <img src="{{ asset('dashboard/images/canada.png') }}" alt="Image 2"
                            class="flag-img rounded-circle box_5">
                        <span class="nav_lang">Canada</span>
                    </li>
                </ul>
            </div>

            <div class="user-account box_12 position-relative">
                <div class="profile-nav">
                    <img src="{{ asset('dashboard/images/user.png') }}" class="box_12 cus-rounded-1" alt="img">
                </div>
                <ul class="user-profile hover-scroll n0-bg d-flex flex-column gap-1 p-3 cus-rounded-1">
                    <li><a href="#" class="d-flex align-items-center gap-2 p1-color"><span
                                class="material-symbols-outlined fs-four"> person </span>My Account</a></li>
                    <li><a href="#" class="d-flex align-items-center gap-2 p1-color"><span
                                class="material-symbols-outlined fs-four"> settings </span>Settings</a></li>
                    <li><a href="#" class="d-flex align-items-center gap-2 p1-color"><span
                                class="material-symbols-outlined fs-four"> lock </span>Password</a></li>
                    <li><a href="#" class="d-flex align-items-center gap-2 p1-color"><span
                                class="material-symbols-outlined fs-four"> image </span>Media</a></li>
                    <li><a href="#" class="d-flex align-items-center gap-2 p1-color"><span
                                class="material-symbols-outlined fs-four"> ios_share </span>Share</a></li>
                    <li><a href="#" class="d-flex align-items-center gap-2 p1-color"><span
                                class="material-symbols-outlined fs-four"> logout </span>Log Out</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
