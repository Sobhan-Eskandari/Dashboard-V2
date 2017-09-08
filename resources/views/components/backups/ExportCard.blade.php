<div class="card backupExportCard">
    <h6 class="card-header backupMainTitleCard" style="{{ $color }}">
        {{ $title }}
    </h6>
    <div class="card-block">
        <form method="GET" action="{{ $address }}">
            {{ csrf_field() }}
{{--        {!! Form::open(['method'=>'GET', 'action'=> $address]) !!}--}}
            <div class="row px-3">
                <h6 class="card-title backupExportCard_title">نوع فایل خروجی خود را انتخاب کنید:</h6>
            </div>
            <br>
            <div class="row justify-content-center">
                <div class="col-5">
                {{--<select name="type" class="mx-auto">--}}
                    {{--<option value="pdf">PDF</option>--}}
                    {{--<option value="xlsx">Excel</option>--}}
                {{--</select>--}}
                    <div class="hi-profileCard_PictureSelectorBox_selector  ExportCard_SelectorBox_selector mr-1">
                        <select name="type" class="dropdown" data-settings='{"wrapperClass":"metro"}'>
                            <option value="pdf" selected>PDF</option>
                            <option value="xlsx">Excel</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row px-3">
                <h6 class="card-title backupExportCard_title">بازه زمانی خود مد نظر خود را وارد کنید:</h6>
            </div>
            <br>
            <div class="row pl-3 pr-3 btn-group-justified backupGroupButton">
                <h6 class="card-title pt-2 backupExportCard_title">از:&nbsp;</h6>
                <input name="from" type="text" class="backup_dateSelector backupSelect text-center" />
                <h6 class="card-title pt-2 backupExportCard_title">&nbsp;&nbsp;تا:&nbsp;</h6>
                <input name="till" type="text" class="backup_dateSelector backupSelect text-center" />
            </div>
            <br>
            <div class="row px-3">
                <button type="submit" class="btn btn-primary pull-left backupExportButton" style="{{ $color }}">
                    <i class="fa fa-download" aria-hidden="true"></i>&nbsp;دریافت خروجی
                </button>
            </div>
        </form>
    </div>
    <br>
</div>