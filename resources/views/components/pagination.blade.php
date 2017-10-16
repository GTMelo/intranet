@if ($paginator->hasPages())
    <div class="level">
        <div class="level-left">
            <div class="level-item">
                <nav class="pagination is-centered">
                    @if (!$paginator->onFirstPage())
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="pagination-previous">
                            <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                        </a>
                    @endif

                    @if ($paginator->hasMorePages())
                        <a class="pagination-next" href="{{ $paginator->nextPageUrl() }}" rel="next">
                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                        </a>
                    @endif

                    <ul class="pagination-list">
                        {{-- Pagination Elements --}}
                        @foreach ($elements as $element)
                            {{-- "Three Dots" Separator --}}
                            @if (is_string($element))
                                <li><span class="pagination-ellipsis"><span>{{ $element }}</span></span></li>
                            @endif

                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $paginator->currentPage())
                                        <li><a class="pagination-link is-current">{{ $page }}</a></li>
                                    @else
                                        <li><a href="{{ $url }}" class="pagination-link">{{ $page }}</a></li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </ul>
                </nav>
            </div>
            <div class="level-item">
                TODO: Pesquisa
            </div>
        </div>
    </div>

@endif
