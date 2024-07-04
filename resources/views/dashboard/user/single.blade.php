@php
    $total_deposit = App\Models\Transaction::where('user_id', $user->id)
        ->where('tnx_type', 1)
        ->where('status', 1)
        ->sum('amount');
    $total_withdraw = App\Models\Transaction::where('user_id', $user->id)
        ->where('tnx_type', 2)
        ->where('status', 1)
        ->sum('amount');
    $balance = $total_deposit - $total_withdraw;
@endphp

@extends('layouts.admin-dashboard')

@section('content')
    <div class="container-fluid ">
        <div class="row">
            <div class="col-12">
                <div class="top-area flex-wrap d-center justify-content-between gap-8 row-gap-3">
                    <h2>Profile</h2>
                </div>
            </div>
        </div>
        <div class="row gy-5">
            <div class="col-xxl-8 col-xl-7 col-sm-6">
                <div class="box_part_area n0-bg cus-rounded-1 p-4 p-md-7 p-xxl-10 cus-border h-100">
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-8 row-gap-3">
                        <h4 style="text-transform: capitalize;">{{ $user->name }}</h4>
                    </div>
                    <div class="box_part__content">
                        <form
                            class="d-flex flex-column gap-5 gap-lg-6 w-100 cus-border-dashed top border-color-30 pt-5 pt-xxl-6 mt-5 mt-xxl-6">
                            <span class="fs-six-up fw-medium">Profile Photo</span>
                            <div
                                class="flex-wrap cus-border-dashed bottom pb-5 pb-lg-6 border-color-30 d-flex align-items-center gap-5 gap-lg-6">
                                <div class="user_thumbs">
                                    <img src="{{ asset('images/no-avatar.webp') }}" class="box_30 cus-rounded-1"
                                        alt="image">
                                </div>
                                <div class="d-flex gap-4">
                                    <label for="file_upload"
                                        class="btn btn-sm btn_box cus-border border-color fw-semibold py-2 py-lg-3 px-3 px-sm-4 px-lg-5 px-xxl-6">Upload
                                        Image
                                        <input type="file" name="file_upload" id="file_upload" class="visually-hidden">
                                    </label>
                                    <button type="reset"
                                        class="btn_box btn_alt cus-border border-color  py-2 py-lg-3 px-3 px-sm-4 px-lg-5 px-xxl-6">
                                        Cancel</button>
                                </div>
                            </div>
                            <div class="row gap-3 gap-sm-0">
                                <div class="single-input">
                                    <label for="name" class="fs-six-up fw-medium mb-2 mb-sm-4">User Name</label>
                                    <input type="text" class="fs-seven py-3 py-4 px-6 px-lg-8" id="name"
                                        value="{{ $user->name }}" placeholder="Enter First Name" required>
                                </div>
                            </div>
                            <div class="single-input">
                                <label for="email" class="fs-six-up fw-medium mb-2 mb-sm-4">email</label>
                                <input type="text" class="fs-seven py-3 py-4 px-6 px-lg-8" value="{{ $user->email }}"
                                    id="email" placeholder="Enter Gmail Account" required>
                            </div>
                            <div class="single-input">
                                <label for="phone" class="fs-six-up fw-medium mb-2 mb-sm-4">Phone <span
                                        class="n100-color">(Optional)</span></label>
                                <input type="text" class="fs-seven py-3 py-4 px-6 px-lg-8" value="{{ $user->phone }}"
                                    id="phone" placeholder="Enter Gmail Account" required>
                            </div>
                            <div class="single-input">
                                <label for="phone" class="fs-six-up fw-medium mb-2 mb-sm-4">Gender :</label>
                                <div class="d-flex gap-5 gap-lg-6">
                                    <div class="d-center gap-2">
                                        <input class="form-radio-input" type="radio" name="gender" id="male"
                                            checked>
                                        <label class="form-radio-label" for="male">Male </label>
                                    </div>
                                    <div class="d-center gap-2">
                                        <input class="form-radio-input" type="radio" name="gender" id="femail">
                                        <label class="form-radio-label" for="femail"> Female </label>
                                    </div>
                                    <div class="d-center gap-2">
                                        <input class="form-radio-input" type="radio" name="gender" id="others">
                                        <label class="form-radio-label" for="others"> Others </label>
                                    </div>
                                </div>
                            </div>
                            <div class="single-input">
                                <label class="fs-six-up fw-medium mb-2 mb-sm-4">Tagline :</label>
                                <div id="editor" class="text_editor_area bg1-opty  cus-rounded-1 top ">
                                    <span>Hello i am</span>
                                </div>
                            </div>

                            <br>
                            <h4>Address</h4>
                            <div class="single-input">
                                <label class="fs-six-up fw-medium mb-2 mb-sm-4">Location</label>
                                <div
                                    class="input_select d-flex align-items-center gap-2 bg1-opty cus-border cus-rounded-1 py-3 ps-3 ps-xxl-4 ">
                                    <select class="select_form pe-7 pe-lg-10 pe-xxl-12" name="bank_name">
                                        <option value="Select Currency">Select Country</option>
                                        <option value="Option 1">Option 1</option>
                                        <option value="Option 2">Option 2 </option>
                                        <option value="Option 3">Option 3 </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row gap-3 gap-sm-0">
                                <div class="col-sm-6">
                                    <div class="single-input">
                                        <label for="address1" class="fs-six-up fw-medium mb-2 mb-sm-4">Address
                                            1</label>
                                        <input type="text" class="fs-seven py-3 px-5 px-lg-6" id="address1"
                                            placeholder="Enter Address" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="single-input">
                                        <label for="address2" class="fs-six-up fw-medium mb-2 mb-sm-4">Address 2
                                            <span class="n100-color">(Optional)</span></label>
                                        <input type="text" class="fs-seven py-3 px-5 px-lg-6" id="address2"
                                            placeholder="Enter Address" required>
                                    </div>
                                </div>
                            </div>
                            <div class="single-input">
                                <label for="zip" class="fs-six-up fw-medium mb-2 mb-sm-4">Zip Code</label>
                                <input type="text" class="fs-seven py-3 px-5 px-lg-6" id="zip"
                                    placeholder="Enter Code" required>
                            </div>
                            <div class="d-flex gap-5 gap-lg-6 pt-4">
                                <button type="button"
                                    class="btn_box py-2 py-lg-3 px-5 px-lg-6 cus-rounded-1 cus-border border-color">Save
                                    Change</button>
                                <button type="reset"
                                    class="btn_box btn_alt py-2 py-lg-3 px-5 px-lg-6 cus-rounded-1 cus-border border-color">Cancle</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-xl-5 col-sm-6">
                <div class="row gy-5 gy-xxl-6">
                    <div class="col-12">
                        <div class="n0-bg cus-rounded-1 p-4 p-lg-6 p-xxl-8 cus-border">
                            <div class="d-center justify-content-between">
                                <span class="fw-medium">Balance</span>
                                <p class="p1-color d-flex align-items-center gap-1"><span
                                        class="material-symbols-outlined fs-five"> arrow_upward </span>15.4%</p>
                            </div>
                            <h3 class="n700-color mt-4 mb-8 mb-lg-10">{{ currencyHelper($balance) }}</h3>
                            <div class="d-center justify-content-between gap-6 flex-wrap">
                                <div class="d-flex flex-column gap-4">
                                    <p class="d-flex align-items-center gap-1"><span
                                            class="material-symbols-outlined fs-five p1-color "> arrow_downward
                                        </span>Deposite
                                    </p>
                                    <span class="fw-semibold">{{ currencyHelper($total_deposit) }}</span>
                                </div>
                                <div class="d-flex flex-column gap-4">
                                    <p class="d-flex align-items-center gap-1"><span
                                            class="material-symbols-outlined fs-five s2-color "> arrow_upward
                                        </span>Withdraw
                                    </p>
                                    <span class="fw-semibold">{{ currencyHelper($total_withdraw) }}</span>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="box_part_area n0-bg cus-rounded-1 p-4 p-md-7 p-xxl-10 cus-border">
                            <div class="box_part__content">
                                <h4>Recent Activities</h2>
                                <br>
                                <div class="table-area">
                                    <div class="table-main align">
                                        <table class="table-main align">
                                            <tbody>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Type</th>
                                                    <th>Amount</th>
                                                </tr>
                                                @foreach(App\Models\Transaction::where('user_id', $user->id)->where('status', 1)->get() as $tnx)
                                                <tr>
                                                    <td>{{ date('d-m-Y', strtotime($tnx->created_at)) }}</td>
                                                    <td style="font-size: 0.9em">
                                                        @if($tnx->tnx_type == 1)
                                                            <span class="bg2-opty s1-color cus-border py-1 px-2 px-lg-3 text-center cus-rounded-1 w-100" style="font-size: 0.9em">Deposite</span>
                                                        @elseif($tnx->tnx_type == 2)
                                                            <span class="bg3-opty s2-color cus-border py-1 px-2 px-lg-3 text-center cus-rounded-1 w-100" style="font-size: 0.9em">Withdraw</span>
                                                        @else
                                                            <span class="bg4-opty s4-color cus-border py-1 px-2 px-lg-3 text-center cus-rounded-1 w-100">Unknown</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ currencyHelper($tnx->amount) }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            //
        });
    </script>
@endsection
