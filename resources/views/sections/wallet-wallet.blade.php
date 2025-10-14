@php
    use Illuminate\Support\Facades\Auth;
    $user = Auth::user();

    /* $total_deposit = App\Models\Transaction::where('user_id', $user->id)
        ->where('tnx_type', 1)
        ->where('status', 1)
        ->sum('amount');
    $total_withdraw = App\Models\Transaction::where('user_id', $user->id)
        ->where('tnx_type', 2)
        ->where('status', 1)
        ->sum('amount');
    $balance = $total_deposit - $total_withdraw; */

    $balance = json_decode(auth()->user()->balance ?? '{"btc": 0, "eth": 0, "usdt": 0}');

    $site_currency = App\Models\SiteOption::where('key', 'site-currency')->first();
    if(empty($site_currency)) {
        $site_currency = 'INR';
    } else {
        $site_currency = $site_currency['value'];
    }
@endphp

<section class="bg-white dark:bg-dark-300 py-150 max-md:py-25 relative max-md:overflow-hidden">
    <div class="absolute left-0 right-0 top-25 bg-[url('../images/core-gradient.png')] bg-no-repeat bg-center opacity-70 w-full h-full bg-[length:600px_1000px] md:hidden"></div>
    <div class="container ">

        <div class="relative z-10">
            <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 flex max-md:flex-col -z-10 max-md:hidden">
                <div class="max-1xl:w-[335px] max-1xl:h-[335px]  1xl:w-[442px] 1xl:h-[442px]  rounded-full bg-primary-200/20 blur-[145px]"></div>
                <div class="max-1xl:w-[335px] max-1xl:h-[335px]  1xl:w-[442px] 1xl:h-[442px]  rounded-full bg-primary-200/25 -ml-[170px] max-md:ml-0 blur-[145px]"></div>
                <div class="max-1xl:w-[335px] max-1xl:h-[335px]  1xl:w-[442px] 1xl:h-[442px]  rounded-full bg-primary-200/20 -ml-[170px] max-md:ml-0 blur-[145px]"></div>
            </div>
            <div class="grid grid-cols-2 max-md:grid-cols-1 gap-8" style="max-width: 900px; margin: auto">
                <div class="bg-white dark:bg-dark-200 shadow-box rounded-medium p-2.5">
                    <div class="border border-dashed rounded border-gray-100 dark:border-borderColour-dark p-10 h-full max-lg:p-5 text-center ">
                        <img src="https://assets.coincap.io/assets/icons/btc@2x.png" alt="banking logo" class="inline-block mb-6">
                        <h3 class="mb-2.5">{{ floatval($balance->btc) }} BTC</h3>
                        <p>BTC</p>
                    </div>
                </div>

                <div class="bg-white dark:bg-dark-200 shadow-box rounded-medium p-2.5">
                    <div class="border border-dashed rounded border-gray-100 dark:border-borderColour-dark p-10 h-full max-lg:p-5 text-center">
                        <img src="{{ asset('images/banking/savings.svg') }}" alt="banking logo" class="inline-block dark:hidden mb-6">
                        <img src="https://assets.coincap.io/assets/icons/eth@2x.png" alt="banking logo" class="inline-block mb-6">
                        <h3 class="mb-2.5">{{ floatval($balance->eth) }} ETH</h3>
                        <p>USDT</p>
                    </div>
                </div>

                {{-- <div class="bg-white dark:bg-dark-200 shadow-box rounded-medium p-2.5">
                    <div class="border border-dashed rounded border-gray-100 dark:border-borderColour-dark p-10 h-full max-lg:p-5 text-center">
                        <img src="https://assets.coincap.io/assets/icons/usd@2x.png" alt="banking logo" class="inline-block mb-6">
                        <h3 class="mb-2.5">{{ currencyHelper($balance) }}</h3>
                        <p>{{ $site_currency }}</p>
                    </div>
                </div> --}}
            </div>
            <div class="text-center">
                <br><br>
                <a href="{{ route('deposit') }}" class="btn btn-navbar">
                    Deposit Balance
                </a>
                <a href="{{ route('withdraw') }}" class="btn btn-navbar">
                    Withdraw Balance
                </a>
                {{-- <a href="{{ route('buy-sell') }}" class="btn btn-navbar">
                    Buy/Sell
                </a> --}}
            </div>
            <br>
            <div class="bg-white dark:bg-dark-200 shadow-box rounded-medium p-2.5">
                <div class="border border-dashed rounded border-gray-100 dark:border-borderColour-dark p-10 h-full max-lg:p-5 text-center">
                    <img src="{{ asset('images/banking/savings.svg') }}" alt="banking logo" class="inline-block dark:hidden mb-6">
                    <img src="{{ asset('images/banking/savings-dark.svg') }}" alt="banking logo" class="hidden dark:inline-block mb-6">
                    <h3 class="mb-2.5">New Task </h3>
                    <a href="{{ route('trade') }}" class="btn btn-navbar">
                        Trade Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


