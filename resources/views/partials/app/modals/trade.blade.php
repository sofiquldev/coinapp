<?php
use App\Models\SiteOption;
$site_currency = SiteOption::where('key', 'site-currency')->first();
if(empty($site_currency)) {
    $site_currency = 'INR';
} else {
    $site_currency = $site_currency['value'];
}

?>

<!---Modal -->
<div aria-hidden="false"
    class="fixed z-[99999999990] hidden inset-0 top-0 items-start justify-center  bg-metal-900 bg-dark-200/25"
    id="trade-modal" role="dialog">
    <div class="relative w-full p-4 h-auto animate-keep-bounce max-w-xl">
        <div class="relative bg-white dark:bg-dark-200 shadow-box rounded-medium p-2.5 ">
            <div class=" border border-dashed rounded border-gray-100 dark:border-borderColour-dark p-10 max-lg:p-5 ">
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
                        <label for="invested-money">Invested Money: ({{$site_currency}})</label>
                        <input type="number" id="invested-money" name="invested_money"
                            min="{{ env('SITE_MIN_DEPOSITE', 100) }}" value="{{ env('SITE_MIN_DEPOSITE', 100) }}"
                            required>
                    </div>
                    <div>
                        <p>You got</p>
                        <h1 class="text-center" id="coin-amount"></h1>
                        <br><br>
                    </div>
                    <div class="modal-btn-group">
                        <button type="button" class="btn btn-sm btn-danger" id="ok-trade-btn">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-navbar" id="buy-button">Buy Coin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
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
    const defaultInvestedMoney = parseFloat("{{ env('SITE_MIN_DEPOSITE', 100) }}");

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

        let convertedMoney = await convertCurrency('{{$site_currency}}', investedMoney);

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
