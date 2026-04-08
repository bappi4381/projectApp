@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}">

        <div class="flex flex-col sm:flex-row gap-4 items-center justify-between">
            <div>
                <p class="text-sm text-slate-400 leading-5">
                    {!! __('Showing') !!}
                    @if ($paginator->firstItem())
                        <span class="font-bold text-white">{{ $paginator->firstItem() }}</span>
                        {!! __('to') !!}
                        <span class="font-bold text-white">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('of') !!}
                    <span class="font-bold text-white">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

            <div>
                <span class="inline-flex shadow-sm rounded-xl overflow-hidden border border-white/5 bg-slate-800/20">

                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <span class="inline-flex items-center px-3 py-2 text-sm font-bold text-slate-600 cursor-not-allowed leading-5" aria-hidden="true">
                                <i class="ri-arrow-left-s-line text-lg"></i>
                            </span>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="inline-flex items-center px-3 py-2 text-sm font-bold text-slate-400 hover:text-white hover:bg-white/5 transition-all leading-5 focus:outline-none focus:ring-1 focus:ring-indigo-500/50" aria-label="{{ __('pagination.previous') }}">
                            <i class="ri-arrow-left-s-line text-lg"></i>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span class="inline-flex items-center px-4 py-2 border-l border-white/5 text-sm font-bold text-slate-600 cursor-default leading-5">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span class="inline-flex items-center px-4 py-2 border-l border-white/5 text-sm font-bold text-white bg-indigo-600 cursor-default leading-5">{{ $page }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="inline-flex items-center px-4 py-2 border-l border-white/5 text-sm font-bold text-slate-400 hover:text-white hover:bg-white/5 transition-all leading-5 focus:outline-none focus:ring-1 focus:ring-indigo-500/50" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="inline-flex items-center px-3 py-2 border-l border-white/5 text-sm font-bold text-slate-400 hover:text-white hover:bg-white/5 transition-all leading-5 focus:outline-none focus:ring-1 focus:ring-indigo-500/50" aria-label="{{ __('pagination.next') }}">
                            <i class="ri-arrow-right-s-line text-lg"></i>
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span class="inline-flex items-center px-3 py-2 border-l border-white/5 text-sm font-bold text-slate-600 cursor-not-allowed leading-5" aria-hidden="true">
                                <i class="ri-arrow-right-s-line text-lg"></i>
                            </span>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
