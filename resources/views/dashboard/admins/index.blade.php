@extends('layouts.main')

@section('breadcrumb')
    @component('components.Breadcrumb')
        <li><a href="{{ route('home') }}">داشبورد</a></li>
        <li><a href="#">مدیران</a></li>
        <li><a class="breadcrumb_currentPage" href="{{ route('admins.index') }}">همه مدیران</a></li>
    @endcomponent
@endsection

@section('search')
    <div class="hi-search-1">
        {!! Form::open(['method'=>'GET', 'action'=>'AdminController@index']) !!}
            {!! Form::text('query', isset($_GET['query'])? $_GET['query'] : '', ['class' => 'hi-search_field', 'placeholder'=>'جست و جو کنید...', 'id'=>'search']) !!}
            <button class="hi-button-btn1 pull-left" id="loading"><i class="fa fa-search white-text hi-fontSize-19" aria-hidden="true"></i></button>
        {!! Form::close() !!}
    </div>
@endsection

@section('content')

    <nav dir="rtl">
        @component('components.flash') @endcomponent
    </nav>

    <section class="adminsSection">

        {{--==========[ Row of buttons abpve table ]=========--}}
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-1 push-9 ml-5">
                    <a class="hi-button-btn1 orange ml-5 darken-2 hi-shadow-1 hi-size-4" href="{{ route('admins.trash') }}">
                        <i class="fa fa-trash white-text  hi-fontSize-20" aria-hidden="true"></i>
                    </a>
                </div>

                <div class="col-1 push-9">
                    <a href="{{ route('admins.create') }}" class="hi-button-simple hi-shadow-0 ml-4 green darken-3">ایجاد</a>
                </div>
            </div>

            <div id="loadAdmins">
                @include('Includes.AllAdmins')
            </div>
        </div>

    </section>
@endsection

@section('javascript')
    <script src="{{ asset('js/dashboard/adminIndex.js') }}"></script>
@endsection