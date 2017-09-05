
{{--==========[ Row of buttons abpve table ]========= --}}
<div class="row">
    <div class="col-1 pl-0">
        <a href="{{route('user.trash')}}">
        <button class="hi-button-btn1 orange darken-2 hi-shadow-1 hi-size-4">
            <i class="fa fa-trash white-text hi-fontSize-20" aria-hidden="true"></i>
        </button>
        </a>
    </div>

    <div class="col-auto offset-8 text-right mr-2">
        <button class="hi-button-simple hi-shadow-0 red darken-3 text-right" id="userMultiDestroy">حذف</button>
    </div>

    {{--<div class="col-auto text-right">--}}
        {{--<button class="hi-button-simple hi-shadow-0 blue darken-1">ویرایش</button>--}}
    {{--</div>--}}

    <div class="col-auto ml-2 text-right">
        <a href="{{route('users.create')}}">
             <button class="hi-button-simple hi-shadow-0 green darken-3">ایجاد</button>
        </a>
    </div>
</div>

{{--==========[ Table Of Users ]========= --}}
<div class="row mt-3">
    <div class="col-12 px-0">
        <table class="users_table">
            <thead class="table_tableHeader white-text">

            {{--==========[ Table Headers ]========= --}}
            <tr>
                <th class="pl-0">
                    <div class="pure-checkbox mt-2">
                        <input id="selectAllUsers" class="selectAllCheckboxes" name="checkbox" type="checkbox" onclick="selectAllCmnt()">
                        <label for="selectAllUsers"></label>
                    </div>
                </th>
                <th class="text-right">علامت زدن همه</th>
                <th>نام</th>
                <th>پست الکترونیکی</th>
                <th>تلفن همراه</th>
                <th>وضعیت</th>
                <th></th>
            </tr>

            </thead>
            <tbody>
            @if($users)
            @foreach($users as $user)
                {{--==========[ Table Row ]========= --}}
                <tr>
                    {{--==========[ Table Row items ]========= --}}
                    <td>
                        <div class="pure-checkbox mt-2 mr-2">
                            <input id="users_checkbox-{{$user->id}}" class="checkbox-{{$user->id}}" onclick="selectCmntCheckbox(event)" name="users_checkbox-{{$user->id}}" type="checkbox" value="{{$user->id}}">
                            <label for="users_checkbox-{{$user->id}}"></label>
                        </div>
                    </td>
                    <td class="py-1 text-right userInfoPlace">
                        <img class="rounded-circle Topbar_avatar" src="{{isset($user->photo[0]) ? asset('gallery/'.$user->photo[0]->name) : asset('images/nobody_m.original.jpg') }}">
                        <p class="username">{{$user->username}}</p>
                    </td>
                    <td>{{$user->getFullNameAttribute()}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{is_null($user->mobile) ? 'شماره همراه وارد نشده':$user->mobile}}</td>
                    <td><img class="img-fluid userConfirmTick" src="{{ asset('images/tick.png') }}"></td>

                    {{--==========[ More Button Dropdown ]========= --}}
                    <td>
                        <div class="Topbar_dropdown dropdown table_dropDown">
                            <button class="btn btn-secondary dropdown-toggle py-1 px-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v black-text hi-fontSize-20" aria-hidden="true"></i>
                            </button>

                            {{--==========[ Dropdown Menu ]========= --}}
                            <div data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" class="dropdown-menu hi-shadow-2" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item text-right py-0" href="{{route('users.show',$user->id)}}"><i class="fa fa-eye ml-2" aria-hidden="true"></i>مشاهده</a>
                                <a class="dropdown-item text-right py-0" href="{{route('users.edit',$user->id)}}"><i class="fa fa-pencil ml-2" aria-hidden="true"></i> ویرایش</a>
                                <div class="dropdown-divider my-1"></div>
                                {!! Form::open(['method'=>'DELETE','action'=>['UserController@destroy',$user->id]]) !!}
                                <button class="dropdown-item text-right py-0 mt-1" id="destroyUser" data-id="{{$user->id}}"><i class="fa fa-trash ml-2" aria-hidden="true"></i>حذف</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>

{{--============[ Pagination of Page ]===========--}}
{{$users->links()}}
<script>

    var checkboxes;
    $('input[type=checkbox]').change(function () {
        var val = [];
        $(':checkbox:checked').each(function(i){
            val[i] = $(this).val();
        });
        checkboxes = val;
    });

    $('#userMultiDestroy').click(function (e) {
        e.preventDefault();
        var query = $('#searchUser').val();
        var CSRF_TOKEN =$("input[name*='_token']").val();
        $.ajax({
            type: 'POST',
            url: 'users/MultiDelete',
            data: {_token: CSRF_TOKEN,query:query,checkboxes:checkboxes}
        }).done(function (data) {
            $("#user").html(data);
//            console.log(query);
            if(query === "") {
                window.history.pushState("", "", "http://dash2.dev/users");
            }else {
                window.history.pushState(data, "Title", " /users?query=" + query);
            }
        }).fail(function () {
        });
//            console.log(checkboxes);
    });
</script>