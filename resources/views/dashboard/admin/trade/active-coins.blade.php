@extends('layouts.admin-dashboard')

@section('content')
<div class="container-fluid ">
    <div class="row">
        <div class="col-12">
            <div class="top-area flex-wrap d-center justify-content-between gap-8 row-gap-3">
                <h2>Active Coins</h2>
            </div>
        </div>
    </div>

    <div class="row g-6">
        <div class="col-12">
            <div class="d-flex flex-column gap-6">
                <div class="table-area n0-bg cus-rounded-1 p-4 p-lg-6 cus-border ">
                    <form class="table-main align" id="activeCoinForm">
                        <table class="display">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center" style="max-width: 72px">Active</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data->active_coins as $key => $coins)
                                    @php
                                        $symbol = strtolower($coins->symbol);
                                        $iconUrl = "https://assets.coincap.io/assets/icons/{$symbol}@2x.png";
                                    @endphp
                                    <tr data-id="{{ $key+1 }}">
                                        <td class="text-center">{{ $key+1 }}</td>
                                        <td class="coin-name" title="{{ $coins->name }}">
                                            <img style="width: 36px" src="{{ $iconUrl }}" alt="{{ $coins->name }}"> {{ $coins->name }}
                                        </td>
                                        <td style="max-width: 72px">
                                            <input type="checkbox" name="activeCoins[]" data-symbol="{{ $coins->symbol }}" data-name="{{ $coins->name }}" class="checkbox form-check-input alt bg-dark flex-none box_5 border-color-500" {{ $coins->isActive ? 'checked': '' }}>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex gap-5 gap-lg-6 pt-4 justify-content-end">
                            <button type="submit" class="btn_box py-2 py-lg-3 px-5 px-lg-6 cus-rounded-1 cus-border border-color">Save Changes</button>
                            <button type="reset" class="btn_box btn_alt py-2 py-lg-3 px-5 px-lg-6 cus-rounded-1 cus-border border-color">Cancel</button>
                        </div>
                    </form>
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
