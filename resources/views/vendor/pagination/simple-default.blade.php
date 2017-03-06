@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><span>{{ trans('pagination.previous') }}</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">{{ trans('pagination.previous') }}</a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">{{ trans('pagination.next') }}</a></li>
        @else
            <li class="disabled"><span>{{ trans('pagination.next') }}</span></li>
        @endif
    </ul>
@endif
