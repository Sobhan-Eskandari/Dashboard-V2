{{--==========[ Row of buttons abpve table ]========= --}}<div class="row">    <div class="col-auto pl-0">        <a class="hi-button-btn1 orange darken-2 hi-shadow-1 hi-size-4" href="{{ route('posts.trash') }}">            <i class="fa fa-trash white-text hi-fontSize-20" aria-hidden="true"></i>        </a>    </div>    {{--==========[ Calender Dates ]========= --}}    <div class="col-2 btn-group-justified l-flex">        {{--<input name="from" type="text" class="backup_dateSelector backupSelect mr-3 px-2 l-rtl" />--}}        {{--<h6 class="card-title pt-2 backupExportCard_title">: از&nbsp;</h6>--}}    </div>    <div class="col-2 btn-group-justified l-flex">        {{--<input name="till" type="text" class="backup_dateSelector backupSelect px-2 l-rtl" />--}}        {{--<h6 class="card-title pt-2 backupExportCard_title">&nbsp;&nbsp;: تا&nbsp;</h6>--}}    </div>    <div class="btn-group push-5" role="group" aria-label="Basic example">        {!! Form::open(['method'=>'POST', 'action'=>'PostController@multiDestroy', 'id'=>'deleteForm']) !!}            {!! Form::text('ids', null, ['style' => 'display: none']) !!}            <button id="multiDestroy" class="hi-button-simple hi-shadow-0 ml-5 red darken-3 text-right">حذف</button>        {!! Form::close() !!}        <a class="white-text ml-3" href="{{ route('posts.create') }}">            <button class="hi-button-simple hi-shadow-0 green darken-3">ایجاد</button>        </a>    </div></div>{{--==========[ Table Of Users ]========= --}}<div class="row mt-3">    <div class="col-12 px-0">        <table class="posts_table">            <thead class="table_tableHeader white-text">            {{--==========[ Table Headers ]========= --}}            <tr>                <th class="pl-0">                    <div class="pure-checkbox mt-2">                        <input id="selectAllPost" class="selectAllCheckboxes" name="checkbox" type="checkbox" onclick="selectAllCmnt()">                        <label for="selectAllPost"></label>                    </div>                </th>                <th class="text-right">علامت زدن همه</th>                <th>نویسنده</th>                <th>دسته بندی ها</th>                <th>برچسب ها</th>                <th>تاریخ</th>                <th>                </th>            </tr>            </thead>            <tbody>            @foreach($posts as $post)                {{--==========[ Table Row ]========= --}}                <tr>                    {{--==========[ Table Row items ]========= --}}                    <td>                        <div class="pure-checkbox mt-2 mr-2">                            <input id="{{ $post->id  }}" class="checkbox-{{ $post->id  }}" onclick="selectCmntCheckbox(event)" name="{{ $post->id  }}" type="checkbox" >                            <label for="{{ $post->id }}"></label>                        </div>                    </td>                    <td class="text-right py-1">                        <p class="my-1">{{ $post->title }}</p>                        <p class="grey-text my-1 hi-fontSize-12"> ویرایش شده توسط {{ $post->updater->full_name }} در {{ $post->update_date() }}</p>                    </td>                    <td>{{ $post->creator->full_name }}</td>                    <td>{{ isset($post->categories[0]->name) ? $post->categories[0]->name . ' ' . 'و...' : 'ندارد' }}</td>                    <td>{{ isset($post->tags[0]->name) ? $post->tags[0]->name . ' ' . 'و...' : 'ندارد' }}</td>                    {{--==========[ Post Info ]========= --}}                    <td class="py-1">                        <p class="my-1 text-right hi-fontSize-12"><i class="fa fa-calendar" aria-hidden="true"></i> {{ $post->create_date() }}</p>                        <p class="my-1 text-right hi-fontSize-12"><i class="fa fa-comments" aria-hidden="true"></i> {{ count($post->comments) }}</p>                        <p class="my-1 text-right hi-fontSize-12"><i class="fa fa-eye" aria-hidden="true"></i> {{ $post->views }}</p>                    </td>                    {{--==========[ More Button Dropdown ]========= --}}                    <td>                        <div class="Topbar_dropdown dropdown table_dropDown">                            <button class="btn btn-secondary dropdown-toggle py-1 px-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                                <i class="fa fa-ellipsis-v black-text hi-fontSize-20" aria-hidden="true"></i>                            </button>                            {{--==========[ Dropdown Menu ]========= --}}                            <div data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" class="dropdown-menu hi-shadow-2" aria-labelledby="dropdownMenuButton">                                <a class="dropdown-item text-right py-0" href="{{ route('posts.show', $post->slug) }}"><i class="fa fa-eye ml-2" aria-hidden="true"></i>مشاهده</a>                                <a class="dropdown-item text-right py-0" href="{{ route('posts.edit', $post->id) }}"><i class="fa fa-pencil ml-2" aria-hidden="true"></i> ویرایش</a>                                {!! Form::open(['method'=>'DELETE', 'action'=>['PostController@destroy', $post->id], 'class'=>'singleDestroy']) !!}                                <button type="submit" class="dropdown-item text-right hi-shadow-0 py-0 mt-1" href="#"><i class="fa fa-trash ml-2" aria-hidden="true"></i>حذف</button>                                {{--{!! Form::submit('حذف', ['id'=>'single-' . $id ,'style' => 'background: none; border: none; color: #b32e2e; font-weight: bold;']) !!}--}}                                {!! Form::close() !!}                                <a class="dropdown-item text-right py-0 mt-1" href="#"><i class="fa fa-lock ml-2" aria-hidden="true"></i>قفل پست</a>                            </div>                        </div>                    </td>                </tr>            @endforeach            </tbody>        </table>    </div></div>{{--============[ Pagination of Page ]===========--}}<div class="row mt-4">    <div class="col-auto">        <nav aria-label="Page navigation example">            {{ $posts->links() }}        </nav>    </div></div><script src="{{ asset('js/dashboard/postAll.js') }}"></script>