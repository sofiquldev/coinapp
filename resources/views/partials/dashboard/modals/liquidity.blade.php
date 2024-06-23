<!-- Deposit Liquidity start -->
<div class="modal calendar-modal fade" id="liquidity" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content n0-bg p-4 p-md-6 p-xxl-8">
            <div class="modal-header header-part mb-5 mb-lg-6 pb-5 pb-lg-6">
                <h4 class="modal-title">Deposit Liquidity</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" class="d-flex flex-column gap-5 gap-lg-6">
                    <div
                        class="position-relative d-center flex-column gap-4 cus-border-dashed bottom border-color-30 pb-5 pb-lg-6">
                        <div
                            class="exchange_btn box_12 n0-bg p1-color d-center rounded-3 position-absolute cursor-pointer">
                            <span class="material-symbols-outlined fs-three"> swap_vert </span>
                        </div>
                        <div class="from_area bg1-opty cus-rounded-1 cus-border p-4 p-md-6 p-xxl-8 w-100">
                            <div class="d-flex justify-content-between cus-border-dashed bottom pb-4 mb-4">
                                <span>From</span>
                                <span>Balance: 10,000 ADA</span>
                            </div>
                            <div class="input_area d-center justify-content-between gap-3">
                                <input type="text" name="from" class="alt_input fw-medium fs-five"
                                    placeholder="0.00" required>
                                <div class="d-center gap-3">
                                    <img src="{{ asset('dashboard/images/cardano_mid.png') }}" class="box_7"
                                        alt="icon">
                                    <span class="fw-medium fs-five">ADA</span>
                                </div>
                            </div>
                        </div>
                        <div class="to_area bg1-opty cus-rounded-1 cus-border p-4 p-md-6 p-xxl-8 w-100">
                            <div class="d-flex justify-content-between cus-border-dashed bottom pb-4 mb-4">
                                <span>To</span>
                                <span>Balance: 0.00 BTC</span>
                            </div>
                            <div class="input_area d-center justify-content-between gap-3">
                                <input type="text" name="from" class="alt_input fw-medium fs-five"
                                    placeholder="0.00" required>
                                <div class="d-center gap-3">
                                    <img src="{{ asset('dashboard/images/bitcoin_mid.png') }}" class="box_7"
                                        alt="icon">
                                    <span class="fw-medium fs-five">BTC</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tolerance d-flex flex-column gap-5 gap-lg-6">
                        <label class="fs-six-up fw-medium">Slippage Tolerance</label>
                        <div
                            class="input_area d-center gap-4 bg1-opty cus-border cus-rounded-1  ps-1 pe-4 pe-lg-6 py-1">
                            <span class="material-symbols-outlined rounded-3 box_8 p1-bg d-center n0-fixed fs-six">
                                percent </span>
                            <input type="text" name="from" class="alt_input" placeholder="0.00" required>
                        </div>
                        <div class="d-flex gap-5 gap-lg-6">
                            <div class="flex-fill">
                                <input type="radio" class="btn-check" name="options" id="option1">
                                <label
                                    class="btn_box btn_alt w-100 py-2 py-lg-3 px-5 px-lg-6 cus-rounded-1 cus-border border-color fs-six fw-semibold p1-color"
                                    for="option1">0.5%</label>
                            </div>
                            <div class="flex-fill">
                                <input type="radio" class="btn-check" name="options" id="option2" checked="checked">
                                <label
                                    class="btn_box btn_alt w-100 py-2 py-lg-3 px-5 px-lg-6 cus-rounded-1 cus-border border-color fs-six fw-semibold p1-color"
                                    for="option2">1%</label>
                            </div>
                            <div class="flex-fill">
                                <input type="radio" class="btn-check" name="options" id="option3">
                                <label
                                    class="btn_box btn_alt w-100 py-2 py-lg-3 px-5 px-lg-6 cus-rounded-1 cus-border border-color fs-six fw-semibold p1-color"
                                    for="option3">3%</label>
                            </div>
                        </div>
                    </div>
                    <button type="button"
                        class="btn_box w-100 mt-2 py-2 py-lg-3 px-5 px-lg-6 cus-rounded-1 cus-border border-color">Provide
                        liquidity</button>
                </form>
            </div>
        </div>
    </div>
</div>
