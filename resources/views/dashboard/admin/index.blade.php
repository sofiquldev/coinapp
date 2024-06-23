@extends('layouts.admin-dashboard')

@section('content')
    <div class="container-fluid ">
        <div class="row">
            <div class="col-12">
                <div class="top-area flex-wrap d-center justify-content-between gap-8 row-gap-3">
                    <h2>Default</h2>
                    <div class="d-flex align-items-center gap-3 gap-lg-6">
                        <button type="submit"
                            class="btn_box cus-border border-color py-2 py-lg-3 py-xxl-4 px-4 px-lg-5 px-xxl-8 gap-2 gap-lg-3"
                            data-bs-toggle="modal" data-bs-target="#liquidity"> <span
                                class="material-symbols-outlined">add_circle </span> Liquidity</button>
                        <a href="{{ route('trade') }}" class="btn_box btn_alt cus-border border-color py-2 py-lg-3 py-xxl-4 px-4 px-lg-5 px-xxl-8"> Trade</a>
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
                            <p class="s1-color d-flex align-items-center gap-1 mt-3"><span
                                    class="material-symbols-outlined"> show_chart </span>92.4%</p>
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
                            <p class="p1-color d-flex align-items-center gap-1 mt-3"><span
                                    class="material-symbols-outlined"> show_chart </span>50.9%</p>
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
                            <p class="s2-color d-flex align-items-center gap-1 mt-3"><span
                                    class="material-symbols-outlined"> show_chart </span>19.3%</p>
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
                            <p class="s2-color d-flex align-items-center gap-1 mt-3"><span
                                    class="material-symbols-outlined"> show_chart </span>19.3%</p>
                        </div>
                        <div class="fin_area_short"></div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-sm-6 col-xxl-3">
                <div class="n0-bg cus-rounded-1 p-2 cus-border h-100">
                    <a href="#"
                        class="cus_border d-block w-100 p-4 p-lg-6 text-center cus-border-dashed border-color cus-rounded-1 h-100"
                        data-bs-toggle="modal" data-bs-target="#token">
                        <span class="material-symbols-outlined fs-two p1-color"> add_circle </span>
                        <p class=" mb-4 ">Add any finance coin and enjoy empowering your portfolio</p>
                        <span class="fw-semibold p1-color">Add More</span>
                    </a>
                </div>
            </div> --}}
        </div>
        <div class="row g-6">
            <div class="col-xxl-9">
                <div class="d-flex flex-column gap-6 h-100">
                    <div class="n0-bg cus-rounded-1 p-4 p-lg-6 cus-border ">
                        <div
                            class="header-part d-flex flex-wrap justify-content-between align-items-center gap-8 row-gap-3 pb-5 pb-xxl-6 mb-2">
                            <h4 class="fw-semibold">Earnings</h4>
                            <div class="d-flex flex-wrap flex-sm-nowrap gap-4 gap-xxl-6 ">
                                <div class="cus_select d-flex align-items-center gap-2">
                                    <span class="flex-shrink-0 fs-seven">Sort By:</span>
                                    <div
                                        class="d-flex align-items-center gap-2 bg1-opty cus-border cus-rounded-1 py-2 ps-3 ps-xxl-4 ">
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
                        <div
                            class="header-part d-flex flex-wrap justify-content-between align-items-center gap-8 row-gap-3 pb-5 pb-xxl-6 mb-5 mb-xxl-6">
                            <h4 class="fw-semibold">Transaction History</h4>
                            <div class="d-flex flex-wrap flex-sm-nowrap gap-4 gap-xxl-6 ">
                                <form method="POST" class="search__form">
                                    <div class="d-center gap-1 bg1-opty p-1 ps-6 ps-lg-8 cus-border cus-rounded-1 alt_form">
                                        <input type="text" name="search__text" placeholder="Search" required>
                                        <button type="submit" class=" p1-bg rounded-3 d-center box_10"
                                            name="search__submit">
                                            <span class="material-symbols-outlined fs-four n0-fixed"> search
                                            </span></button>
                                    </div>
                                </form>
                                <div class="cus_select d-flex align-items-center gap-2">
                                    <span class="flex-shrink-0 fs-seven">Sort By:</span>
                                    <div
                                        class="d-flex align-items-center gap-2 bg1-opty cus-border cus-rounded-1 py-2 ps-3 ps-xxl-4 ">
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
                                        <span
                                            class="bg2-opty s1-color cus-border py-2 px-4 px-lg-5 text-center cus-rounded-2 w-100">
                                            Successful</span>
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
                                        <span
                                            class="bg2-opty s1-color cus-border py-2 px-4 px-lg-5 text-center cus-rounded-2 w-100">
                                            Successful</span>
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
                                        <span
                                            class="bg4-opty s3-color cus-border py-2 px-4 px-lg-5 text-center cus-rounded-2 w-100">
                                            Pending</span>
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
                                        <span
                                            class="bg2-opty s1-color cus-border py-2 px-4 px-lg-5 text-center cus-rounded-2 w-100">
                                            Successful</span>
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
                                        <span
                                            class="bg3-opty s2-color cus-border py-2 px-4 px-lg-5 text-center cus-rounded-2 w-100">
                                            Canceled</span>
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
                                        <span
                                            class="bg4-opty s3-color cus-border py-2 px-4 px-lg-5 text-center cus-rounded-2 w-100">
                                            Pending</span>
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
                                        <span
                                            class="bg2-opty s1-color cus-border py-2 px-4 px-lg-5 text-center cus-rounded-2 w-100">
                                            Successful</span>
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
                                        <span
                                            class="bg4-opty s3-color cus-border py-2 px-4 px-lg-5 text-center cus-rounded-2 w-100">
                                            Pending</span>
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
                                        <span
                                            class="bg4-opty s3-color cus-border py-2 px-4 px-lg-5 text-center cus-rounded-2 w-100">
                                            Pending</span>
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
                                        <span
                                            class="bg2-opty s1-color cus-border py-2 px-4 px-lg-5 text-center cus-rounded-2 w-100">
                                            Successful</span>
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
                                    <li class="page-item btn_box btn_alt box_10 cus-border border-color"><a
                                            class="page-link d-center" href="javascript:void(0)" aria-label="Previous">
                                            <span class="material-symbols-outlined">chevron_left </span></a>
                                    </li>
                                    <li class="page-item btn_box box_10 cus-border border-color"><a
                                            class="page-link d-center" href="javascript:void(0)">1</a></li>
                                    <li class="page-item btn_box btn_alt box_10 cus-border border-color"><a
                                            class="page-link d-center" href="javascript:void(0)">2</a></li>
                                    <li class="page-item btn_box btn_alt box_10 cus-border border-color align-items-end"><a
                                            class="page-link d-center" href="javascript:void(0)"><span
                                                class="material-symbols-outlined">more_horiz </span></a></li>
                                    <li class="page-item btn_box btn_alt box_10 cus-border border-color"><a
                                            class="page-link d-center" href="javascript:void(0)">5</a></li>
                                    <li class="page-item btn_box box_10 cus-border border-color "><a
                                            class="page-link d-center" href="javascript:void(0)" aria-label="Next">
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
                            <p class="p1-color d-flex align-items-center gap-1"><span
                                    class="material-symbols-outlined fs-five"> arrow_upward </span>15.4%</p>
                        </div>
                        <h3 class="n700-color mt-4 mb-8 mb-lg-10">{{ currencyHelper(Auth::user()->balance) }}</h3>
                        <div class="d-center justify-content-between gap-6 flex-wrap">
                            <div class="d-flex flex-column gap-4">
                                <p class="d-flex align-items-center gap-1"><span
                                        class="material-symbols-outlined fs-five p1-color "> arrow_downward </span>Income
                                </p>
                                <span class="fw-semibold">{{ currencyHelper(23.863,21) }}</span>
                            </div>
                            <div class="d-flex flex-column gap-4">
                                <p class="d-flex align-items-center gap-1"><span
                                        class="material-symbols-outlined fs-five s2-color "> arrow_upward </span>Expenses
                                </p>
                                <span class="fw-semibold">{{ currencyHelper(5.678,45) }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="n0-bg cus-rounded-1 p-4 p-lg-6 p-xxl-8 cus-border">
                        <div
                            class="header-part d-flex flex-wrap justify-content-between align-items-center gap-8 row-gap-3 pb-5 pb-xxl-6 mb-5 mb-xxl-6">
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
                        <div
                            class="header-part d-flex flex-wrap justify-content-between align-items-center gap-8 row-gap-3 pb-5 pb-xxl-6 mb-5 mb-xxl-6">
                            <h4 class="fw-semibold">Subscriptions</h4>
                            <p class="p1-color d-flex align-items-center gap-1"><span
                                    class="material-symbols-outlined fs-five"> arrow_upward </span>15.4%</p>
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
                        <a href="#">
                            <h6 class="d-flex align-items-center gap-2 p1-color mt-5 mt-lg-6">Manage subcriptions <span
                                    class="material-symbols-outlined">arrow_right_alt</span></h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
