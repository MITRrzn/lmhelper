@if ($paginator->hasPages())
<ul class="pagination">

    @if ($paginator->onFirstPage())
    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
    @else
    <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="material-icons">chevron_left</i></a></li>
    @endif

    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
        <li class="{{ ($paginator->currentPage() == $i) ? ' active indigo darken-1' : '' }}">
            <a href="{{ $paginator->url($i) }}" class="waves-effect page-item">{{ $i }}</a>
        </li>
        @endfor


        @if ($paginator->hasMorePages())
        <li><a href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="material-icons">chevron_right</i></a></li>
        @else
        <li class="disabled"><i class="material-icons">chevron_right</i></li>
        @endif



</ul>
@endif
