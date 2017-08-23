@if ($paginator->hasPages())
    <div class="row ml-4">
        <nav class="mt-4 dashboardPaginatinBs">
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item">
                        <a class="page-link px-4">قبلی</a>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link px-4" href="{{ $paginator->previousPageUrl() }}" rel="prev">قبلی</a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="page-link disabled"><span>{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active">
                                    <a class="page-link" href="#" id="{{$page}}">
                                        {{ $page }}<span class="sr-only">(current)</span>
                                    </a>
                                    {{--<span>{{ $page }}</span>--}}
                                </li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                {{--<li><a href="{{ $url }}">{{ $page }}</a></li>--}}
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item pull-right"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">بعدی</a></li>
                    {{--<li><a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>--}}
                @else
                    <li class="page-item pull-right">
                        <a class="page-link px-4">بعدی</a>
                    </li>
                    {{--<li class="disabled"><span>&raquo;</span></li>--}}
                @endif
            </ul>
        </nav>
    </div>
@endif