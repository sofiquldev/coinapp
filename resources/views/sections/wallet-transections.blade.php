<section class="relative" style="margin-bottom: -50px;z-index:9999999">
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
            <div class="text-center">
                <h2 class="mb-5 max-lg:text-[32px] text-[48px] font-semibold">
                    Recent Transections
                </h2>
                <p class="max-lg:mt-6 mb-12 max-w-[400px] mx-auto">
                    By creating a custom Web design for your business, we can bring your vision to life.
                </p>
            </div>

            <div class="trade-table">
                <table>
                    <thead>
                        <tr>
                            <th style="min-width: 36px">#</th>
                            <th style="text-align: left">Date</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transections as $key => $tnx)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td>{{ date('d-m-Y', strtotime($tnx->created_at)) }}</td>
                                <td class="text-center">{{ $tnx->tnx_type == 1 ? 'Deposit' : 'Withdraw' }}</td>
                                <td class="text-center" style="color: {{ $tnx->tnx_type == 1 ? 'green' : 'red' }}">{{ $tnx->tnx_type == 1 ? '+' : '-' }}{{ currencyHelper($tnx->amount) }}</td>
                                <td class="text-center">{{ $tnx->status == 1 ? 'Success' : 'Pending' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if($transections->count()>10)
            <div class="text-center" style="margin-top: 32px">
                <a href="#" class="btn">
                    See All Trades
                </a>
            </div>
            @endif
        </div>
    </div>
    <div style="height: 100px;"></div>
</section>
