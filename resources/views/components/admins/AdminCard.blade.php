<div class="adminCard hi-shadow-1 py-3">
    {{--============[ Row of Dissmis Btn ]===========--}}
    <div class="row">
        <div class="col-12 mb-2 pr-4">
            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminController@destroy', $id], 'class'=>'singleDestroy']) !!}
                <button class="hi-button-btn1 pull-right">
                    <i class="fa fa-times hi-fontSize-21" aria-hidden="true"></i>
                </button>
            {!! Form::close() !!}
        </div>
    </div>
    {{--============[ Row of Admin info ]===========--}}
    <div class="row">
        <div class="col-12 text-center">
            @if(isset($profile_pic))
                <img class="rounded-circle hi-size-9 mb-3" src="{{ asset('gallery/' . '/' . $profile_pic) }}">
            @else
                <img class="rounded-circle hi-size-9 mb-3" src="{{ asset('images/nobody_m.original.jpg') }}">
            @endif
            <h3 class="hi-fontSize-16"><b>{{ $full_name }}</b></h3>
            <p  class="hi-fontSize-12 grey-text mb-2">{{ $email }}</p>
            <p class="hi-fontSize-10 grey-text">{{ $description }}</p>
        </div>
    </div>

    {{--============[ Row of Edit and dropdwon of roles ]===========--}}
    <div class="row">
        <div class="col-5 text-center">
            <a href="{{ route('admins.edit', $id) }}"><button class="btn btn-secondary adminCard_btn hvr-sweep-to-top ml-2">ویرایش</button></a>
        </div>
        <div class="col-7 text-center">
            {{--============[ Admin Roles Dropdown ]===========--}}
            <div class="dropdown">
                {{--<select name="role" id="">--}}
                    {{--@foreach($roles as $role)--}}
                        {{--<option value="{{ $role->id }}">{{ $role->role }}</option>--}}
                    {{--@endforeach--}}

                    {{--<option value="1" {{ $role_id == '1' ? 'selected' : ''}}>مدیر کل سایت</option>--}}
                    {{--<option value="2" {{ $role_id == '2' ? 'selected' : ''}}>مدیر تغییرات</option>--}}
                    {{--<option value="3" {{ $role_id == '3' ? 'selected' : ''}}>مدیر ساخت</option>--}}
                    {{--<option value="4" {{ $role_id == '4' ? 'selected' : ''}}>مدیر گزارش گیری</option>--}}
                    {{--<option value="5" {{ $role_id == '5' ? 'selected' : ''}}>مدیر پاک سازی</option>--}}
                {{--</select>--}}
                {{--<button class="btn btn-secondary adminCard_btn hvr-sweep-to-top" aria-haspopup="true" aria-expanded="false"> {{ $role }} </button>--}}

                {{--<div data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" class="dropdown-menu adminCard_dropdown hi-shadow-1" aria-labelledby="dropdownMenuLink">--}}
                    {{--<a class="dropdown-item" href="#"> مدیر کل <i class="fa fa-user-circle-o ml-1" aria-hidden="true"></i></a>--}}
                    {{--<a class="dropdown-item" href="#"> مدیر بخش <i class="fa fa-user-circle-o ml-1" aria-hidden="true"></i></a>--}}
                    {{--<a class="dropdown-item" href="#"> مدیر بخش تغییرات<i class="fa fa-user-circle-o ml-1" aria-hidden="true"></i></a>--}}
                {{--</div>--}}
            </div>
        </div>
    </div>

</div>