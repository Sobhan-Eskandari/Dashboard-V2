@extends('layouts.main')

@section('breadcrumb')
    @component('components.Breadcrumb')

    @endcomponent
@endsection

@section('content')
    <form action="/sliders/destroy" method="post">
    {{csrf_field()}}
    {{method_field('DELETE')}}
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
                            <form action="/sliders"></form>
                            <button class="hi-button-simple hi-shadow-0 red darken-3 text-right">حذف</button>
                        </div>

                        <div class="col-auto ml-2 text-right">
                            <a href="/sliders/create" class="hi-button-simple hi-shadow-0 green darken-3">ایجاد</a>
                        </div>
                    </div>

                    {{--==========[ Table Of Users ]========= --}}
                    <div class="row mt-3">
                        <div class="col-12 px-0">
                            <table class="sliders_table">
                                <thead class="table_tableHeader white-text">

                                {{--==========[ Table Headers ]========= --}}
                                <tr>
                                    <th class="pl-0">
                                        <div class="pure-checkbox mt-2">
                                            <input id="selectAllSliders" class="selectAllCheckboxes" name="checkbox" type="checkbox" onclick="selectAllCmnt()">
                                            <label for="selectAllSliders"></label>
                                        </div>
                                    </th>
                                    <th class="text-right">علامت زدن همه</th>
                                    <th></th>
                                    <th></th>
                                </tr>

                                </thead>
                                <tbody>

                                @for ($i = 0; $i < count($sliders); $i++)
                                    <tr>
                                        {{--==========[ Gallery Table Row items ]========= --}}
                                        @component('components.SlidersTableRow')

                                            @slot('chk_name')
                                                {{ $i }}
                                            @endslot

                                            @slot('id')
                                                {{ $sliders[$i]->id }}
                                            @endslot

                                            @slot('avatar')
                                                {{ $sliders[$i]->user->avatar }}
                                            @endslot

                                            @slot('slider_text')
                                                {!! $sliders[$i]->caption !!}
                                            @endslot

                                            @slot('slider_edited')
                                                توسط {{ $sliders[$i]->user->user_name }} ایجاد شده در : {{jdate($sliders[$i]->created_at)->format('%d %B، %Y')}}
                                            @endslot

                                        @endcomponent
                                    </tr>
                                @endfor

                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{--==========[ Submit Button ]========= --}}
                    <div class="row">
                        <div class="col-12 text-right mt-3 pr-0">
                            <button class="btn btn-primary hi-shadow-1">
                                تاییید
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</form>
@endsection

@section('js_resources')
    <script src="{{ asset('js/bootstrap-multiselect.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.slidersDropDown').multiselect();
        });
    </script>
@endsection