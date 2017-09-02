@extends('layouts.main')

@section('breadcrumb')
    @component('components.Breadcrumb')
        <li><a href="{{ route('home') }}">داشبورد</a></li>
        <li><a class="breadcrumb_currentPage" href="{{ route('sliders.index') }}">همه اسلایدرها</a></li>
    @endcomponent
@endsection

@section('content')

    <nav dir="rtl">
        @if(count($errors) > 0)
            @component('components.errors.errors') @endcomponent
        @endif

        @if(Session::has('success') || Session::has('warning') || Session::has('danger'))
            @component('components.errors.flash') @endcomponent
        @endif
    </nav>

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

                                @foreach($sliders as $slider)
                                    <tr>
                                        {{--==========[ Gallery Table Row items ]========= --}}
                                        <td>
                                            <div class="pure-checkbox mt-2 mr-2">
                                                <input id="sliders_checkbox-{{ $slider->id }}" class="checkbox-{{ $slider->id }}" value="{{ $slider->id }}" onclick="selectCmntCheckbox(event)" name="sliders[]" type="checkbox" >
                                                <label for="sliders_checkbox-{{ $slider->id }}"></label>
                                            </div>
                                        </td>
                                        <td class="py-1 text-center">
                                            <div class="userInfoPlace">
                                                @if(isset($slider->user->photos[0]->name))
                                                    <img class="rounded img-fluid hi-size-7" src="{{ asset('gallery/' . $slider->user->photos[0]->name) }}">
                                                @else
                                                    <img class="rounded-circle hi-size-9 mb-3" src="{{ asset('images/nobody_m.original.jpg') }}">
                                                @endif
                                                <div>
                                                    <p class="username mt-3"> {{ strip_tags($slider->caption) }} </p>
                                                    <p class="grey-text hi-fontSize-12 text-right pr-2">
                                                        توسط {{ $slider->user->full_name }} ایجاد شده در : {{ $slider->create_date() }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>

                                        {{--==========[ Order of Slider Button ]========= --}}
                                        <td class="px-1">
                                            <select class="slidersDropDown">
                                                <option value="1">۱</option>
                                                <option value="2">۲</option>
                                                <option value="3">۳</option>
                                                <option value="4">۴</option>
                                            </select>
                                        </td>

                                        {{--==========[ More Button ]========= --}}
                                        <td class="px-1">
                                            <div class="Topbar_dropdown dropdown table_dropDown">
                                                <button class="btn btn-secondary dropdown-toggle py-1 px-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v black-text hi-fontSize-20" aria-hidden="true"></i>
                                                </button>
                                                {{--==========[ Dropdown Menu ]========= --}}
                                                <div data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" class="dropdown-menu hi-shadow-2" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item text-right py-0" href="/sliders/{{$slider->id}}/edit"><i class="fa fa-pencil ml-2" aria-hidden="true"></i>ویرایش</a>
                                                    <div class="dropdown-divider my-1"></div>
                                                    <form action="/sliders/{{$slider->id}}" method="post">
                                                        {{csrf_field()}}
                                                        {{method_field("DELETE")}}
                                                        <button type="submit" class="dropdown-item text-right py-0 mt-1" href="#"><i class="fa fa-trash ml-2" aria-hidden="true"></i>حذف</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                        {{--==========[ Gallery Table Row items ]========= --}}
                                    </tr>
                                @endforeach

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