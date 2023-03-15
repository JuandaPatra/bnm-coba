        <div class="pagination-container" >
            <div class="border-top border-bottom">
                <nav aria-label="...">
                    <ul class="pagination">
                        {{-- Previous Page Link --}}
                            @if ($paginator->onFirstPage())
                                <li class="page-item disabled pe-0 " aria-disabled="true" aria-label="@lang('pagination.previous')">
                                    <a  aria-hidden="true" class="prev">Prev</a>
                                </li>
                            @else
                                <li class="pe-0 ">
                                    <a  href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" class="prev">Prev</a>
                                </li>
                            @endif
                            <li class="line-container">
                                <div class="v1-footer"></div>
                            </li>
                         {{-- Next Page Link --}}
                            @if ($paginator->hasMorePages())
                                <li class="page-item ps-0 next-container">
                                    <a  href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" class=next>Next</a>
                                </li>
                            @else
                                <li class="disabled ps-0 next-container" aria-disabled="true" aria-label="@lang('pagination.next')">
                                    <a  aria-hidden="true" class="next">Next</a>
                                </li>
                            @endif
                        {{-- Pagination Elements --}}
                            @foreach ($elements as $element)
                                {{-- "Three Dots" Separator --}}
                                @if (is_string($element))
                                    <li  aria-disabled="true"><a >{{ $element }}</a></li>
                                @endif
                
                                {{-- Array Of Links --}}
                                @if (is_array($element))
                                    @foreach ($element as $page => $url)
                                        @if ($page == $paginator->currentPage())
                                            <li class="active" aria-current="page"><a >{{ $page }}</a></li>
                                        @else
                                            <li ><a  href="{{ $url }}">{{ $page }}</a></li>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                    </ul>
                </nav>
            </div>
        </div>
         <nav>
    </nav>