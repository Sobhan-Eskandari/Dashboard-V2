{{--==========[ Gallery Table Row items ]========= --}}
<td>
    <div class="pure-checkbox mt-2 mr-2">
        <input id="media_checkbox-{{$chk_name}}" class="checkbox-{{$chk_name}}" onclick="selectCmntCheckbox(event)" name="media_checkbox-{{$chk_name}}" type="checkbox" >
        <label for="media_checkbox-{{$chk_name}}"></label>
    </div>
</td>
<td class="py-1 text-center userInfoPlace">
    <img class="rounded img-fluid hi-size-5" src="{{ asset('images/avatar.png') }}">
    <p class="username">{{$file_name}}</p>
</td>
<td>{{$file_uploader}}</td>
<td>{{$file_content}}</td>
<td>{{$file_date}}</td>


<td class="px-1">
    @if(isset($trash))
        <div class="Topbar_dropdown dropdown table_dropDown">
            <button class="btn btn-secondary dropdown-toggle py-1 px-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-ellipsis-v black-text hi-fontSize-20" aria-hidden="true"></i>
            </button>
            {{--==========[ Dropdown Menu ]========= --}}
            <div data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" class="dropdown-menu hi-shadow-2" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item text-right py-0" href="#"><i class="fa fa-undo ml-2" aria-hidden="true"></i>بازگردانی</a>
                <a class="dropdown-item text-right py-0 mt-1" href="#"><i class="fa fa-trash ml-2" aria-hidden="true"></i>حذف</a>
            </div>
        </div>
    @else
        {{--==========[ Delete Button ]========= --}}
        <button class="btn btn-secondary hi-shadow-0  py-1 px-1 deleteRowBtn" type="button" id="dropdownMenuButton">
            <i class="fa fa-trash black-text hi-fontSize-20" aria-hidden="true"></i>
        </button>
    @endif
</td>
