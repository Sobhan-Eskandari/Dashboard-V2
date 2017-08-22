{{--==========[ Gallery Table Row items ]========= --}}
<td>
    <div class="pure-checkbox mt-2 mr-2">
        <input id="sliders_checkbox-{{$chk_name}}" class="checkbox-{{$chk_name}}" value="{{$id}}" onclick="selectCmntCheckbox(event)" name="sliders[]" type="checkbox" >
        <label for="sliders_checkbox-{{$chk_name}}"></label>
    </div>
</td>
<td class="py-1 text-center">
    <div class="userInfoPlace">
        <img class="rounded img-fluid hi-size-7" src="{{ asset('images/' . $avatar) }}">
        <div>
            <p class="username mt-3"> {{$slider_text}} </p>
            <p class="grey-text hi-fontSize-12 text-right pr-2">{{$slider_edited}}</p>
        </div>
    </div>
</td>

{{--==========[ Order of Slider Button ]========= --}}
<td class="px-1">
    <select class="slidersDropDown">
        <option value="1">۱</option>
        <option value="2">۲</option>
        <option value="3">۳</option>
        <option value="4">۴</option>
    </select>
</td>

{{--==========[ More Button ]========= --}}
<td class="px-1">
    <div class="Topbar_dropdown dropdown table_dropDown">
        <button class="btn btn-secondary dropdown-toggle py-1 px-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-ellipsis-v black-text hi-fontSize-20" aria-hidden="true"></i>
        </button>
        {{--==========[ Dropdown Menu ]========= --}}
        <div data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" class="dropdown-menu hi-shadow-2" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item text-right py-0" href="/sliders/{{$id}}/edit"><i class="fa fa-pencil ml-2" aria-hidden="true"></i>ویرایش</a>
            <div class="dropdown-divider my-1"></div>
            <form action="/sliders/{{$id}}" method="post">
                {{csrf_field()}}
                {{method_field("DELETE")}}
                <button type="submit" class="dropdown-item text-right py-0 mt-1" href="#"><i class="fa fa-trash ml-2" aria-hidden="true"></i>حذف</button>
            </form>
        </div>
    </div>
</td>