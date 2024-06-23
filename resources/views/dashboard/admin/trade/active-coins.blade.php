@extends('layouts.admin-dashboard')

@section('content')
<div class="container-fluid ">
    <div class="row">
        <div class="col-12">
            <div class="top-area flex-wrap d-center justify-content-between gap-8 row-gap-3">
                <h2>Active Coins</h2>
            </div>
        </div>
    </div>

    <div class="row g-6">
        <div class="col-xxl-8">
            <div class="d-flex flex-column gap-6">
                <div class="table-area n0-bg cus-rounded-1 p-4 p-lg-6 cus-border ">
                    <div class="table-main align">
                        <table>
                            <tr>
                                <th>
                                    <div class="form-check-linethrough">
                                        <input type="checkbox" class="selectAllCheckbox form-check-input alt flex-none box_5 checkAll border-color-500">
                                    </div>
                                </th>
                                <th>Coin Name</th>
                                <th>Rate</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            @for($i=1; $i < 10; $i++)
                            <tr>
                                <td>
                                    <div class="form-check-linethrough">
                                        <input type="checkbox" class="checkbox form-check-input alt flex-none box_5 border-color-500">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="{{ asset('/images/bitcoin_mid.png') }}" class="box_8" alt="icon">
                                        <span>Bought BTC</span>
                                    </div>
                                </td>
                                <td>1.23%</td>
                                <td>$516,55</td>
                                <td>03/05/2024</td>
                                <td>
                                    <div class="position-relative d-center"><span class="material-symbols-outlined action_setting"> more_vert </span>
                                        <div class="action_drop">
                                            <a href="#">Edit</a>
                                            <a href="#">delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endfor
                        </table>
                    </div>
                </div>
           </div>
        </div>
        <div class="col-xxl-4">
            <div class="d-flex flex-column gap-6 h-100">
                <div class="n0-bg cus-rounded-1 p-4 p-lg-6 p-xxl-8 cus-border h-100">
                    <div
                        class="header-part d-flex flex-wrap justify-content-between align-items-center gap-8 row-gap-3 pb-5 pb-xxl-6 mb-5 mb-xxl-6">
                        <h4 class="fw-semibold">Add New Coin</h4>
                    </div>
                    <form class="d-flex flex-column gap-5 gap-lg-6 w-100">
                        <div class="single-input">
                            <div class="single-input">
                                <label for="coin-name" class="fs-six-up fw-medium mb-2 mb-sm-4">Coin Name</label>
                                <input type="text" class="fs-seven py-3 px-5 px-lg-6" id="coin-name" placeholder="Coin Name" required>
                            </div>
                        </div>
                        <div class="single-input">
                            <label for="coin-price" class="fs-six-up fw-medium mb-2 mb-sm-4">Coin Price</label>
                            <input type="number" class="fs-seven py-3 px-5 px-lg-6" id="coin-price" placeholder="15,125" required>
                        </div>
                        <div class="d-flex gap-5 gap-lg-6 pt-4">
                            <button type="submit" class="btn_box py-2 py-lg-3 px-5 px-lg-6 cus-rounded-1 cus-border border-color">Save Change</button>
                            <button type="reset" class="btn_box btn_alt py-2 py-lg-3 px-5 px-lg-6 cus-rounded-1 cus-border border-color">Cancle</button>
                        </div>
                    </form>
                    <a href="{{ route('trade') }}">
                        <h6 class="d-flex align-items-center gap-2 p1-color mt-5 mt-lg-6">Go to Trade Page <span
                                class="material-symbols-outlined">arrow_right_alt</span></h6>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
