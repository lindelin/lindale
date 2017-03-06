@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled"><span class="page-link">{{ trans('pagination.previous') }}</span></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">{{ trans('pagination.previous') }}</a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">{{ trans('pagination.next') }}</a></li>
        @else
            <li class="page-item disabled"><span class="page-link">{{ trans('pagination.next') }}</span></li>
        @endif
    </ul>
@endif
