@if ($paginator->hasPages())
<ul class="pagination gap-2">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <li class="page-item btn_box box_10 btn_alt cus-border border-color disabled" aria-disabled="true">
            <a class="page-link d-center" href="javascript:void(0)" aria-label="Previous"> 
                <span class="material-symbols-outlined">chevron_left</span>
            </a>
        </li>
    @else
        <li class="page-item btn_box box_10 cus-border border-color">
            <a class="page-link d-center" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous"> 
                <span class="material-symbols-outlined">chevron_left</span>
            </a>
        </li>
    @endif

    <!-- Page Numbers -->
    @php
        $currentPage = $paginator->currentPage();
        $lastPage = $paginator->lastPage();
        $maxPages = 5; // Maximum number of page links to show
        $half = floor($maxPages / 2);
    @endphp

    @if ($lastPage > $maxPages)
        <!-- Page Numbers -->
        @if ($currentPage > $half + 1)
            <li class="page-item btn_box box_10 cus-border border-color">
                <a class="page-link d-center" href="{{ $paginator->url(1) }}">1</a>
            </li>
            @if ($currentPage > $half + 2)
                <li class="page-item btn_box box_10 btn_alt cus-border border-color disabled" aria-disabled="true">
                    <a class="page-link d-center" href="javascript:void(0)">
                        <span class="material-symbols-outlined">more_horiz</span>
                    </a>
                </li>
            @endif
        @endif
    @endif

    <!-- Page Links -->
    @for ($i = max(1, $currentPage - $half); $i <= min($lastPage, $currentPage + $half); $i++)
        @if ($i == $currentPage)
            <li class="page-item btn_box box_10 btn_alt cus-border border-color" aria-current="page">
                <a class="page-link d-center" href="javascript:void(0)">{{ $i }}</a>
            </li>
        @else
            <li class="page-item btn_box box_10 cus-border border-color">
                <a class="page-link d-center" href="{{ $paginator->url($i) }}">{{ $i }}</a>
            </li>
        @endif
    @endfor

    @if ($lastPage > $maxPages)
        <!-- Last Page Link  -->
        @if ($currentPage < $lastPage - $half)
            @if ($currentPage < $lastPage - $half - 1)
                <li class="page-item btn_box box_10 btn_alt cus-border border-color disabled" aria-disabled="true">
                    <a class="page-link d-center" href="javascript:void(0)">
                        <span class="material-symbols-outlined">more_horiz</span>
                    </a>
                </li>
            @endif
            <li class="page-item btn_box box_10 cus-border border-color">
                <a class="page-link d-center" href="{{ $paginator->url($lastPage) }}">{{ $lastPage }}</a>
            </li>
        @endif
    @endif

    <!-- Next Page Link -->
    @if ($paginator->hasMorePages())
        <li class="page-item btn_box box_10 cus-border border-color">
            <a class="page-link d-center" href="{{ $paginator->nextPageUrl() }}" aria-label="Next"> 
                <span class="material-symbols-outlined">chevron_right</span>
            </a>
        </li>
    @else
        <li class="page-item btn_box box_10 btn_alt cus-border border-color disabled">
            <a class="page-link d-center" href="javascript:void(0)" aria-label="Next"> 
                <span class="material-symbols-outlined">chevron_right</span>
            </a>
        </li>
    @endif
</ul>
@endif
