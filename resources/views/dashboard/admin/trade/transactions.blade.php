@extends('layouts.admin-dashboard')

@section('content')
<style>
    .table-bottom svg {
    width: 25px;
}

.table-bottom nav {
    width: 100%;
    display: flex;
    justify-content: space-between;
}
</style>
<div class="container-fluid ">
    <div class="row">
        <div class="col-12">
            <div class="top-area flex-wrap d-center justify-content-between gap-8 row-gap-3">
                <h2>Transaction History</h2>
            </div>
        </div>
    </div>

    <div class="row g-6">
        <div class="col-12">
            <div class="d-flex flex-column gap-6">
                <div class="table-area n0-bg cus-rounded-1 p-4 p-lg-6 cus-border ">
                    <div
                        class="header-part d-flex flex-wrap justify-content-between align-items-center gap-8 row-gap-3 pb-5 pb-xxl-6 mb-5 mb-xxl-6">
                        <h4 class="fw-semibold">Transaction History ({{ $transactions->count() }})</h4>
                        <div class="d-flex flex-wrap flex-sm-nowrap gap-4 gap-xxl-6 ">
                            <form method="GET" action="{{ route('dashboard.transactions') }}"
                                class="search__form order-2 order-sm-0">
                                <div class="d-center gap-1 bg1-opty p-1 ps-6 ps-lg-8 cus-border cus-rounded-1 alt_form">
                                    <input type="text" name="search__text" placeholder="Search"
                                        value="{{ request('search__text') }}">
                                    <button type="submit" class="p1-bg rounded-3 d-center box_10"
                                        name="search__submit">
                                        <span class="material-symbols-outlined fs-four n0-fixed"> search </span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="table-main">
                        <table>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Coin Name</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Amount</th>
                                <th>Status</th>
                                <th>Transaction</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($transactions as $key => $tnx)
                                @php
                                    $symbol = strtolower($tnx->order->coin_name);
                                    $iconUrl = "https://assets.coincap.io/assets/icons/{$symbol}@2x.png";
                                @endphp
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><a href="{{ url('u/dashboard/user/'.$tnx->user->id) }}">{{ $tnx->user->name }}</a></td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <img width="32" src="{{ $iconUrl }}" alt="icon">
                                            <span class="fw-medium">{{ $tnx->order->coin_name }}</span>
                                        </div>
                                    </td>
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
                                            <span
                                                class="bg2-opty s1-color cus-border py-2 px-4 px-lg-5 text-center cus-rounded-2 w-100">
                                                Successful</span>
                                        @elseif ($tnx->status == 2)
                                            <span
                                                class="bg4-opty s4-color cus-border py-2 px-4 px-lg-5 text-center cus-rounded-2 w-100">
                                                Pending</span>
                                        @else
                                            <span
                                                class="bg3-opty s2-color cus-border py-2 px-4 px-lg-5 text-center cus-rounded-2 w-100">
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
                                        @if ($tnx->status == 1)
                                            <a href="#" class="btn btn-danger">Reject</a>
                                        @else
                                            <a href="#" class="btn btn-success">Approve</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <div class="table-bottom d-center justify-content-between mt-5 mt-lg-6 flex-wrap gap-6 row-gap-3">
                            {{ $transactions->appends(request()->query())->links() }}
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
        $('#activeCoinForm').on('submit', function(e) {
            e.preventDefault();

            let activeCoins = [];
            $('#activeCoinForm input[type="checkbox"]').each(function() {
                let coin = {
                    name: $(this).data('name'),
                    symbol: $(this).data('symbol'),
                    isActive: $(this).is(':checked')
                };
                activeCoins.push(coin);
            });

            let token = '{{ csrf_token() }}';

            $.ajax({
                url: '{{ route('dashboard.options.update') }}',
                method: 'POST',
                data: {
                    _token: token,
                    key: 'active-coins',
                    value: JSON.stringify(activeCoins)
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
