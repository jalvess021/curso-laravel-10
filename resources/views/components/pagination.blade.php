@if (isset($paginator))
@php
   $queryParams = (isset($appends) && gettype($appends) === 'array' ? '&' . http_build_query($appends) : '');
@endphp
{{-- converte o array em valor do parametro http ex: 'filtro'=> '2' :: &filtro=2 --}}
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
        {{-- Previous Page Link --}}
        @if ($paginator->isFirstPage())
            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 border border-gray-300 cursor-default leading-5 rounded-md dark:bg-gray-900">
                {!! __('pagination.previous') !!}
            </span>
            {{-- dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 text-gray-500 hover:text-white font-bold --}}
        @else
            <a href="?page={{ $paginator->previousPage() }} {{$queryParams}}" rel="prev" class="relative inline-flex items-center px-4 py-2 text-sm font-medium dark:bg-gray-900 dark:text-gray-100 dark:border-gray-600 text-gray-500 hover:text-white text-gray-700 border border-gray-300 leading-5 rounded-md focus:outline-none focus:ring ring-gray-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                {!! __('pagination.previous') !!}
            </a>
        @endif

        {{-- Next Page Link --}}
         @if (!$paginator->isLastPage())
            <a href="?page={{ $paginator->nextPage() }} {{$queryParams}}" rel="next" class="relative inline-flex items-center px-4 py-2 text-sm font-medium dark:bg-gray-900 dark:text-gray-100 dark:border-gray-600 text-gray-500 hover:text-white text-gray-700 border border-gray-300 leading-5 rounded-md focus:outline-none focus:ring ring-gray-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                {!! __('pagination.next') !!}
            </a>
        @else
            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 border border-gray-300 cursor-default leading-5 rounded-md dark:bg-gray-900">
                {!! __('pagination.next') !!}
            </span>
        @endif 
    </nav>
@endif
