{{--==========[ Table Row items ]========= --}}
<td>
    <div class="pure-checkbox mt-2 mr-2">
        <input id="cmnt_checkbox-{{$chk_name}}" class="checkbox-{{$chk_name}}" onclick="selectCmntCheckbox(event)" name="cmnt_checkbox-{{$chk_name}}" type="checkbox" value="{{$chk_name}}">
        <label for="cmnt_checkbox-{{$chk_name}}"></label>
    </div>
</td>
<td class="text-right"><b>{{$comment_author}}</b></td>
<td class="text-right py-2">{{$comment_text}}</td>
<td>{{$comment_content}}</td>
<td class="py-1">
    <p class="my-1">{{$comment_time}}</p>
    <p class="my-1">{{$comment_date}}</p>
</td>
<td>
    {{$status}}
</td>
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
                {{--{{Form::open(['method'=>'POST','action'=>['CommentController@approve',$chk_name]])}}--}}
                {{--<button class="dropdown-item text-right py-0" href="#"><i class="fa fa-check ml-2" aria-hidden="true"></i>تایید</button>--}}
                {{--{{Form::close()}}--}}
                {{--<a class="dropdown-item text-right py-0" href="{{route('comments.edit',$chk_name)}}"><i class="fa fa-shower ml-2" aria-hidden="true"></i> ویرایش</a>--}}
                {{--<a class="dropdown-item text-right py-0" href="{{route('comments.show',$chk_name)}}"><i class="fa fa-reply ml-2" aria-hidden="true"></i> پاسخ</a>--}}
                {{--<div class="dropdown-divider my-1"></div>--}}
                {{--{{Form::open(['method'=>'DELETE','action'=>['CommentController@destroy',$chk_name]])}}--}}
                {{--<button class="dropdown-item text-right py-0 mt-1" id="destroyComment" data-id="{{$chk_name}}"><i class="fa fa-trash ml-2" aria-hidden="true"></i>حذف</button>--}}
                {{--{{Form::close()}}--}}
            </div>
        {{--@endif--}}
    </div>
</td>