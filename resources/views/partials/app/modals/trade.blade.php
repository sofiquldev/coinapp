<!---Modal -->
<div aria-hidden="false"
    class="fixed z-[99999999990] hidden inset-0 top-0 items-start justify-center  bg-metal-900 bg-dark-200/25" id="trade-modal" role="dialog">
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
                        <input type="text" id="rate" name="rate" readonly style="background: transparent;padding: 0;border:none;font-size: 1.5em;pointer-events: none;color:#c4f241" >
                    </div>
                    <div>
                        <label for="invested-money">Invested Money:</label>
                        <input type="number" id="invested-money" name="invested_money"
                            min="{{ env('SITE_MIN_DEPOSITE', 100) }}" value="{{ env('SITE_MIN_DEPOSITE', 100) }}" required>
                    </div>
                    <div>
                        <p>You got</p>
                        <h1 class="text-center" id="coin-amount"></h1>
                        <br><br>
                    </div>
                    <div class="modal-btn-group">
                        <button type="button" class="btn btn-sm btn-danger"
                            id="ok-trade-btn">Cancel</button>
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
        coinAmountInput = document.getElementById("coin-amount"),
        buyButton = document.getElementById("buy-button");

    // Default invested money value
    const defaultInvestedMoney = parseFloat("{{ env('SITE_MIN_DEPOSITE', 100) }}");

    // Attach click event to each open button
    tradeModalOpenBtns.forEach(btn => {
        btn.onclick = function() {
            // Get data from button
            let coin = btn.getAttribute("data-coin");
            let rate = btn.getAttribute("data-price");

            // Populate form fields
            coinInput.value = coin;
            rateInput.value = rate;
            investedMoneyInput.value = defaultInvestedMoney;
            highlightCoinName.innerHTML = coin

            // Calculate and set default coin amount
            calculateCoinPrice();

            // Display the modal
            tradeModal.style.display = "flex";
        };
    });

    // Close button event
    tradeModalCloseBtn.onclick = function() {
        tradeModal.style.display = "none";
    };

    // Close modal when clicking outside of it
    window.onclick = function(e) {
        if (e.target == tradeModal) {
            tradeModal.style.display = "none";
        }
    };

    // Calculate coin amount when invested money changes
    investedMoneyInput.oninput = function() {
        calculateCoinPrice();
    }

    function calculateCoinPrice() {
        let rate = parseFloat(rateInput.value);
        let investedMoney = parseFloat(investedMoneyInput.value);
        if (!isNaN(rate) && !isNaN(investedMoney)) {
            coinAmountText.innerHTML = (investedMoney / rate).toFixed(8);
            coinAmountInput.value = (investedMoney / rate).toFixed(8);
        } else {
            coinAmountText.innerHTML = '0';
            coinAmountInput.value = '0';
        }
    };

    // Buy button event
    // tradeForm.onsubmit = function(e) {
    //     // e.preventDefault(); // Prevent form from submitting the traditional way

    //     // Gather form data
    //     // let formData = new FormData(document.getElementById("buy-coin-form"));

    //     // Send AJAX request
    //     fetch('/orders', {
    //         method: 'POST',
    //         body: formData,
    //         headers: {
    //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    //         }
    //     })
    //     .then(response => response.json())
    //     .then(data => {
    //         if (data.success) {
    //             alert(data.message);
    //             // Close the modal
    //             tradeModal.style.display = "none";
    //         } else {
    //             alert('Error placing order');
    //         }
    //     })
    //     .catch(error => {
    //         console.error('Error:', error);
    //         alert('Error placing order');
    //     });
    // };
</script>
