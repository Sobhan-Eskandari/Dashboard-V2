@extends('layouts.main')

@section('breadcrumb')
    @component('components.Breadcrumb')

    @endcomponent
@endsection

@section('content')

    <section class="usersSection">
        <div class="row">
            <div class="col-12 bgCard hi-shadow-2">
                <div class="container-fluid">

                    {{--==========[ Row of buttons abpve table ]========= --}}
                    <div class="row">
                        <div class="col-1 pl-0">
                            <button class="hi-button-btn1 orange darken-2 hi-shadow-1 hi-size-4">
                                <i class="fa fa-trash white-text hi-fontSize-20" aria-hidden="true"></i>
                            </button>
                        </div>

                        <div class="col-auto offset-9 text-right mr-2">
                            <button class="hi-button-simple hi-shadow-0 red darken-3 text-right">حذف</button>
                        </div>

                        <div class="col-auto ml-2 text-right">
                            <button class="hi-button-simple hi-shadow-0 green darken-3">ایجاد</button>
                        </div>
                    </div>

                    {{--==========[ Table Of Users ]========= --}}
                    <div class="row mt-3">
                        <div class="col-12 px-0">
                            <table class="media_table">
                                <thead class="table_tableHeader white-text">

                                {{--==========[ Table Headers ]========= --}}
                                <tr>
                                    <th class="pl-0">
                                        <div class="pure-checkbox mt-2 ml-2">
                                            <input id="selectAllMedia" class="selectAllCheckboxes" name="checkbox" type="checkbox" onclick="selectAllCmnt()">
                                            <label for="selectAllMedia"></label>
                                        </div>
                                    </th>
                                    <th class="text-right pr-0">علامت زدن همه</th>
                                    <th>توسط</th>
                                    <th>محتوا</th>
                                    <th>تاریخ</th>
                                    <th></th>
                                </tr>

                                </thead>
                                <tbody>

                                @for ($i = 0; $i < 8; $i++)
                                    {{--==========[ Table Row ]========= --}}
                                    <tr>
                                        @component('components.MediaTableRow')

                                            @slot('chk_name')
                                                {{ $i }}
                                            @endslot

                                            @slot('file_name')
                                                file_of_library.png
                                            @endslot

                                            @slot('file_uploader')
                                               حمید وتر
                                            @endslot

                                            @slot('file_content')
    آموزش کلی
                                            @endslot

                                            @slot('file_date')
    ۹۵/۵/۵
                                            @endslot

                                            @slot('trash')@endslot
                                        @endcomponent
                                    </tr>
                                @endfor

                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{--============[ Pagination of Page ]===========--}}
                    <div class="row mt-4">
                        <div class="col-auto">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link nextBtn" href="#">بعدی</a></li>
                                    <li class="page-item"><a class="page-link" href="#">۱</a></li>
                                    <li class="page-item"><a class="page-link" href="#">۲</a></li>
                                    <li class="page-item"><a class="page-link" href="#">۳</a></li>
                                    <li class="page-item"><a class="page-link prevBtn" href="#">قبلی</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection