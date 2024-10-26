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
            <script async src="https://static.coinstats.app/widgets/coin-chart-widget.js"></script>
            <coin-stats-chart-widget type="large" coin-id="ethereum" width="100%" chart-height="720px" currency="USD" locale="en" bg-color="#1C1B1B" text-color="#FFFFFF" status-up-color="#74D492" status-down-color="#FE4747" buttons-color="#1C1B1B" chart-color="#FFA959" chart-gradient-from="rgba(255,255,255,0.07)" chart-gradient-to="rgba(0,0,0,0)" chart-label-background="#000000" candle-grids-color="rgba(255,255,255,0.1)" border-color="rgba(255,255,255,0.15)" font="Roboto, Arial, Helvetica" btc-color="#6DD400" eth-color="#67B5FF"></coin-stats-chart-widget>
            @endif
        </div>
    </div>
</section>


