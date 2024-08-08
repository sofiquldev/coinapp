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
                            <table id="admin-transections-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>UID</th>
                                        <th>User</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Amount</th>
                                        <th>Status</th>
                                        <th>Transaction</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $key => $tnx)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $tnx->user->id }}</td>
                                            <td><a
                                                    href="{{ url('u/dashboard/user/' . $tnx->user->id) }}">{{ $tnx->user->name }}</a>
                                            </td>
                                            <td class="text-center">
                                                {{ date('d-m-Y', strtotime($tnx->created_at)) }} <br>
                                                <small>{{ date('h:i:s A', strtotime($tnx->created_at)) }}</small>
                                            </td>
                                            <td class="text-center">
                                                {{ floatval($tnx->amount) }} <small>({{ strtoupper( $tnx->account_type ) }})</small> <br>
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
                                                            <a href="{{ asset('storage/' . $tnx->screenshot) }}"
                                                                data-lightbox="screenshot"
                                                                data-title="{{ $tnx->user->name }} (#{{ $tnx->user->id }}) - {{ $tnx->tnx_id }}">View
                                                                Screenshot</a>
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
        let table = new DataTable('#admin-transections-table', {
            responsive: true
        });
    </script>
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
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
