@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between items-center">
        {{-- Tombol Previous --}}
        @if ($paginator->onFirstPage())
            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-300 bg-white border border-gray-300 cursor-default rounded-md leading-5">
                {!! __('pagination.previous') !!}
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150" aria-label="{{ __('pagination.previous') }}">
                {!! __('pagination.previous') !!}
            </a>
        @endif

        {{-- Tombol Next --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150" aria-label="{{ __('pagination.next') }}">
                {!! __('pagination.next') !!}
            </a>
        @else
            <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-300 bg-white border border-gray-300 cursor-default rounded-md leading-5">
                {!! __('pagination.next') !!}
            </span>
        @endif
    </nav>
@endif
