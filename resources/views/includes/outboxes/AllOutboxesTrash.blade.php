{{--==========[ Row of buttons abpve table ]========= --}}<div class="row justify-content-end">    <div class="col-auto">        {!! Form::open(['method'=>'POST', 'action'=>'OutboxController@forceMultiDestroy', 'id'=>'deleteForm']) !!}        {!! Form::text('ids', null, ['style' => 'display: none']) !!}        <button id="multiDestroy" class="hi-button-simple hi-shadow-0 yellow darken-3">حذف دائمی</button>        {!! Form::close() !!}    </div></div>{{--==========[ Table Of Users ]========= --}}<div class="row mt-3">    <div class="col-12 px-0">        <table class="messages_outbox_table">            <thead class="table_tableHeader white-text">            {{--==========[ Table Headers ]========= --}}            <tr>                <th class="pl-0">                    <div class="pure-checkbox selectAllMsgInboxMargin">                        <input id="selectAllMsgOutbox" class="selectAllCheckboxes" name="checkbox" type="checkbox"                               onclick="selectAllCmnt()">                        <label for="selectAllMsgOutbox"></label>                    </div>                </th>                <th class="text-right">علامت زدن همه</th>                <th width="50%">صندوق خروجی</th>                <th>زمان</th>                <th>گیرنده</th>                <th></th>            </tr>            </thead>            <tbody>            @foreach($outboxes as $outbox)                {{--==========[ Table Row ]========= --}}                <tr>                    {{--==========[ Table Row items ]========= --}}                    <td>                        <div class="pure-checkbox selectCheckboxMargin mr-2">                            <input id="{{ $outbox->id }}" class="checkbox-{{$outbox->id}}"                                   onclick="selectCmntCheckbox(event)" name="{{ $outbox->id }}" type="checkbox">                            <label for="{{ $outbox->id }}"></label>                        </div>                    </td>                    <td class="text-right userInfoPlace py-1">                        <img class="rounded-circle Topbar_avatar" src="{{ asset('images/nobody_m.original.jpg') }}">                        <p class="username">{{ $outbox->user->full_name }}</p>                    </td>                    <td class="text-right py-1 hi-fontSize-15 pl-5">{{ str_limit($outbox->message, 100) }}</td>                    <td class="py-1">                        <p class="my-1 text-right hi-fontSize-14"><i class="fa fa-clock-o"                                                                     aria-hidden="true"></i> {{ $outbox->created_at->format('H:i') }}                        </p>                        <p class="my-1 text-right hi-fontSize-14"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;{{ $outbox->created_at->format('y/m/d') }}                        </p>                    </td>                    <td>{{ $outbox->inbox->full_name }}</td>                    {{--==========[ More Button Dropdown ]========= --}}                    <td>                        <div class="Topbar_dropdown dropdown table_dropDown">                            <button class="btn btn-secondary dropdown-toggle py-1 px-1" type="button"                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"                                    aria-expanded="false">                                <i class="fa fa-ellipsis-v grey-text text-darken-3 hi-fontSize-20"                                   aria-hidden="true"></i>                            </button>                            {{--==========[ Dropdown Menu ]========= --}}                            <div data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" class="dropdown-menu hi-shadow-2"                                 aria-labelledby="dropdownMenuButton">                                <button class="hi-button-btn1 dropdown-item py-0">                                    <i class="fa fa-undo ml-2" aria-hidden="true"></i>                                    {!! Form::open(['method'=>'POST', 'action'=>['OutboxController@restore', $outbox->id], 'class'=>'restore']) !!}                                    {!! Form::submit('بازگردانی', ['id'=>'restore', 'style' => 'background: none; border: none;']) !!}                                    {!! Form::close() !!}                                </button>                                <div class="dropdown-divider my-1"></div>                                <button class="hi-button-btn1 dropdown-item py-0">                                    <i class="fa fa-trash py-0 "></i>                                    {!! Form::open(['method'=>'DELETE', 'action'=>['OutboxController@forceDestroy', $outbox->id], 'class'=>'singleDestroy']) !!}                                    {!! Form::submit('حذف', ['id'=>'delete','class' => 'dropdown-item py-0 px-1']) !!}                                    {!! Form::close() !!}                                </button>                            </div>                        </div>                    </td>                </tr>            @endforeach            </tbody>        </table>    </div></div>{{--============[ Pagination of Page ]===========--}}<div class="row mt-4">    <div class="col-auto">        <nav aria-label="Page navigation example">            {{ $outboxes->links() }}        </nav>    </div></div><script src="{{ asset('js/dashboard/outboxTrashAll.js') }}"></script>