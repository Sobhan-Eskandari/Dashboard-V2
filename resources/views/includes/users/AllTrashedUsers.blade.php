
{{--==========[ Row of buttons abpve table ]========= --}}
<div class="row">
    <div class="col-1 push-11 ml-2 text-right">
        <button class="hi-button-simple hi-shadow-0 yellow darken-3" id="userForceMultiDestroy">زباله</button>
    </div>
</div>

{{--==========[ Table Of Users ]========= --}}
<div class="row mt-3">
    <div class="col-12 px-0">
        <table class="users_trashTable">
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
                                <img class="rounded-circle Topbar_avatar" src="{{isset($user->photo) ? asset('UserImage/'.$user->photo->address) : asset('images/avatar.png') }}">
                            @endslot
                        @slot('user_username')
                            {{$user->name}}
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

                        @slot('trash')
                            yes
                        @endslot
                        @slot('settings')
                                {!! Form::open(['method'=>'POST','action'=>['API\UserController@restore',$user->id]]) !!}
                                <button class="dropdown-item text-right py-0 mt-1" id="restore" data-id="{{$user->id}}"><i class="fa fa-trash ml-2" aria-hidden="true"></i>بازگردانی</button>
                                {!! Form::close() !!}
                                {!! Form::open(['method'=>'DELETE','action'=>['API\UserController@forceDelete',$user->id]]) !!}
                                <button class="dropdown-item text-right py-0 mt-1" id="forceDestroyUser" data-id="{{$user->id}}"><i class="fa fa-trash ml-2" aria-hidden="true"></i>حذف</button>
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
<script src="{{asset('/js/dashboard/allTrashedUsers.js')}}"></script>

