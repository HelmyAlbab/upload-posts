@if ($paginator->hasPages())
    <nav>
        <ul class="links">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li aria-disabled="true" class="me-2" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">&lsaquo; Prev</span>
                </li>
            @else
                <li>
                    <a class="next" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo; Prev</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="pageNumber disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="pageNumber active" aria-current="page"><a href="#">{{ $page }}</a></li>
                    @else
                        <li class="pageNumber"><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a class="next" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">Next &rsaquo;</a>
                </li>
            @else
                <li aria-disabled="true" class="ms-2" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">Next &rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif

