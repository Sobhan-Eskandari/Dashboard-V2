{{--==========[ Table Row items ]========= --}}
<td>
    <div class="pure-checkbox mt-2 mr-2">
        <input id="users_checkbox-{{$chk_name}}" class="checkbox-{{$chk_name}}" onclick="selectCmntCheckbox(event)" name="users_checkbox-{{$chk_name}}" type="checkbox" value="{{$chk_name}}">
        <label for="users_checkbox-{{$chk_name}}"></label>
    </div>
</td>
<td class="py-1 text-right userInfoPlace">
    {{$avatar}}
    <p class="username">{{$user_username}}</p>
</td>
<td>{{$user_fullname}}</td>
<td>{{$user_email}}</td>
<td>{{$user_number}}</td>
<td><img class="img-fluid userConfirmTick" src="{{ asset('images/tick.png') }}"></td>

{{--==========[ More Button Dropdown ]========= --}}
<td>
    <div class="Topbar_dropdown dropdown table_dropDown">
        <button class="btn btn-secondary dropdown-toggle py-1 px-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-ellipsis-v black-text hi-fontSize-20" aria-hidden="true"></i>
        </button>

        {{--@if(isset($trash))--}}
            {{--==========[ Dropdown Menu ]========= --}}
            {{--<div data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" class="dropdown-menu hi-shadow-2" aria-labelledby="dropdownMenuButton">--}}
                {{--<a class="dropdown-item text-right py-0" href="#"><i class="fa fa-undo ml-2" aria-hidden="true"></i>بازگردانی</a>--}}
                {{--<a class="dropdown-item text-right py-0 mt-1" href="#"><i class="fa fa-trash ml-2" aria-hidden="true"></i>حذف</a>--}}
            {{--</div>--}}
        {{--@else--}}

            {{--==========[ Dropdown Menu ]========= --}}
            <div data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" class="dropdown-menu hi-shadow-2" aria-labelledby="dropdownMenuButton">
                {{$settings}}
                {{--<a class="dropdown-item text-right py-0" href="#"><i class="fa fa-eye ml-2" aria-hidden="true"></i>مشاهده</a>--}}
                {{--<a class="dropdown-item text-right py-0" href="#"><i class="fa fa-pencil ml-2" aria-hidden="true"></i> ویرایش</a>--}}
                {{--<div class="dropdown-divider my-1"></div>--}}
                {{--<a class="dropdown-item text-right py-0 mt-1" href="#"><i class="fa fa-trash ml-2" aria-hidden="true"></i>حذف</a>--}}
            </div>
        {{--@endif--}}
    </div>
</td>