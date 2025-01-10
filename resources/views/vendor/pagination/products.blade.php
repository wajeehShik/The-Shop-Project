@if ($paginator->hasPages())
    <div class="row">
        <div class="col-12">
            <!-- Pagination -->
            <div class="pagination left">
                <ul class="pagination-list">
                    {{-- رابط الصفحة السابقة --}}
                    @if ($paginator->onFirstPage())
                        <li class="disabled">
                            <a href="javascript:void(0)">
                                <i class="lni lni-chevron-left"></i>
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="{{ $paginator->previousPageUrl() }}">
                                <i class="lni lni-chevron-left"></i>
                            </a>
                        </li>
                    @endif

                    {{-- الروابط --}}
                    @foreach ($elements as $element)
                        {{-- إذا كان العنصر نصًا (مثل ...) --}}
                        @if (is_string($element))
                            <li class="disabled"><a href="javascript:void(0)">{{ $element }}</a></li>
                        @endif

                        {{-- إذا كان العنصر عبارة عن صفحات --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="active"><a href="javascript:void(0)">{{ $page }}</a></li>
                                @else
                                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- رابط الصفحة التالية --}}
                    @if ($paginator->hasMorePages())
                        <li>
                            <a href="{{ $paginator->nextPageUrl() }}">
                                <i class="lni lni-chevron-right"></i>
                            </a>
                        </li>
                    @else
                        <li class="disabled">
                            <a href="javascript:void(0)">
                                <i class="lni lni-chevron-right"></i>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
            <!--/ End Pagination -->
        </div>
    </div>
@endif