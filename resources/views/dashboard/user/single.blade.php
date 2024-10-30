@php
    /* $total_deposit = App\Models\Transaction::where('user_id', $user->id)
        ->where('tnx_type', 1)
        ->where('status', 1)
        ->sum('amount');
    $total_withdraw = App\Models\Transaction::where('user_id', $user->id)
        ->where('tnx_type', 2)
        ->where('status', 1)
        ->sum('amount');
    // $balance = $total_deposit - $total_withdraw;
    $balance = $user->balance; */
    $balance = json_decode($user->balance);
@endphp

@extends('layouts.admin-dashboard')

@section('content')
    <div class="container-fluid ">
        <div class="row">
            <div class="col-12">
                <div class="top-area flex-wrap d-center justify-content-between gap-8 row-gap-3">
                    <h2>Profile</h2>
                    <form method="POST" action="{{ route('dashboard.user.freege') }}">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        @if($user->status == 1)
                            <input type="hidden" name="user_status" value="5">
                            <button type="submit" class="btn btn-danger">Freeze</button>
                        @elseif($user->status == 5)
                            <input type="hidden" name="user_status" value="1">
                            <button type="submit" class="btn btn-success"><i>un-</i>Freeze</button>
                        @else
                            <input type="hidden" name="user_status" value="1">
                            <button type="submit" class="btn btn-success"><i>un-</i>Freeze</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
        <div class="row gy-5">
            <div class="col-xl-7 col-sm-6">
                <div class="box_part_area n0-bg cus-rounded-1 p-4 p-md-7 p-xxl-10 cus-border h-100">
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-8 row-gap-3">
                        <h4 style="text-transform: capitalize;">{{ $user->name }}</h4>
                    </div>
                    <div class="box_part__content">
                        <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data"
                            class="d-flex flex-column gap-5 gap-lg-6 w-100 cus-border-dashed top border-color-30 pt-5 pt-xxl-6 mt-5 mt-xxl-6">
                            @csrf
                            {{-- @method('put') --}}
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <span class="fs-six-up fw-medium d-none">Profile Photo</span>
                            <div
                                class="flex-wrap cus-border-dashed bottom pb-5 pb-lg-6 border-color-30 d-flex align-items-center gap-5 gap-lg-6 d-none">
                                <div class="user_thumbs">
                                    @php
                                        $profile_picture = $user->image == 'no-avatar.webp'
                                            ? asset('images/no-avatar.webp')
                                            : asset('storage/' . $user->image);
                                    @endphp
                                    <img src="{{ $profile_picture }}" class="box_30 cus-rounded-1"
                                        alt="image">
                                </div>
                                <div class="d-flex gap-4">
                                    <label for="user_image"
                                        class="btn btn-sm btn_box cus-border border-color fw-semibold py-2 py-lg-3 px-3 px-sm-4 px-lg-5 px-xxl-6">Upload
                                        Image
                                        <input type="file" name="file_upload" id="user_image" class="visually-hidden">
                                    </label>
                                    {{-- <button type="reset"
                                        class="btn_box btn_alt cus-border border-color  py-2 py-lg-3 px-3 px-sm-4 px-lg-5 px-xxl-6">
                                        Cancel</button> --}}
                                </div>
                            </div>
                            <div class="row gap-3 gap-sm-0">
                                <div class="single-input">
                                    <label for="name" class="fs-six-up fw-medium mb-2 mb-sm-4">User Name</label>
                                    <input type="text" class="fs-seven py-3 py-4 px-6 px-lg-8" id="name"
                                        value="{{ $user->name }}" name="name" placeholder="Enter Name" required>
                                </div>
                            </div>
                            <div class="single-input">
                                <label for="email" class="fs-six-up fw-medium mb-2 mb-sm-4">email</label>
                                <input type="text" class="fs-seven py-3 py-4 px-6 px-lg-8" value="{{ $user->email }}"
                                    id="email" name="email" placeholder="Enter Gmail Account" required>
                            </div>
                            <div class="single-input">
                                <label for="phone" class="fs-six-up fw-medium mb-2 mb-sm-4">Phone <span
                                        class="n100-color">(Optional)</span></label>
                                <input type="text" class="fs-seven py-3 py-4 px-6 px-lg-8" value="{{ $user->phone_number }}"
                                    id="phone" name="phone_number" placeholder="Enter Phone Number">
                            </div>
                            <div class="single-input">
                                <label for="phone" class="fs-six-up fw-medium mb-2 mb-sm-4">Gender :</label>
                                <div class="d-flex gap-5 gap-lg-6">
                                    <div class="d-center gap-2">
                                        <input class="form-radio-input" type="radio" name="gender" id="male" value="male"
                                            {{ $user->gender == 'male' ? 'checked': '' }}>
                                        <label class="form-radio-label" for="male">Male </label>
                                    </div>
                                    <div class="d-center gap-2">
                                        <input class="form-radio-input" type="radio" name="gender" id="female" value="female" {{ $user->gender == 'female' ? 'checked': '' }}>
                                        <label class="form-radio-label" for="female"> Female </label>
                                    </div>
                                    <div class="d-center gap-2">
                                        <input class="form-radio-input" type="radio" name="gender" id="others" value="others" {{ $user->gender == 'others' ? 'checked': '' }}>
                                        <label class="form-radio-label" for="others"> Others </label>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="single-input">
                                <label class="fs-six-up fw-medium mb-2 mb-sm-4">Tagline :</label>
                                <div id="editor" class="text_editor_area bg1-opty  cus-rounded-1 top ">
                                    <span>Hello i am</span>
                                </div>
                            </div> --}}

                            {{-- <br> --}}
                            {{-- <h4>Address</h4> --}}
                            <div class="single-input">
                                <label class="fs-six-up fw-medium mb-2 mb-sm-4" for="address">Address</label>
                                <input type="text" name="address" class="fs-seven py-3 py-4 px-6 px-lg-8" value="{{ $user->address }}">
                            </div>
                            {{-- <div class="row gap-3 gap-sm-0">
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
                            </div> --}}
                            <div class="d-flex gap-5 gap-lg-6 pt-4">
                                <button type="submit"
                                    class="btn_box py-2 py-lg-3 px-5 px-lg-6 cus-rounded-1 cus-border border-color">Save
                                    Change</button>
                                <button type="reset"
                                    class="btn_box btn_alt py-2 py-lg-3 px-5 px-lg-6 cus-rounded-1 cus-border border-color">Cancel</button>
                            </div>
                        </form>

                        <br><br>
                        <h4>Update Password</h4>
                        <form action="{{ route('dashboard.user.password') }}" method="POST"
                            class="d-flex flex-column gap-5 gap-lg-6 w-100 cus-border-dashed top border-color-30 pt-5 pt-xxl-6 mt-5 mt-xxl-6">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id  }}">
                            <div class="row gap-3 gap-sm-0">
                                <div class="single-input">
                                    <label for="new-password" class="fs-six-up fw-medium mb-2 mb-sm-4">New Password</label>
                                    <input type="password" class="fs-seven py-3 py-4 px-6 px-lg-8" id="new-password" name="new-password" placeholder="Enter New Password" required>
                                </div>
                            </div>

                            <div class="d-flex gap-5 gap-lg-6 pt-4">
                                <button type="submit"
                                    class="btn_box py-2 py-lg-3 px-5 px-lg-6 cus-rounded-1 cus-border border-color">Save
                                    Update Password</button>
                            </div>
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-sm-6">
                <div class="row gy-5 gy-xxl-6">
                    <div class="col-12">
                        <div class="n0-bg cus-rounded-1 p-4 p-lg-6 p-xxl-8 cus-border">
                            <div class="d-center justify-content-between">
                                <span class="fw-medium">Balance</span>
                            </div>
                            <h3 class="n700-color mt-4">{{ floatval($balance->btc) }} <small>BTC</small></h3>
                            <h3 class="n700-color mb-4">{{ floatval($balance->eth) }} <small>ETH</small></h3>
                            <hr>
                            <div class="d-center justify-content-between gap-6 flex-wrap">
                                <div class="d-flex flex-column">
                                    <p class="d-flex align-items-center gap-1 mb-2">
                                        <img src="https://assets.coincap.io/assets/icons/btc@2x.png" alt="btc" width="25">
                                        Bitcoin
                                    </p>
                                    <div class="d-flex gap-2">
                                        <p class="d-flex align-items-center gap-1"><span class="material-symbols-outlined fs-five text-success"> arrow_upward </span>
                                        </p>
                                        <span class="fw-semibold">{{ floatval($balance->btc) }} <small>BTC</small></span>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <p class="d-flex align-items-center gap-1"><span class="material-symbols-outlined fs-five s2-color"> arrow_downward</span>
                                        </p>
                                        <span class="fw-semibold">{{ floatval($balance->btc) }} <small>BTC</small></span>
                                    </div>
                                </div>

                                <div class="d-flex flex-column">
                                    <p class="d-flex align-items-center gap-1 mb-2">
                                        <img src="https://assets.coincap.io/assets/icons/usdt@2x.png" alt="btc" width="25">
                                        USDT
                                    </p>
                                    <div class="d-flex gap-2">
                                        <p class="d-flex align-items-center gap-1"><span class="material-symbols-outlined fs-five text-success"> arrow_upward </span>
                                        </p>
                                        <span class="fw-semibold">{{ floatval($balance->btc) }} <small>BTC</small></span>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <p class="d-flex align-items-center gap-1"><span class="material-symbols-outlined fs-five s2-color"> arrow_downward</span>
                                        </p>
                                        <span class="fw-semibold">{{ floatval($balance->btc) }} <small>BTC</small></span>
                                    </div>
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
                                                    <th>Activity Message</th>
                                                </tr>
                                                @foreach($user->activities as $activity)
                                                <tr>
                                                    <td>{{ date('d-m-Y', strtotime($activity->created_at)) }}</td>
                                                    <td style="font-size: 0.9em">
                                                        @php
                                                            $activity_message = preg_replace(
                                                                '/\{USER_NAME\}/',
                                                                $activity->user->name . 's',
                                                                $activity->message,
                                                            );
                                                        @endphp
                                                        {!! $activity_message !!}
                                                    </td>
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
            $('#user_image').change(function() {
                var formData = new FormData();
                formData.append('_token:', '{{ csrf_token() }}');
                formData.append('user_id', {{ $user->id }});
                formData.append('image', this.files[0]);

                $.ajax({
                    url: "{{ route('user.update') }}", // Replace with your route
                    type: 'POST',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('.user_thumbs>img').attr('src', `/storage/${response.user.image}`);
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endsection
