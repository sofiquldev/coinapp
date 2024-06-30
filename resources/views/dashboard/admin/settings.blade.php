@extends('layouts.admin-dashboard')

@section('content')
    <div class="container-fluid ">
        <div class="row">
            <div class="col-12">
                <div class="top-area flex-wrap d-center justify-content-between gap-8 row-gap-3">
                    <h2>Settings</h2>
                </div>
            </div>
        </div>
        <div class="row gy-5">
            <div class="col-xxl-6">
                <div class="box_part_area n0-bg cus-rounded-1 p-4 p-md-7 p-xxl-10 cus-border h-100">
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-8 row-gap-3">
                        <h4>Account Settings</h4>
                    </div>
                    <div class="box_part__content">
                        <form
                            class="d-flex flex-column gap-5 gap-lg-6 w-100 cus-border-dashed top border-color-30 pt-5 pt-xxl-6 mt-5 mt-xxl-6">
                            <span class="fs-six-up fw-medium">Profile Photo</span>
                            <div
                                class="flex-wrap cus-border-dashed bottom pb-5 pb-lg-6 border-color-30 d-flex align-items-center gap-5 gap-lg-6">
                                <div class="user_thumbs">
                                    <img src="{{ asset('images/no-avatar.webp') }}" class="box_30 cus-rounded-1" alt="image">
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
                                <div class="col-sm-6">
                                    <div class="single-input">
                                        <label for="fname" class="fs-six-up fw-medium mb-2 mb-sm-4">First Name</label>
                                        <input type="text" class="fs-seven py-3 py-4 px-6 px-lg-8" id="fname"
                                            value="Darrel" placeholder="Enter First Name" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="single-input">
                                        <label for="lname" class="fs-six-up fw-medium mb-2 mb-sm-4">Last Name</label>
                                        <input type="text" class="fs-seven py-3 py-4 px-6 px-lg-8" id="lname"
                                            value="Steward" placeholder="Enter Last Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="single-input">
                                <label for="email" class="fs-six-up fw-medium mb-2 mb-sm-4">Gmail</label>
                                <input type="text" class="fs-seven py-3 py-4 px-6 px-lg-8" value="Example@email.com"
                                    id="email" placeholder="Enter Gmail Account" required>
                            </div>
                            <div class="single-input">
                                <label for="phone" class="fs-six-up fw-medium mb-2 mb-sm-4">Phone <span
                                        class="n100-color">(Optional)</span></label>
                                <input type="text" class="fs-seven py-3 py-4 px-6 px-lg-8" value="+0123 456 789"
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
                            <div class="d-flex flex-column gap-4">
                                <div class="form-check form-check-linethrough d-flex align-items-center gap-2 gap-lg-3">
                                    <input type="checkbox" class="form-check-input flex-none box_5 rounded-circle"
                                        id="checkbox1" checked>
                                    <label for="checkbox1">I agree to the privacy & policy</label>
                                </div>
                                <div class="form-check form-check-linethrough d-flex align-items-center gap-2 gap-lg-3">
                                    <input type="checkbox" class="form-check-input  flex-none box_5 rounded-circle"
                                        id="checkbox2" checked>
                                    <label for="checkbox2">I agree with all terms & conditions</label>
                                </div>
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
            <div class="col-xxl-6">
                <div class="row gy-5 gy-xxl-6">
                    <div class="col-12">
                        <div class="box_part_area n0-bg cus-rounded-1 p-4 p-md-7 p-xxl-10 cus-border">
                            <div class="d-flex flex-wrap justify-content-between align-items-center gap-8 row-gap-3">
                                <h4>Address</h4>
                            </div>
                            <div class="box_part__content">
                                <form
                                    class="d-flex flex-column gap-5 gap-lg-6 w-100 cus-border-dashed top border-color-30 pt-5 pt-xxl-6 mt-5 mt-xxl-6">
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
                    <div class="col-12">
                        <div class="box_part_area n0-bg cus-rounded-1 p-4 p-md-7 p-xxl-10 cus-border">
                            <div class="d-flex flex-wrap justify-content-between align-items-center gap-8 row-gap-3">
                                <h4>Default Currency</h4>
                            </div>
                            <div class="box_part__content">
                                <form class="d-flex flex-column gap-5 gap-lg-6 w-100 cus-border-dashed top border-color-30 pt-5 pt-xxl-6 mt-5 mt-xxl-6" id="site-currency-update">
                                    <div class="single-input">
                                        <label for="site-currency" class="fs-six-up fw-medium mb-2 mb-sm-4">Select your
                                            default currency</label>
                                        <div
                                            class="input_select d-flex align-items-center gap-2 bg1-opty cus-border cus-rounded-1 py-3 ps-3 ps-xxl-4 ">
                                            @php
                                                if(empty($data->currency->value)) {
                                                    $currencyValue = 'USD';
                                                } else {
                                                    $currencyValue = $data->currency->value;
                                                }
                                            @endphp
                                            <select class="select_form pe-7 pe-lg-10 pe-xxl-12" id="site-currency">
                                                <option value="USD" {{ $currencyValue === 'USD' ? 'selected' : '' }}>US Dollar (USD)</option>
                                                <option value="EUR" {{ $currencyValue === 'EUR' ? 'selected' : '' }}>Euro (EUR)</option>
                                                <option value="JPY" {{ $currencyValue === 'JPY' ? 'selected' : '' }}>Japanese Yen (JPY)</option>
                                                <option value="GBP" {{ $currencyValue === 'GBP' ? 'selected' : '' }}>British Pound (GBP)</option>
                                                <option value="AUD" {{ $currencyValue === 'AUD' ? 'selected' : '' }}>Australian Dollar (AUD)</option>
                                                <option value="CAD" {{ $currencyValue === 'CAD' ? 'selected' : '' }}>Canadian Dollar (CAD)</option>
                                                <option value="CHF" {{ $currencyValue === 'CHF' ? 'selected' : '' }}>Swiss Franc (CHF)</option>
                                                <option value="CNY" {{ $currencyValue === 'CNY' ? 'selected' : '' }}>Chinese Yuan (CNY)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-5 gap-lg-6 pt-4">
                                        <button type="submit" class="btn_box py-2 py-lg-3 px-5 px-lg-6 cus-rounded-1 cus-border border-color">Save Change</button>
                                        <button type="reset" class="btn_box btn_alt py-2 py-lg-3 px-5 px-lg-6 cus-rounded-1 cus-border border-color">Cancle</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="box_part_area n0-bg cus-rounded-1 p-4 p-md-7 p-xxl-10 cus-border">
                            <div class="d-flex flex-wrap justify-content-between align-items-center gap-8 row-gap-3">
                                <h4>Service Fee</h4>
                                <small>Profit Margin</small>
                            </div>
                            <div class="box_part__content">
                                <form class="d-flex flex-column gap-5 gap-lg-6 w-100 cus-border-dashed top border-color-30 pt-5 pt-xxl-6 mt-5 mt-xxl-6" id="site-service-fee-update">
                                    <div class="single-input">
                                        <label for="site-service-fee" class="fs-six-up fw-medium mb-2 mb-sm-4">Set Your Service fee (%)</label>
                                        <input type="number" step="0.1" class="fs-seven py-3 px-5 px-lg-6" id="site-service-fee" placeholder="6.15%" required value="{{ $data->serviceFee ? $data->serviceFee : env("SITE_SERVICE_FEE", 5)}}">
                                    </div>
                                    <div class="d-flex gap-5 gap-lg-6 pt-4">
                                        <button type="submit" class="btn_box py-2 py-lg-3 px-5 px-lg-6 cus-rounded-1 cus-border border-color">Save Change</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-12">
                        <div class="box_part_area n0-bg cus-rounded-1  p-4 p-md-7 p-xxl-10 cus-border">
                            <div class="d-flex flex-wrap justify-content-between align-items-center gap-8 row-gap-3">
                                <h4>Delete your account</h4>
                            </div>
                            <div class="box_part__content">
                                <form
                                    class="d-flex flex-column gap-5 gap-lg-6 w-100 cus-border-dashed top border-color-30 pt-5 pt-xxl-6 mt-5 mt-xxl-6">
                                    <div class="d-flex flex-column gap-4">
                                        <p class="fs-seven">When you delete your account, you lose access to Front account
                                            services, and we permanently delete your personal data. You can cancel the
                                            deletion for 14 days.</p>
                                        <div
                                            class="form-check form-check-linethrough d-flex align-items-center gap-2 gap-lg-3">
                                            <input class="form-check-input  flex-none box_5 rounded-circle"
                                                id="checkbox10" type="checkbox" checked>
                                            <label for="checkbox10">Confirm that I want to delete my account.</label>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-5 gap-lg-6 pt-4">
                                        <button type="reset"
                                            class="btn_box btn_alt py-2 py-lg-3 px-5 px-lg-6 cus-rounded-1 cus-border border-color">Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#site-currency-update').on('submit', function(e) {
                e.preventDefault();

                let currency = $('#site-currency').val();
                let token = '{{ csrf_token() }}';

                $.ajax({
                    url: '{{ route('dashboard.options.update') }}',
                    method: 'POST',
                    data: {
                        _token: token,
                        key: 'site-currency',
                        value: currency
                    },
                    success: function(response) {
                        alert(response.message); // Show "Saved!" message
                    },
                    error: function(xhr, status, error) {
                        alert('An error occurred: ' + xhr.responseText);
                    }
                });
            });
            $('#site-service-fee-update').on('submit', function(e) {
                e.preventDefault();

                let serviceFee = $('#site-service-fee').val();
                let token = '{{ csrf_token() }}';

                $.ajax({
                    url: '{{ route('dashboard.options.update') }}',
                    method: 'POST',
                    data: {
                        _token: token,
                        key: 'site-service-fee',
                        value: serviceFee
                    },
                    success: function(response) {
                        alert(response.message); // Show "Saved!" message
                    },
                    error: function(xhr, status, error) {
                        alert('An error occurred: ' + xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
