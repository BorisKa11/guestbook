@if ($pages->hasPages())
    <nav aria-label="Навигация по сообщениям">
        <ul class="pagination justify-content-center pagination-md">
            {{-- Previous Page Link --}}
            @if ($pages->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $pages->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($messages->links()->elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-itemdisabled" aria-disabled="true"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">{{ $element }}</a></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $pages->currentPage())
                            <li class="page-item active" aria-current="page">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($pages->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $pages->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="page-itemdisabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">&rsaquo;</a>
                </li>
            @endif
        </ul>
    </nav>
@endif
