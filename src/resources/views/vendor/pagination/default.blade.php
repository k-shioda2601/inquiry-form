@if ($paginator->hasPages())
<nav class="pagination">
    @if ($paginator->onFirstPage())
        <span class="pagination__arrow pagination__arrow--disabled">&lt;</span>
    @else
        <a class="pagination__arrow" href="{{ $paginator->previousPageUrl() }}">&lt;</a>
    @endif

    @foreach ($elements as $element)
        @if (is_string($element))
            <span class="pagination__dots">{{ $element }}</span>
        @endif

        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span class="pagination__link pagination__link--active">{{ $page }}</span>
                @else
                    <a class="pagination__link" href="{{ $url }}">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach

    @if ($paginator->hasMorePages())
        <a class="pagination__arrow" href="{{ $paginator->nextPageUrl() }}">&gt;</a>
    @else
        <span class="pagination__arrow pagination__arrow--disabled">&gt;</span>
    @endif
</nav>
@endif
