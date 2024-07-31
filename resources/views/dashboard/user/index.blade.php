@extends('layouts.admin-dashboard')

@section('content')
    <div class="container-fluid ">
        <div class="row">
            <div class="col-12">
                <div class="top-area flex-wrap d-center justify-content-between gap-8 row-gap-3">
                    <h2>Users</h2>
                </div>
            </div>
        </div>

        <div class="row g-6">
            <div class="col-12">
                <div class="d-flex flex-column gap-6">
                    <div class="table-area n0-bg cus-rounded-1 p-4 p-lg-6 cus-border ">
                        <div
                            class="header-part d-flex flex-wrap justify-content-between align-items-center gap-8 row-gap-3 pb-5 pb-xxl-6 mb-5 mb-xxl-6">
                            <h4 class="fw-semibold">Users List ({{ $data->count() }})</h4>
                            {{-- <div class="d-flex flex-wrap flex-sm-nowrap gap-4 gap-xxl-6 ">
                                <form method="GET" action="{{ route('dashboard.users') }}"
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
                            </div> --}}
                        </div>
                        <div class="table-main align">
                            <table id="admin-users-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Mail</th>
                                        <th>Balance</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $user)
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
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-3">
                                                    <a href="{{ url('u/dashboard/user/' . $user->id) }}">
                                                        @php
                                                            $profile_picture = $user->image == 'no-avatar.webp'
                                                                ? asset('dashboard/images/user.png')
                                                                : asset('storage/' . $user->image);
                                                        @endphp
                                                        <img src="{{ $profile_picture }}" class="box_8"
                                                            alt="icon">
                                                        <span>{{ $user->name }}</span>
                                                    </a>
                                                </div>
                                            </td>
                                            <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                                            <td>{{ currencyHelper($balance) }}</td>
                                            <td>
                                                @if ($user->status == 1)
                                                    <span
                                                        class="bg2-opty s1-color cus-border py-2 px-4 px-lg-5 text-center cus-rounded-2 w-100">
                                                        Active</span>
                                                @elseif ($user->status == 2)
                                                    <span
                                                        class="bg4-opty s4-color cus-border py-2 px-4 px-lg-5 text-center cus-rounded-2 w-100">
                                                        Pending</span>
                                                @else
                                                    <span
                                                        class="bg3-opty s2-color cus-border py-2 px-4 px-lg-5 text-center cus-rounded-2 w-100">
                                                        Deactivated</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('u/dashboard/user/' . $user->id) }}"><span class="material-symbols-outlined">visibility</span></a>
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
        let table = new DataTable('#admin-users-table', {
            responsive: true
        });

        $(document).ready(function() {
            $('.action_setting').on('click', function() {
                $(this).siblings('.action_drop').toggle();
            });
        });
    </script>
@endsection
