
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

                    {{--==========[ Table Row items ]========= --}}
                    <td>
                        <div class="pure-checkbox mt-2 mr-2">
                            <input id="users_checkbox-{{$user->id}}" class="checkbox-{{$user->id}}" onclick="selectCmntCheckbox(event)" name="users_checkbox-{{$user->id}}" type="checkbox" value="{{$user->id}}">
                            <label for="users_checkbox-{{$user->id}}"></label>
                        </div>
                    </td>
                    <td class="py-1 text-right userInfoPlace">
                        <img class="rounded-circle Topbar_avatar" src="{{isset($user->photo[0]) ? asset('UserImage/'.$user->photo[0]->name) : asset('images/avatar.png') }}">
                        <p class="username"> {{$user->user_name}}</p>
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
                                {!! Form::open(['method'=>'POST','action'=>['UserController@restore',$user->id]]) !!}
                                <button class="dropdown-item text-right py-0 mt-1" id="restore" data-id="{{$user->id}}"><i class="fa fa-trash ml-2" aria-hidden="true"></i>بازگردانی</button>
                                {!! Form::close() !!}
                                {!! Form::open(['method'=>'DELETE','action'=>['UserController@forceDelete',$user->id]]) !!}
                                <button class="dropdown-item text-right py-0 mt-1" id="forceDestroyUser" data-id="{{$user->id}}"><i class="fa fa-trash ml-2" aria-hidden="true"></i>حذف</button>
                                {!! Form::close() !!}
                                </div>

                        </div>
                    </td>

            @endforeach
        @endif
                </tr>
            </tbody>
        </table>
    </div>
</div>

{{--============[ Pagination of Page ]===========--}}
{{$users->links()}}
<script src="{{asset('/js/dashboard/allTrashedUsers.js')}}"></script>

