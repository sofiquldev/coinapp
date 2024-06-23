<!-- Select Token Start -->
<div class="modal calendar-modal fade" id="token" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content n0-bg py-4 py-sm-6 py-lg-8 px-2 px-lg-4">
            <div class="modal-header header-part mb-5 mb-lg-6 pb-5 pb-lg-6 mx-3 mx-lg-4">
                <h4 class="modal-title">Select Token</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex flex-column">
                <form method="POST" class="search__form_modal d-none d-md-flex mb-5 mb-lg-6 mx-2 mx-lg-4">
                    <div class="alt_form d-center gap-1 bg1-opty p-1 ps-6 ps-lg-8 cus-border cus-rounded-1 w-100">
                        <input type="text" name="search__text" placeholder="Search" required>
                        <button type="submit" class="p1-bg rounded-3 d-center box_10" name="search__submit">
                            <span class="material-symbols-outlined fs-four n0-fixed"> search </span>
                        </button>
                    </div>
                </form>
                <div class="token_content d-flex flex-column">
                    <a href="#" class="d-flex p-2 p-lg-4 cus-rounded-1 transition">
                        <div class="flex-fill d-flex align-items-center gap-4 gap-lg-5 gap-xxl-6">
                            <img src="{{ asset('dashboard/images/bitcoin_lg.png') }}" class="box_12" alt="icon">
                            <div class="d-flex flex-column gap-1">
                                <span class="fs-five fw-medium">BTC</span>
                                <span class="fs-seven">Bitcoin</span>
                            </div>
                        </div>
                        <div class="d-flex flex-column gap-1 align-items-end">
                            <span class="fs-six-up">215.3 USDT</span>
                            <div class="s1-color d-flex align-items-center gap-1"><span
                                    class="material-symbols-outlined"> show_chart </span>92.4%</div>
                        </div>
                    </a>
                    <a href="#" class="d-flex p-2 p-lg-4 cus-rounded-1 transition">
                        <div class="flex-fill d-flex align-items-center gap-4 gap-lg-5 gap-xxl-6">
                            <img src="{{ asset('dashboard/images/dogecoin_lg.png') }}" class="box_12" alt="icon">
                            <div class="d-flex flex-column gap-1">
                                <span class="fs-five fw-medium">DOGE</span>
                                <span class="fs-seven">Dogecoin</span>
                            </div>
                        </div>
                        <div class="d-flex flex-column gap-1 align-items-end">
                            <span class="fs-six-up">635.89 DOGE</span>
                            <div class="s1-color d-flex align-items-center gap-1"><span
                                    class="material-symbols-outlined"> show_chart </span>72.6%</div>
                        </div>
                    </a>
                    <a href="#" class="d-flex p-2 p-lg-4 cus-rounded-1 transition">
                        <div class="flex-fill d-flex align-items-center gap-4 gap-lg-5 gap-xxl-6">
                            <img src="{{ asset('dashboard/images/cardano_lg.png') }}" class="box_12" alt="icon">
                            <div class="d-flex flex-column gap-1">
                                <span class="fs-five fw-medium">ADA</span>
                                <span class="fs-seven">Cardano</span>
                            </div>
                        </div>
                        <div class="d-flex flex-column gap-1 align-items-end">
                            <span class="fs-six-up">546.7 ADA</span>
                            <div class="s3-color d-flex align-items-center gap-1"><span
                                    class="material-symbols-outlined"> show_chart </span>55.3%</div>
                        </div>
                    </a>
                    <a href="#" class="d-flex p-2 p-lg-4 cus-rounded-1 transition">
                        <div class="flex-fill d-flex align-items-center gap-4 gap-lg-5 gap-xxl-6">
                            <img src="{{ asset('dashboard/images/bnb.png') }}" class="box_12" alt="icon">
                            <div class="d-flex flex-column gap-1">
                                <span class="fs-five fw-medium">BNB</span>
                                <span class="fs-seven">Binance</span>
                            </div>
                        </div>
                        <div class="d-flex flex-column gap-1 align-items-end">
                            <span class="fs-six-up">7845.9 BNB</span>
                            <div class="s2-color d-flex align-items-center gap-1"><span
                                    class="material-symbols-outlined"> show_chart </span>42.2%</div>
                        </div>
                    </a>
                    <a href="#" class="d-flex p-2 p-lg-4 cus-rounded-1 transition">
                        <div class="flex-fill d-flex align-items-center gap-4 gap-lg-5 gap-xxl-6">
                            <img src="{{ asset('dashboard/images/bitcoin_lg.png') }}" class="box_12" alt="icon">
                            <div class="d-flex flex-column gap-1">
                                <span class="fs-five fw-medium">CHAIN</span>
                                <span class="fs-seven">Linkchain</span>
                            </div>
                        </div>
                        <div class="d-flex flex-column gap-1 align-items-end">
                            <span class="fs-six-up">66.75 CHAIN</span>
                            <div class="s2-color d-flex align-items-center gap-1"><span
                                    class="material-symbols-outlined"> show_chart </span>33.3%</div>
                        </div>
                    </a>
                </div>

                <div class="mx-2 mx-lg-4 cus-border-dashed top border-color-30 mt-2 pt-5 pt-lg-6">
                    <button type="button"
                        class="btn_box w-100 mt-2 py-2 py-lg-3 px-4  gap-3 cus-rounded-1 cus-border border-color"><svg
                            xmlns="http://www.w3.org/2000/svg" width="18" height="17" viewBox="0 0 18 17"
                            fill="none">
                            <path
                                d="M6.99147 9.33073C7.44981 9.33073 7.82481 9.70573 7.82481 10.1641C7.82481 10.6224 7.44981 10.9974 6.99147 10.9974C6.53314 10.9974 6.15814 10.6224 6.15814 10.1641C6.15814 9.70573 6.53314 9.33073 6.99147 9.33073ZM6.99147 7.66406C5.60814 7.66406 4.49147 8.78073 4.49147 10.1641C4.49147 11.5474 5.60814 12.6641 6.99147 12.6641C8.37481 12.6641 9.49147 11.5474 9.49147 10.1641C9.49147 8.78073 8.37481 7.66406 6.99147 7.66406ZM14.0748 5.9974L14.9831 3.98906L16.9915 3.08073L14.9831 2.1724L14.0748 0.164062L13.1665 2.1724L11.1581 3.08073L13.1665 3.98906L14.0748 5.9974ZM16.3915 9.0974L15.7415 7.66406L15.0915 9.0974L13.6581 9.7474L15.0915 10.3974L15.7415 11.8307L16.3915 10.3974L17.8248 9.7474L16.3915 9.0974ZM12.1998 10.1641C12.1998 10.0641 12.1998 9.95573 12.1915 9.85573L13.8081 8.63073L11.7248 5.0224L9.85814 5.80573C9.69147 5.6974 9.50814 5.58906 9.32481 5.4974L9.07481 3.4974H4.90814L4.65814 5.50573C4.4748 5.5974 4.2998 5.70573 4.1248 5.81406L2.25814 5.0224L0.174805 8.63073L1.79147 9.85573C1.78314 9.95573 1.78314 10.0641 1.78314 10.1641C1.78314 10.2641 1.78314 10.3724 1.79147 10.4724L0.174805 11.6974L2.25814 15.3057L4.1248 14.5224C4.29147 14.6307 4.4748 14.7391 4.65814 14.8307L4.90814 16.8307H9.07481L9.32481 14.8224C9.50814 14.7307 9.68314 14.6307 9.85814 14.5141L11.7248 15.2974L13.8081 11.6891L12.1915 10.4641C12.1998 10.3724 12.1998 10.2641 12.1998 10.1641ZM11.0165 13.1974L9.57481 12.5891C9.10814 13.0891 8.49147 13.4557 7.79981 13.6141L7.5998 15.1641H6.38314L6.19147 13.6141C5.4998 13.4557 4.88314 13.0891 4.41647 12.5891L2.9748 13.1974L2.36647 12.1391L3.60814 11.1974C3.50814 10.8724 3.45814 10.5307 3.45814 10.1724C3.45814 9.81406 3.50814 9.4724 3.60814 9.1474L2.36647 8.20573L2.9748 7.1474L4.41647 7.75573C4.88314 7.25573 5.4998 6.88906 6.19147 6.73073L6.38314 5.16406H7.60814L7.79981 6.71406C8.49147 6.8724 9.10814 7.23906 9.57481 7.73906L11.0165 7.13073L11.6248 8.18906L10.3831 9.13073C10.4831 9.45573 10.5331 9.7974 10.5331 10.1557C10.5331 10.5141 10.4831 10.8557 10.3831 11.1807L11.6248 12.1224L11.0165 13.1974Z"
                                fill="white" />
                        </svg>Manage Token
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
