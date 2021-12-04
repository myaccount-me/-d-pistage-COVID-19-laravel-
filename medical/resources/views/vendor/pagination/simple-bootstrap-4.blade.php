@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="" style="margin-left:200px;padding:2.5px 8px;font-size:12px;border:2px solid;border-radius:40px;background-color:#E5E4E5;color:#ffffff;border:2px solid #E5E4E5"><i class="fa fa-arrow-left"></i></span>
                </li>
            @else
                <li class="page-item">
                    <a class="" href="{{ $paginator->previousPageUrl() }}" rel="prev" style="margin-left:200px;padding:2.5px 8px;font-size:12px;border:2px solid #00DFC6;border-radius:40px;background-color:#00DFC6;color:#ffffff;"><i class="fa fa-arrow-left"></i></a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="" href="{{ $paginator->nextPageUrl() }}" rel="next" style="margin-left:10px;padding:2.5px 8px;font-size:12px;border:2px solid #00DFC6;border-radius:40px;background-color:#00DFC6;color:#ffffff;"><i class="fa fa-arrow-right"></i></a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <span class="" style="margin-left:10px;padding:2.5px 8px;font-size:12px;border:2px solid;border-radius:40px;background-color:#E5E4E5;color:#ffffff;border:2px solid #E5E4E5"><i class="fa fa-arrow-right"></i></span>
                </li>
            @endif
        </ul>
    </nav>
@endif
