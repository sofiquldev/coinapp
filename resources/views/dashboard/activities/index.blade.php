@extends('layouts.admin-dashboard')

@section('content')
    <div class="container-fluid ">
        <div class="row">
            <div class="col-12">
                <div class="top-area flex-wrap d-center justify-content-between gap-8 row-gap-3">
                    <h2>Activities</h2>
                </div>
            </div>
        </div>

        <div class="row g-6">
            <div class="col-12">
                <div class="d-flex flex-column gap-6">
                    <div class="table-area n0-bg cus-rounded-1 p-4 p-lg-6 cus-border ">
                        <div
                            class="header-part d-flex flex-wrap justify-content-between align-items-center gap-8 row-gap-3 pb-5 pb-xxl-6 mb-5 mb-xxl-6">
                            <h4 class="fw-semibold">Activities List ({{ $data->count() }})</h4>
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
                                        <th>UID</th>
                                        <th>Name</th>
                                        <th>Activity Message</th>
                                        <th>IP Address</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if ($data)
                                        @foreach ($data as $key => $activity)
                                            <tr>
                                                <td class="w-1 id">
                                                    <span class="avatar avatar-sm">{{ $key + 1 }}</span>
                                                </td>
                                                <td class="w-1">{{ $activity->user->id }}</td>
                                                <td class="text-nowrap"><a
                                                        href="{{ route('dashboard.user', [$activity->user->id]) }}">{{ $activity->user->name }}</a>
                                                </td>
                                                <td class="td-truncate">
                                                    <div class="text-truncate">
                                                        @php
                                                            $activity_message = preg_replace(
                                                                '/\{USER_NAME\}/',
                                                                $activity->user->name . 's',
                                                                $activity->message,
                                                            );
                                                        @endphp
                                                        {!! $activity_message !!}
                                                        {{-- (#{{ $activity->id }}) --}}
                                                    </div>
                                                </td>
                                                <td class="text-nowrap">
                                                    {{ $activity->ip_address }}
                                                </td>
                                                <td class="text-nowrap text-secondary">
                                                    {{ date('d-m-Y', strtotime($activity->created_at)) }}
                                                </td>
                                                <td>
                                                    <a href="#" class="dlt-btn" data-bs-toggle="modal"
                                                        data-bs-target="#modal-danger"
                                                        data-activity-id="{{ $activity->id }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="currentColor"
                                                            class="icon icon-tabler icons-tabler-filled icon-tabler-trash">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M20 6a1 1 0 0 1 .117 1.993l-.117 .007h-.081l-.919 11a3 3 0 0 1 -2.824 2.995l-.176 .005h-8c-1.598 0 -2.904 -1.249 -2.992 -2.75l-.005 -.167l-.923 -11.083h-.08a1 1 0 0 1 -.117 -1.993l.117 -.007h16z" />
                                                            <path
                                                                d="M14 2a2 2 0 0 1 2 2a1 1 0 0 1 -1.993 .117l-.007 -.117h-4l-.007 .117a1 1 0 0 1 -1.993 -.117a2 2 0 0 1 1.85 -1.995l.15 -.005h4z" />
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <td><i>null</i></td>
                                        <td><i>null</i></td>
                                        <td><i>null</i></td>
                                        <td><i>null</i></td>
                                        <td><i>null</i></td>
                                        <td><i>null</i></td>
                                    @endif
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
