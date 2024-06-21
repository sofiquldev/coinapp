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
                <table id="crypto-table" class="display">
                    <thead>
                        <tr>
                            <th class="text-center">Rank</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Market Cap</th>
                            <th class="text-center">Supply</th>
                            <th class="text-center">Volume (24hr)</th>
                            <th class="text-center">Change (24hr)</th>
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
                                <td class="coin-price text-center">${{ formatNumber($asset['priceUsd'], 2) }}</td>
                                <td class="text-center coin-market-cap">${{ formatNumber($asset['marketCapUsd'], 2) }}
                                </td>
                                <td class="text-center coin-supply">${{ formatNumber($asset['supply'], 2) }}</td>
                                <td class="text-center coin-volume">${{ formatNumber($asset['volumeUsd24Hr'], 2) }}
                                </td>
                                <td class="text-center coin-change {{ $asset['changePercent24Hr'] < 0 ? 'color-red' : 'color-green' }}">
                                    {{ formatNumber($asset['changePercent24Hr']) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            {{-- <table id="crypto-table" class="display">

                <thead>
                    <tr>
                        <th>Rank</th>
                        <th class="coin-name">Name</th>
                        <th class="coin-price">Price (USD)</th>
                        <th>Market Cap (USD)</th>
                        <th>Supply</th>
                        <th>Volume (24Hr USD)</th>
                        <th class="coin-change">Change (24Hr %)</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data will be inserted here -->
                </tbody>
            </table> --}}
        </div>
    </div>
</section>
