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
                        <div
                            class="header-part d-flex flex-wrap justify-content-between align-items-center gap-8 row-gap-3 pb-5 pb-xxl-6 mb-5 mb-xxl-6">
                            <h4 class="fw-semibold">Trades History ({{ $trades->count() }})</h4>
                            <div class="d-flex flex-wrap flex-sm-nowrap gap-4 gap-xxl-6 ">
                                <form method="GET" action="{{ route('dashboard.trades') }}"
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
                            <table id="admin-trades-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>UID</th>
                                        <th>User</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($trades as $key => $trade)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $trade->user->id }}</td>
                                            <td><a
                                                    href="{{ url('u/dashboard/user/' . $trade->user->id) }}">{{ $trade->user->name }}</a>
                                            </td>
                                            <td>
                                                {{ floatval($trade->amount) }} {{ $trade->coin_name }} <br>
                                                <small style="color: #00aabd">{{ ucwords(str_replace('_', ' ', $trade->trade_type)) }} ({{ gmdate("i", $trade->time) }} Minute)</small>
                                            </td>
                                            <td class="text-center">
                                                {{ date('d-m-Y', strtotime($trade->created_at)) }} <br>
                                                <small>{{ date('h:i:s A', strtotime($trade->created_at)) }}</small>
                                            </td>
                                            <td>
                                                @if ($trade->status == 1 && $trade->result > 0)
                                                    <span
                                                        class="bg2-opty s1-color cus-border py-2 px-4 px-lg-5 text-center cus-rounded-2 w-100"><b style="color: #fff">{{ floatval($trade->result) }} {{$trade->coin_name}}</b> Profited</span>
                                                @elseif ($trade->status == 2)
                                                    <span
                                                        class="bg4-opty s4-color cus-border py-2 px-4 px-lg-5 text-center cus-rounded-2 w-100">Pending</span>
                                                @else
                                                    <span
                                                        class="bg3-opty s2-color cus-border py-2 px-4 px-lg-5 text-center cus-rounded-2 w-100">Trade Lost</span>
                                                @endif
                                            </td>
                                            <td>
                                                <form class="orderActionForm" method="post">
                                                    @csrf
                                                    {{-- <div class="form-group trade-action-profit-lose">
                                                        <input type="radio" name="trade-result" id="trade-profit-{{ $trade->id }}" value="1" checked>
                                                        <label for="trade-profit-{{ $trade->id }}">Profit</label>
                                                        <input type="radio" name="trade-result" id="trade-lose-{{ $trade->id }}" value="2">
                                                        <label for="trade-lose-{{ $trade->id }}" class="lose">Lose</label>
                                                    </div> --}}
                                                <div class="form-group" style="display: flex; align-items:center; gap:4px">
                                                        <input type="number" name="trade-profit" step="0.000001" id="trade-profit-{{ $trade->id }}" class="profit-input" style="width:80px;padding:7px" value="{{ floatval($trade->result) }}">
                                                        <input type="button" value="Lose" class="btn btn-danger" style="width: 80px">
                                                        <input type="button" value="Profit" class="btn btn-success" id="profitBtn" style="width: 80px">
                                                    </div>
                                                    <input type="hidden" value="{{ $trade->id }}" name="trade_id">
                                                    {{-- @if ($trade->status == 1)
                                                        <input type="hidden" value="2" name="trade_status">
                                                        <button type="submit" class="btn btn-danger">Reject</button>
                                                    @else
                                                        <input type="hidden" value="1" name="trade_status">
                                                        <button type="submit" class="btn btn-success">Approve</button>
                                                    @endif --}}
                                                </form>
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
@endsection

@section('scripts')
    <script>
        let table = new DataTable('#admin-trades-table', {
            responsive: true
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.orderActionForm [type="button"]').on('click', function() {
                let trade_id = Number($(this).closest('form').find('[name="trade_id"]').val());
                let profit_input = Number($(this).closest('form').find('.profit-input').val());
                let formData;

                if($(this).attr('value') == 'Lose') {
                    formData = {
                        trade_id: trade_id,
                        result: 0,
                        trade_status: 1
                    }
                } else {
                    formData = {
                        trade_id: trade_id,
                        result: profit_input,
                        trade_status: 1
                    }
                }
                $.ajax({
                    url: '{{ route('dashboard.order.update') }}',
                    method: 'POST',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // Handle the successful response here
                        location.reload();
                        // You can also update the UI based on the response
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            })
            /* $('.orderActionForm').on('submit', function(e) {
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
            }); */
        });
    </script>
@endsection
