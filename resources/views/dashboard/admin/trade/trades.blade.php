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
                            <h4 class="fw-semibold">Trades History ({{ $trades->total() }})</h4>
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
                            <table>
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
                                                    <input type="hidden" value="{{ $trade->id }}" name="trade_id">
                                                    <div class="form-group" style="display: flex; align-items:center; gap:4px">
                                                        <input type="number" name="trade-profit" step="0.000001" id="trade-profit-{{ $trade->id }}" class="profit-input" style="width:80px;padding:7px" value="{{ floatval($trade->result) }}">
                                                        <input type="button" value="Lose" class="btn btn-danger" style="width: 80px">
                                                        <input type="button" value="Profit" class="btn btn-success" id="profitBtn" style="width: 80px">
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="table-bottom d-center justify-content-between mt-5 mt-lg-6 flex-wrap gap-6 row-gap-3">
                                <!-- Pagination Summary -->
                                    <p>
                                        @if($trades->total() > 0)
                                            Showing {{ $trades->firstItem() }} to {{ $trades->lastItem() }} of {{ $trades->total() }} entries
                                        @else
                                            No entries found
                                        @endif
                                    </p>
                                {{ $trades->links('partials.dashboard.widgets.pagination') }}
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
            $('.orderActionForm .btn[type="button"]').on('click', function() {
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
                    if(!profit_input) {
                        alert('Profit value must be greter then Zero!')
                        return;
                    } else {
                        formData = {
                            trade_id: trade_id,
                            result: profit_input,
                            trade_status: 1
                        }
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
        });
    </script>
@endsection
