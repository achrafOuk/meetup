<div class="row justify-content-center">
<div class="col-sm-12 col-md-7">
    <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
    <ul class="pagination"><li class="paginate_button page-item previous disabled" id="dataTable_previous">
    @if($events->currentPage() == 1 )
     <li  class="paginate_button page-item disabled">
    <a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">
        Previous
    </a>
     </li>
     @else
    <li  class="paginate_button page-item">
        <a href="{{ $events->url($events->currentPage()-1) }}" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">
            Previous
        </a>
    </li>
     @endif
     @for($i=0;$i<$events->lastPage();$i++)
        @if($i+1==$events->currentPage())
            <li class="paginate_button page-item active">
                <a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">
                    {{$i+1}}</a>
                </li>
        @else
        <li class="paginate_button page-item ">
            <a href="{{ $events->url($i+1) }}" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">
            {{$i+1}}</a>
        </li>
        @endif
    @endfor
    @if($events->currentPage() == $events->lastPage()  )
        <li class="paginate_button page-item next disabled" id="dataTable_next">
            <a href="{{ $events->url($events->currentPage()+1) }}" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">
                Next
            </a>
        </li>
    @else
        <li class="paginate_button page-item next" id="dataTable_next">
            <a href="{{ $events->url($events->currentPage()+1) }}" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">
                Next
            </a>
        </li>
    @endif

        </div>
    </div>
</div>
</div>
</div>