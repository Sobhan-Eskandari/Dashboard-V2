{{--==========[ Table Row items ]========= --}}
<td>
    <div class="pure-checkbox mt-2 mr-2">
        <input id="{{ $id }}" class="checkbox-{{ $id }}" onclick="selectCmntCheckbox(event)" name="{{ $id }}" type="checkbox" >
        <label for="{{ $id }}"></label>
    </div>
</td>
<td class="text-right py-1">
    <p class="my-1">{{ $title }}</p>
    <p class="grey-text my-1 hi-fontSize-12">{{ $last_update }}</p>
</td>
<td>{{ $creator }}</td>
<td>{{ $categories }}</td>
<td>{{ $tags }}</td>
{{--==========[ Post Info ]========= --}}
<td class="py-1">
    <p class="my-1 text-right hi-fontSize-12"><i class="fa fa-calendar" aria-hidden="true"></i> {{ $created_at }}</p>
    <p class="my-1 text-right hi-fontSize-12"><i class="fa fa-comments" aria-hidden="true"></i> {{ $comments }}</p>
    <p class="my-1 text-right hi-fontSize-12"><i class="fa fa-eye" aria-hidden="true"></i> {{ $views }}</p>
</td>

{{--==========[ More Button Dropdown ]========= --}}
<td>
    <div class="Topbar_dropdown dropdown table_dropDown">
        <button class="btn btn-secondary dropdown-toggle py-1 px-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-ellipsis-v black-text hi-fontSize-20" aria-hidden="true"></i>
        </button>
        {{--==========[ Dropdown Menu ]========= --}}
        <div data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" class="dropdown-menu hi-shadow-2" aria-labelledby="dropdownMenuButton">
            {!! Form::open(['method'=>'POST', 'action'=>['PostController@restore', $id], 'class'=>'restore']) !!}
            <button class="dropdown-item text-right py-0">
                <i class="fa fa-undo ml-2" aria-hidden="true"></i>بازگردانی
            </button>
            {!! Form::close() !!}
            <div class="dropdown-divider my-1"></div>
            {!! Form::open(['method'=>'DELETE', 'action'=>['PostController@forceDestroy', $id], 'class'=>'singleDestroy']) !!}
            <button class="dropdown-item text-right py-0 mt-1">
                <i class="fa fa-trash ml-2" aria-hidden="true"></i>حذف
            </button>
            {!! Form::close() !!}
        </div>
    </div>
</td>