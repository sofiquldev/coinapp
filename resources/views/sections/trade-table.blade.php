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
                $error = null;
                
                // Check if fetchCryptoData returned an error
                if (is_array($assets) && isset($assets['error'])) {
                    $error = $assets['error'];
                    $assets = [];
                } elseif (!is_array($assets)) {
                    $error = 'Failed to fetch cryptocurrency data';
                    $assets = [];
                }
            @endphp
            @if ($error)
                <div class="alert alert-danger">{{ $error }}</div>
            @elseif (empty($assets))
                <div class="alert alert-warning">No cryptocurrency data available at the moment.</div>
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
                            <th class="text-center">Trade</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($assets as $asset)
                            @php
                                $symbol = strtolower($asset['symbol']);
                                // Use image from CoinGecko data
                                $iconUrl = $asset['image'] ?? "https://coin-images.coingecko.com/coins/images/1/large/bitcoin.png?1696501400";
                                if(auth()->user()) {
                                    $balance = json_decode(auth()->user()->balance ?? '{"btc": 0, "eth": 0, "usdt": 0}', true);
                                } else {
                                    $balance = ['btc' => 0, 'eth' => 0, 'usdt' => 0];
                                }
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
                                <td class="text-center">
                                    {{-- {{ formatNumber($asset['changePercent24Hr']) }}% --}}
                                    <button
                                        type="button"
                                        class="btn btn-navbar btn-sm open-trade-btn"
                                        data-coin="{{ $asset['symbol'] }}"
                                        {{-- data-price="{{ $asset['priceUsd'] }}" --}}
                                        data-balance={{ $balance[strtolower($asset['symbol'])] ?? 0 }}
                                    >Trade</button>
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
