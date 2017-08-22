{{--==========[ Table Row items ]========= --}}
<td>
    <div class="pure-checkbox mt-2 mr-2">
        <input id="{{ $id }}" class="checkbox-{{ $id }}" onclick="selectCmntCheckbox(event)" name="{{ $id }}" type="checkbox" >
        <label for="{{ $id }}"></label>
    </div>
</td>
<td class="py-1 text-right userInfoPlace">
    @if(isset($photo))
        <img class="rounded-circle Topbar_avatar" src="{{ asset('gallery/' . '/' . $photo) }}">
    @else
        <img class="rounded-circle Topbar_avatar" src="{{ asset('images/nobody_m.original.jpg') }}">
    @endif
    <p class="username">{{ $user_name }}</p>
</td>
<td>{{ $full_name }}</td>
<td>{{ $email }}</td>
<td>{{ $mobile }}</td>
<td>{{ $role }}</td>

{{--==========[ More Button Dropdown ]========= --}}
<td>
    <div class="Topbar_dropdown dropdown table_dropDown">
        <button class="btn btn-secondary dropdown-toggle py-1 px-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-ellipsis-v black-text hi-fontSize-20" aria-hidden="true"></i>
        </button>
        {{--==========[ Dropdown Menu ]========= --}}
        <div data-dropdown-in="bounceIn" data-dropdown-out="bounceOut" class="dropdown-menu hi-shadow-2" aria-labelledby="dropdownMenuButton">
            {!! Form::open(['method'=>'POST', 'action'=>['AdminController@restore', $id], 'class'=>'restore']) !!}
            <button class="dropdown-item text-right py-0">
                <i class="fa fa-undo ml-2" aria-hidden="true"></i>بازگردانی
            </button>
            {!! Form::close() !!}
            <div class="dropdown-divider my-1"></div>
            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminController@forceDestroy', $id], 'class'=>'singleDestroy']) !!}
                <button class="dropdown-item text-right py-0 mt-1">
                    <i class="fa fa-trash ml-2" aria-hidden="true"></i>حذف
                </button>
            {!! Form::close() !!}
            {{--<a class="dropdown-item text-right py-0 mt-1" href="#">حذف</a>--}}
        </div>
    </div>
</td>