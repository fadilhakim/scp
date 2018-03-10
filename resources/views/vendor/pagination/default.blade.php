@if ($paginator->hasPages())
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <!-- <li class="disabled"><span>&laquo;</span></li> -->

             <div class="col-sm-3 hidden-xs">
                <a class="button size-1 style-5 disabled" href="#">
                    <span class="button-wrapper ">
                        <span class="icon"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
                        <span class="text">prev page</span>
                    </span>
                </a>
            </div>
        @else
           <!--  <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li> -->

            <div class="col-sm-3 hidden-xs text-right">
                <a class="button size-1 style-5" href="{{ $paginator->previousPageUrl() }}">
                    <span class="button-wrapper">
                        <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                        <span class="text">prev page</span>
                    </span>
                </a>
            </div>
        @endif
        <style type="text/css">
            .pagination {
                display: inline-block;
            }
        </style>
        {{-- Pagination Elements --}}
        <div class="col-sm-6 text-center">
        <div class="pagination-wrapper">
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="pagination disabled">{{ $element }}</span>
                <!-- <li class="disabled"><span>{{ $element }}</span></li> -->
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))

                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="pagination active">{{ $page }}</a>
                       <!--  <li class="active"><span>{{ $page }}</span></li> -->
                    @else
                        <a class="pagination" href="{{ $url }}">{{ $page }}</a>
                        <!-- <li><a href="{{ $url }}">{{ $page }}</a></li> -->
                    @endif
                @endforeach
            @endif
        @endforeach
        </div>
        </div>
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <!-- <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li> -->

            <div class="col-sm-3 hidden-xs text-right">
                <a class="button size-1 style-5" href="{{ $paginator->nextPageUrl() }}">
                    <span class="button-wrapper">
                        <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                        <span class="text">next page</span>
                    </span>
                </a>
            </div>
        @else
            <!-- <li class="disabled"><span>&raquo;</span></li> -->

            <div class="col-sm-3 hidden-xs text-right">
                <a class="button size-1 style-5 disabled" href="#">
                    <span class="button-wrapper">
                        <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                        <span class="text disabled">next page</span>
                    </span>
                </a>
            </div>
        @endif
   
@endif
