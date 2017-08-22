<div class="col-10 list-group hi-categoryListGroup">

     {{-----------[ Row Of Search and Menu Opener ] ------------}}
    <div class="row menuDetector">
        <div class="col-12">
            <div class="list-group-item justify-content-between pl-4 pr-3 hi-infoPostListGroupFlip py-2">
                <span class="categoryTitle">{{ $title }}</span>
                <div class="row">
                    {{-----------[ Search Icon ] ------------}}
                    <div class="col-1">
                        <i class="fa fa-search iconSearch-2 pt-3" aria-hidden="true"></i>
                    </div>
                    {{-----------[ Search Input ] ------------}}
                    <div class="col-9">
                        {{ $search_form }}
                    </div>
                    {{-----------[ Close Menu ] ------------}}
                    <div class="col-1 pr-0">
                        <i class="fa fa-times iconClose-2 pt-3 mr-3" aria-hidden="true"></i>
                    </div>
                </div>
                <i class="fa fa-search iconSearch-1" aria-hidden="true"></i>

                {{-----------[ Menu Opener ] ------------}}
                <i class="fa fa-caret-down pull-left pt-1 caretIcon flip is-open"  aria-hidden="true"></i>
            </div>
        </div>
    </div>

    {{-----------[ Row Of Items in List could be tags or ... ] ------------}}
    <div class="row">
        <div class="col-12">
            <div id="hi-CategoryListGroupPanel" class="panel">
                <ul class="pr-0 overflowBox">
                    {{-----------[ Earch List Row (li) ] ------------}}
                    {{ $list }}
                </ul>
                <hr class="mb-1">
                {{-----------[ Add tag or category to list ] ------------}}
                <div class="row">
                    <div class="col-12">
                        {{ $create_form }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
