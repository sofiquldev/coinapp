<section class="relative">
    <div
        class="absolute left-1/2 -top-150 w-full h-[550px] -translate-x-1/2 bg-cover  bg-[url('../images/hero-gradient.png')] bg-no-repeat bg-center opacity-70 md:hidden -z-10">
    </div>
    <div class="container relative" style="padding: 0;">
        <div class="absolute left-1/2 top-20 -translate-x-1/2 -translate-y-1/2 flex max-md:flex-col -z-10 max-md:hidden">
            <div
                class="max-1xl:w-[335px] max-1xl:h-[335px]  1xl:w-[442px] 1xl:h-[442px]  rounded-full bg-primary-200/20 blur-[145px]">
            </div>
            <div
                class="max-1xl:w-[335px] max-1xl:h-[335px]  1xl:w-[442px] 1xl:h-[442px]  rounded-full bg-primary-200/25 -ml-[170px] max-md:ml-0 blur-[145px]">
            </div>
            <div
                class="max-1xl:w-[335px] max-1xl:h-[335px]  1xl:w-[442px] 1xl:h-[442px]  rounded-full bg-primary-200/20 -ml-[170px] max-md:ml-0 blur-[145px]">
            </div>
        </div>
        <div
            class="absolute left-1/2 -bottom-150 pt-[700px] -translate-x-1/2 bg-contain w-full h-full  bg-[url('../images/hero-gradient.png')] bg-no-repeat bg-center opacity-70 md:hidden -z-10">
        </div>

        <div class="container">
            @php
                $assets = fetchCryptoData();
            @endphp
            @if (isset($error))
                <div class="alert alert-danger">{{ $error }}</div>
            @else
            <div class="trade-table">
                <table>
                    <thead>
                        <tr>
                            <th class="text-center" style="min-width: 36px">#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center coin-price">Price</th>
                            <th class="text-center coin-market-cap">Market Cap</th>
                            <th class="text-center coin-supply">Supply</th>
                            <th class="text-center coin-volume">Volume (24hr)</th>
                            <th class="text-center coin-change">Change (24hr)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($assets as $asset)
                            @php
                                $symbol = strtolower($asset['symbol']);
                                $iconUrl = "https://assets.coincap.io/assets/icons/{$symbol}@2x.png";
                            @endphp
                            <tr data-id="{{ $asset['id'] }}">
                                <td class="text-center">{{ $asset['rank'] }}</td>
                                <td class="coin-name" title="{{ $asset['name'] }}">
                                    <img src="{{ $iconUrl }}" alt="{{ $asset['name'] }}"> {{ $asset['symbol'] }}
                                </td>
                                <td class="text-center coin-price">${{ formatNumber($asset['priceUsd']) }}</td>
                                <td class="text-center coin-market-cap">${{ formatNumber($asset['marketCapUsd']) }}
                                </td>
                                <td class="text-center coin-supply">${{ formatNumber($asset['supply']) }}</td>
                                <td class="text-center coin-volume">${{ formatNumber($asset['volumeUsd24Hr']) }}
                                </td>
                                <td
                                    class="text-center coin-change">
                                    {{ formatNumber($asset['changePercent24Hr']) }}%
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>
</section>
