@extends('layouts.main')

@section('search')
    <div class="hi-search-1">
        {!! Form::open(['method'=>'GET', 'action'=>'InboxController@index']) !!}
        {!! Form::text('query', isset($_GET['query'])? $_GET['query'] : '', ['class' => 'hi-search_field', 'placeholder'=>'جست و جو کنید...', 'id'=>'search']) !!}
            <button class="hi-button-btn1 pull-left" id="loading"><i class="fa fa-search white-text hi-fontSize-19" aria-hidden="true"></i></button>
        {!! Form::close() !!}
    </div>
@endsection

@section('breadcrumb')
    @component('components.Breadcrumb')
        <li><a href="{{ route('home') }}">داشبورد</a></li>
        <li><a href="#">پیام ها</a></li>
        <li><a class="breadcrumb_currentPage" href="{{ route('inbox.index') }}">صندوق ورودی</a></li>
    @endcomponent
@endsection

@section('content')

    <nav dir="rtl">
        @component('components.errors') @endcomponent
        @component('components.flash') @endcomponent
    </nav>

    <section class="usersSection">
        <div class="row">
            <div class="col-12 bgCard hi-shadow-2">
                <div class="container-fluid" id="loadInboxes">
                    @include('Includes.AllInboxes')
                </div>
            </div>
        </div>
    </section>

@endsection

@section('javascript')
    <script src="{{ asset('js/dashboard/InboxIndex.js') }}"></script>
@endsection