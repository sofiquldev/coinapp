<?php
use App\Models\SiteOption;
$site_currency = SiteOption::where('key', 'site-currency')->first();

if (empty($site_currency)) {
    $site_currency = 'INR';
} else {
    $site_currency = $site_currency['value'];
}
if (Auth::user() && Auth::user()->balance < floatval(env('SITE_MIN_DEPOSITE', 100))) {
    $default_val = Auth::user()->balance;
} else {
    $default_val = floatval(env('SITE_MIN_DEPOSITE', 100));
}

?>
<style>
    .invalid-feedback strong {
        color: rgb(240, 69, 69)
    }
</style>

<!---Modal -->
<div aria-hidden="false"
    class="fixed z-[99999999990] hidden inset-0 top-0 items-start justify-center  bg-metal-900 bg-dark-200/25"
    id="trade-modal" role="dialog">
    <div class="relative w-full p-4 h-auto animate-keep-bounce max-w-xl">
        <div class="relative bg-white dark:bg-dark-200 shadow-box rounded-medium p-2.5 ">
            <div class="border border-dashed rounded border-gray-100 dark:border-borderColour-dark p-10 max-lg:p-5 ">
                @if(Auth::user())
                <div class="user-balance">
                    <i class="fa-solid fa-coins"></i> {{ Auth::user() ? Auth::user()->balance : 0 }}
                </div>

                <div
                    class="flex items-center justify-center bg border-b border-dashed border-b-borderColour dark:border-borderColour-dark pb-5">
                    <h3 class="text-paragraph dark:text-white">Buy <span id="highlight-coin-name">Coin</span></h3>
                </div>
                <form method="POST" action="{{ route('order.post') }}" id="buy-coin-form">
                    @method('post')
                    @csrf
                    <input type="hidden" id="coin" name="coin">
                    <input type="hidden" id="coin-amount-input" name="coin_amount">

                    <br>
                    <div>
                        <label for="rate">Rate: (USD)</label>
                        <input type="text" id="rate" name="rate" readonly
                            style="background: transparent;padding: 0;border:none;font-size: 1.5em;pointer-events: none;color:#c4f241">
                    </div>
                    <div>
                        <label for="invested-money">Invested Money: ({{ $site_currency }})</label>
                        <input type="number" id="invested-money" name="invested_money"
                            value="{{ floatval($default_val) }}" min="0"
                            max="{{ Auth::user() ? Auth::user()->balance : 0 }}" required>
                    </div>
                    <div>
                        <p>You got</p>
                        <h1 class="text-center" id="coin-amount"></h1>
                        <br>
                    </div>
                    <div class="time-selector">
                        <input type="radio" id="1mnt" name="trade_time" value="60" checked>
                        <label for="1mnt"><span>1 Minute</span></label>
                        <input type="radio" id="3mnt" name="trade_time" value="180">
                        <label for="3mnt"><span>3 Minute</span></label>
                        <input type="radio" id="5mnt" name="trade_time" value="300">
                        <label for="5mnt"><span>5 Minute</span></label>
                    </div>
                    <div class="modal-btn-group">
                        <button type="button" class="btn btn-sm btn-danger" id="ok-trade-btn">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-navbar" id="buy-button">Buy Coin</button>
                    </div>
                </form>
                @else
                <h2>You need to login first</h2>
                <br>
                <form method="POST" action="{{ route('login') }}" id="buy-coin-form">
                    @method('post')
                    @csrf
                    <div class="d-flex flex-column gap-5">
                        <div class="single-input">
                            <label class="fs-six-up fw-medium mb-2 mb-sm-4" for="email">Enter Your Email ID</label>
                            <input type="email" class="fs-seven py-2 py-lg-3 px-3 px-lg-6 @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter Your Email..." value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="single-input">
                            <label class="fs-six-up fw-medium mb-2 mb-sm-4" for="password">Enter Your
                                Password</label>
                            <div class="input-pass">
                                <input type="password"
                                    class="fs-seven py-2 py-sm-3 ps-3 ps-lg-5 ps-lg-6 pe-10 pe-lg-13 @error('password') is-invalid @enderror"
                                    name="password" id="password" placeholder="Enter Your Password..." required autocomplete="current-password">
                                <span class="password-eye-icon"></span>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="part">
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="d-flex justify-content-end fs-seven p1-color">Forget
                                password</a>
                            @endif
                            @if (Route::has('register'))
                                <p>Don’t have an account? <a href="{{ route('register') }}" class="p1-color fw-semibold">Signup</a></p>
                            @endif
                        </div>
                    </div>
                    <br>
                    <div class="modal-btn-group">
                        <button type="button" class="btn btn-sm btn-danger" id="ok-trade-btn">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-navbar" id="buy-button">Login</button>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
@if(Auth::user())
<script>
    let tradeModal = document.getElementById("trade-modal"),
        tradeForm = document.getElementById("buy-coin-form"),
        tradeModalOpenBtns = document.querySelectorAll(".open-trade-btn"),
        tradeModalCloseBtn = document.getElementById("ok-trade-btn"),
        highlightCoinName = document.getElementById("highlight-coin-name"),
        coinInput = document.getElementById("coin"),
        rateInput = document.getElementById("rate"),
        investedMoneyInput = document.getElementById("invested-money"),
        coinAmountText = document.getElementById("coin-amount"),
        coinAmountInput = document.getElementById("coin-amount-input"),
        buyButton = document.getElementById("buy-button");

    // Default invested money value
    const defaultInvestedMoney = parseFloat("{{ $default_val }}");

    // Attach click event to each open button
    tradeModalOpenBtns.forEach(btn => {
        btn.onclick = async function() {
            // Get data from button
            let coin = btn.getAttribute("data-coin");
            let rate = btn.getAttribute("data-price");

            // Populate form fields
            coinInput.value = coin;
            rateInput.value = rate;
            investedMoneyInput.value = defaultInvestedMoney;
            highlightCoinName.innerHTML = coin;

            // Calculate and set default coin amount
            await calculateCoinPrice();

            // Display the modal
            tradeModal.classList.remove('hidden');
            tradeModal.style.display = "flex";
        };
    });

    // Close button event
    tradeModalCloseBtn.onclick = function() {
        tradeModal.style.display = "none";
        tradeModal.classList.add('hidden');
    };

    // Close modal when clicking outside of it
    window.onclick = function(e) {
        if (e.target == tradeModal) {
            tradeModal.style.display = "none";
            tradeModal.classList.add('hidden');
        }
    };

    // Calculate coin amount when invested money changes
    investedMoneyInput.oninput = async function() {
        await calculateCoinPrice();
    };

    async function calculateCoinPrice() {
        let rate = parseFloat(rateInput.value);
        let investedMoney = parseFloat(investedMoneyInput.value);

        let convertedMoney = await convertCurrency('{{ $site_currency }}', investedMoney);

        if (!isNaN(rate) && !isNaN(convertedMoney)) {
            let coinAmount = (convertedMoney / rate).toFixed(8);
            coinAmountText.innerHTML = coinAmount;
            coinAmountInput.value = coinAmount;
        } else {
            coinAmountText.innerHTML = '0';
            coinAmountInput.value = '0';
        }
    };

    async function convertCurrency(inputCurrency = 'INR', amount = 1, outputCurrency = 'USD') {
        const apiUrl = `https://api.exchangerate-api.com/v4/latest/${inputCurrency.toUpperCase()}`;

        try {
            const response = await fetch(apiUrl);
            const data = await response.json();

            if (!data.rates || !data.rates[outputCurrency]) {
                throw new Error('Invalid currency code or unable to fetch conversion rate');
            }

            const rate = data.rates[outputCurrency];
            const convertedAmount = amount * rate;

            return parseFloat(convertedAmount);
        } catch (error) {
            console.error('Error:', error);
            return null;
        }
    }
</script>
@else
<script>
    let tradeModal = document.getElementById("trade-modal"),
        tradeModalOpenBtns = document.querySelectorAll(".open-trade-btn"),
        tradeModalCloseBtn = document.getElementById("ok-trade-btn");


    // Attach click event to each open button
    tradeModalOpenBtns.forEach(btn => {
        btn.onclick = async function() {
            // Display the modal
            tradeModal.classList.remove('hidden');
            tradeModal.style.display = "flex";
        };
    });

    // Close button event
    tradeModalCloseBtn.onclick = function() {
        tradeModal.style.display = "none";
        tradeModal.classList.add('hidden');
    };

    // Close modal when clicking outside of it
    window.onclick = function(e) {
        if (e.target == tradeModal) {
            tradeModal.style.display = "none";
            tradeModal.classList.add('hidden');
        }
    };
</script>
@endif
