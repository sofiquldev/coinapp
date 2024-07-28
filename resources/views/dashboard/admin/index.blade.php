@php
    $total_deposit = App\Models\Transaction::where('tnx_type', 1)
        ->where('status', 1)
        ->sum('amount');
    $total_withdraw = App\Models\Transaction::where('tnx_type', 2)
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
                    <h2>Dashboard</h2>
                    {{-- <div class="d-flex align-items-center gap-3 gap-lg-6">
                        <button type="submit"
                            class="btn_box cus-border border-color py-2 py-lg-3 py-xxl-4 px-4 px-lg-5 px-xxl-8 gap-2 gap-lg-3"
                            data-bs-toggle="modal" data-bs-target="#liquidity"> <span
                                class="material-symbols-outlined">add_circle </span> Liquidity</button>
                        <a href="{{ route('trade') }}"
                            class="btn_box btn_alt cus-border border-color py-2 py-lg-3 py-xxl-4 px-4 px-lg-5 px-xxl-8">
                            Trade</a>
                    </div> --}}
                </div>
            </div>
        </div>

        <div class="row g-4 g-md-6 four_grid">
            <div class="col-sm-6 col-xxl-3 ">
                <div class="n0-bg cus-rounded-1 p-4 p-lg-6 cus-border h-100">
                    <div class="header-part pb-4 mb-4">
                        <h4 class="d-flex align-items-center gap-3">
                            <img src="{{ asset('dashboard/images/bitcoin_mid.png') }}" class="box_8" alt="Icon">Users
                        </h4>
                    </div>
                    <div class="d-flex align-items-center justify-content-between gap-1 gap-sm-2 gap-lg-4 ">
                        <div class="text-nowrap">
                            <h4 class="n700-color">{{ $users->count() }}</h4>
                            <p>Registerd Users</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xxl-3 ">
                <div class="n0-bg cus-rounded-1 p-4 p-lg-6 cus-border h-100">
                    <div class="header-part pb-4 mb-4">
                        <h4 class="d-flex align-items-center gap-3">
                            <img src="{{ asset('dashboard/images/cardano_mid.png') }}" class="box_8" alt="Icon">Trades
                        </h4>
                    </div>
                    <div class="d-flex align-items-center justify-content-between gap-1 gap-sm-2 gap-lg-4">
                        <div class="d-flex align-items-center justify-content-between gap-1 gap-sm-2 gap-lg-4 ">
                            <div class="text-nowrap">
                                <h4 class="n700-color">{{ $transactions->count() }}</h4>
                                <p>Successfuly Trades</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xxl-3 ">
                <div class="n0-bg cus-rounded-1 p-4 p-lg-6 cus-border h-100">
                    <div class="header-part pb-4 mb-4">
                        <h4 class="d-flex align-items-center gap-3">
                            <img src="{{ asset('dashboard/images/electro_mid.png') }}" class="box_8" alt="Icon">Deposites
                        </h4>
                    </div>
                    <div class="d-flex align-items-center justify-content-between gap-1 gap-sm-2 gap-lg-4">
                        <div class="d-flex align-items-center justify-content-between gap-1 gap-sm-2 gap-lg-4 ">
                            <div class="text-nowrap">
                                <h4 class="n700-color">{{ currencyHelper($deposites) }}</h4>
                                <p>Total Deposites</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xxl-3 ">
                <div class="n0-bg cus-rounded-1 p-4 p-lg-6 cus-border h-100">
                    <div class="header-part pb-4 mb-4">
                        <h4 class="d-flex align-items-center gap-3">
                            <img src="{{ asset('dashboard/images/electro_mid.png') }}" class="box_8" alt="Icon">Withdraw
                        </h4>
                    </div>
                    <div class="d-flex align-items-center justify-content-between gap-1 gap-sm-2 gap-lg-4">
                        <div class="d-flex align-items-center justify-content-between gap-1 gap-sm-2 gap-lg-4 ">
                            <div class="text-nowrap">
                                <h4 class="n700-color">{{ currencyHelper($withdraws) }}</h4>
                                <p>Total Withdraws</p>
                            </div>
                        </div>
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
                    <div class="table-area n0-bg cus-rounded-1 p-4 p-lg-6 cus-border ">
                        <div
                            class="header-part d-flex flex-wrap justify-content-between align-items-center gap-8 row-gap-3 pb-5 pb-xxl-6 mb-5 mb-xxl-6">
                            <h4 class="fw-semibold">Transaction History</h4>
                            <div class="d-flex flex-wrap flex-sm-nowrap gap-4 gap-xxl-6 ">
                            </div>
                        </div>
                        <div class="table-main">
                            <table>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Amount</th>
                                    <th>Status</th>
                                    <th>Transaction</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($transactions as $key => $tnx)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><a href="{{ url('u/dashboard/user/'.$tnx->user->id) }}">{{ $tnx->user->name }}</a></td>
                                    <td class="text-center">
                                        {{ date('d-m-Y', strtotime($tnx->created_at)) }} <br>
                                        <small>{{ date('h:i:s A', strtotime($tnx->created_at)) }}</small>
                                    </td>
                                    <td class="text-center">
                                        {{ currencyHelper($tnx->amount) }} <br>
                                        @if ($tnx->tnx_type == 1)
                                        <small class="text-success">Deposite</small>
                                        @elseif ($tnx->tnx_type == 2)
                                        <small class="text-danger">Withdraw</small>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($tnx->status == 1)
                                        <span class="bg2-opty s1-color cus-border py-2 px-4 px-lg-5 text-center cus-rounded-2 w-100">
                                            Successful</span>
                                        @elseif ($tnx->status == 2)
                                        <span class="bg4-opty s4-color cus-border py-2 px-4 px-lg-5 text-center cus-rounded-2 w-100">
                                            Pending</span>
                                        @else
                                        <span class="bg3-opty s2-color cus-border py-2 px-4 px-lg-5 text-center cus-rounded-2 w-100">
                                            Reject</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column gap-1 text-center">
                                            <span class="fw-medium">{{ $tnx->tnx_id ?? 'nothing' }}</span>
                                            <span class="fs-eight">
                                                @if ($tnx->screenshot)
                                                <a href="{{ asset('storage/' . $tnx->screenshot) }}" data-lightbox="screenshot" data-title="{{ $tnx->user->name}} (#{{$tnx->user->id}}) - {{$tnx->tnx_id }}">View Screenshot</a>
                                                @else
                                                No screenshot found
                                                @endif
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <form class="orderActionForm" method="post">
                                            @csrf
                                            <input type="hidden" value="{{ $tnx->id }}" name="tnx_id">
                                            @if ($tnx->status == 1)
                                            <input type="hidden" value="2" name="tnx_status">
                                            <button type="submit" class="btn btn-danger">Reject</button>
                                            @else
                                            <input type="hidden" value="1" name="tnx_status">
                                            <button type="submit" class="btn btn-success">Approve</button>
                                            @endif
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
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
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>
<script>
    lightbox.option({
      'resizeDuration': 200,
      'wrapAround': true
    })
</script>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
    $('.orderActionForm').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

        var formData = $(this).serialize(); // Serialize the form data

        $.ajax({
            url: '{{ route('dashboard.tnx.update') }}',
            method: 'POST',
            data: formData,
            success: function(response) {
                // Handle the successful response here
                // console.log(response);
                location.reload();
                // You can also update the UI based on the response
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error(xhr.responseText);
                // alert('An error occurred while updating the transaction.');
            }
        });
    });
});
</script>
@endsection
