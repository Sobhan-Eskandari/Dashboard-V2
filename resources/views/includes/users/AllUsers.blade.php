
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
        <a href="{{route('user.create')}}">
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
                <th>
                </th>
            </tr>

            </thead>
            <tbody>
            @if($users)
            @foreach($users as $user)
                {{--==========[ Table Row ]========= --}}
                <tr>
                    @component('components.UsersTableRow')

                        @slot('chk_name')
                            {{ $user->id }}
                        @endslot
                        @slot('avatar')
                                <img class="rounded-circle Topbar_avatar" src="{{isset($user->photo) ? asset('photos/'.$user->photo->name) : asset('images/avatar.png') }}">
                            @endslot
                        @slot('user_username')
                            {{$user->username}}
                        @endslot

                        @slot('user_fullname')
                          {{$user->getFullNameAttribute()}}
                        @endslot

                        @slot('user_email')
                            {{$user->email}}
                        @endslot

                        @slot('user_number')
                           {{is_null($user->mobile) ? 'شماره همراه وارد نشده':$user->mobile}}
                        @endslot

                        @slot('trash')@endslot
                        @slot('settings')
                                <a class="dropdown-item text-right py-0" href="{{route('user.show',$user->id)}}"><i class="fa fa-eye ml-2" aria-hidden="true"></i>مشاهده</a>
                                <a class="dropdown-item text-right py-0" href="{{route('user.edit',$user->id)}}"><i class="fa fa-pencil ml-2" aria-hidden="true"></i> ویرایش</a>
                                <div class="dropdown-divider my-1"></div>
                            {!! Form::open(['method'=>'DELETE','action'=>['API\UserController@destroy',$user->id]]) !!}
                                <button class="dropdown-item text-right py-0 mt-1" id="destroyUser" data-id="{{$user->id}}"><i class="fa fa-trash ml-2" aria-hidden="true"></i>حذف</button>
                            {!! Form::close() !!}
                            @endslot

                    @endcomponent
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
    $( "button[id='destroyUser']" ).click(function (e) {
        e.preventDefault();
        var query = $('#searchUser').val();
        var commentId = $(this).attr('data-id');
        var CSRF_TOKEN =$("input[name*='_token']").val();
//        console.log(commentId);
        $.ajax({
            type: 'DELETE',
            url: '/users/delete/'+commentId,
            data: {_token: CSRF_TOKEN,query:query}
        }).done(function (data) {
            $("#user").html(data);
            if(query === "") {
                window.history.pushState("", "", "http://dash.dev/users");
            }else {
                window.history.pushState(data, "Title", " /users?query=" + query);
            }
        }).fail(function () {
        });
    });

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
                window.history.pushState("", "", "http://dash.dev/users");
            }else {
                window.history.pushState(data, "Title", " /users?query=" + query);
            }
        }).fail(function () {
        });
//            console.log(checkboxes);
    });
    </script>
{{--<div class="row mt-4">--}}
    {{--<div class="col-auto">--}}
        {{--<nav aria-label="Page navigation example">--}}
            {{--<ul class="pagination">--}}
                {{--<li class="page-item"><a class="page-link nextBtn" href="#">بعدی</a></li>--}}
                {{--<li class="page-item"><a class="page-link" href="#">۱</a></li>--}}
                {{--<li class="page-item"><a class="page-link" href="#">۲</a></li>--}}
                {{--<li class="page-item"><a class="page-link" href="#">۳</a></li>--}}
                {{--<li class="page-item"><a class="page-link prevBtn" href="#">قبلی</a></li>--}}
            {{--</ul>--}}
        {{--</nav>--}}
    {{--</div>--}}
{{--</div>--}}
