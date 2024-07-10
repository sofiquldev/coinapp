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
                <h2>Trades History</h2>
            </div>
        </div>
    </div>

    <div class="row g-6">
        <div class="col-12">
            <div class="d-flex flex-column gap-6">
                <div class="table-area n0-bg cus-rounded-1 p-4 p-lg-6 cus-border ">
                    <div class="header-part d-flex flex-wrap justify-content-between align-items-center gap-8 row-gap-3 pb-5 pb-xxl-6 mb-5 mb-xxl-6">
                        <h4 class="fw-semibold">Trades History ({{ $trades->count() }})</h4>
                        <div class="d-flex flex-wrap flex-sm-nowrap gap-4 gap-xxl-6 ">
                            <form method="GET" action="{{ route('dashboard.trades') }}" class="search__form order-2 order-sm-0">
                                <div class="d-center gap-1 bg1-opty p-1 ps-6 ps-lg-8 cus-border cus-rounded-1 alt_form">
                                    <input type="text" name="search__text" placeholder="Search" value="{{ request('search__text') }}">
                                    <button type="submit" class="p1-bg rounded-3 d-center box_10" name="search__submit">
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
                                <th>Amount</th>
                                <th>Price</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($trades as $key => $trade)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td><a href="{{ url('u/dashboard/user/'.$trade->user->id) }}">{{ $trade->user->name }}</a></td>
                                <td>{{ $trade->coin_amount }} {{ $trade->coin_name }}</td>
                                <td class="text-center">
                                    {{ currencyHelper($trade->total) }} <br>
                                    @if ($trade->tnx_type == 1)
                                    <small class="text-success">Deposite</small>
                                    @elseif ($trade->tnx_type == 2)
                                    <small class="text-danger">Withdraw</small>
                                    @endif
                                </td>
                                <td class="text-center">
                                    {{ date('d-m-Y', strtotime($trade->created_at)) }} <br>
                                    <small>{{ date('h:i:s A', strtotime($trade->created_at)) }}</small>
                                </td>
                                <td>
                                    @if ($trade->status == 1)
                                        <span class="bg2-opty s1-color cus-border py-2 px-4 px-lg-5 text-center cus-rounded-2 w-100">Successful</span>
                                    @elseif ($trade->status == 2)
                                        <span class="bg4-opty s4-color cus-border py-2 px-4 px-lg-5 text-center cus-rounded-2 w-100">Pending</span>
                                    @else
                                        <span class="bg3-opty s2-color cus-border py-2 px-4 px-lg-5 text-center cus-rounded-2 w-100">Reject</span>
                                    @endif
                                </td>
                                <td>
                                    <form class="orderActionForm" method="post">
                                        @csrf
                                        <div class="form-group trade-action-profit-lose">
                                            <input type="radio" name="trade-result" id="trade-profit-{{ $trade->id}}" value="1" checked>
                                            <label for="trade-profit-{{ $trade->id}}">Profit</label>
                                            <input type="radio" name="trade-result" id="trade-lose-{{ $trade->id}}" value="2">
                                            <label for="trade-lose-{{ $trade->id}}" class="lose">Lose</label>
                                        </div>
                                        <input type="hidden" value="{{ $trade->id }}" name="trade_id">
                                        @if ($trade->status == 1)
                                        <input type="hidden" value="2" name="trade_status">
                                        <button type="submit" class="btn btn-danger">Reject</button>
                                        @else
                                        <input type="hidden" value="1" name="trade_status">
                                        <button type="submit" class="btn btn-success">Approve</button>
                                        @endif
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        <div class="table-bottom d-center justify-content-between mt-5 mt-lg-6 flex-wrap gap-6 row-gap-3">
                            {{ $trades->appends(request()->query())->links() }}
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
    $('.orderActionForm').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

        var formData = $(this).serialize(); // Serialize the form data

        $.ajax({
            url: '{{ route('dashboard.order.update') }}',
            method: 'POST',
            data: formData,
            success: function(response) {
                // Handle the successful response here
                // console.log(response);
                location.reload();
                // alert('Transaction updated successfully.');
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
