@extends('layouts.main')

@section('breadcrumb')
    @component('components.Breadcrumb')
        <li><a href="{{ route('home') }}">داشبورد</a></li>
        <li><a href="#">پست ها</a></li>
        <li><a class="breadcrumb_currentPage" href="{{ route('posts.draft') }}">پیش نویس ها</a></li>
    @endcomponent
@endsection

@section('search')
    <div class="hi-search-1">
        {!! Form::open(['method'=>'GET', 'action'=>'PostController@draft']) !!}
            {!! Form::text('query', isset($_GET['query'])? $_GET['query'] : '', ['class' => 'hi-search_field', 'placeholder'=>'جست و جو کنید...', 'id'=>'search']) !!}
            <button class="hi-button-btn1 pull-left" id="loading"><i class="fa fa-search white-text hi-fontSize-19" aria-hidden="true"></i></button>
        {!! Form::close() !!}
    </div>
@endsection

@section('content')

    <nav dir="rtl">
        @component('components.flash') @endcomponent
    </nav>

    <section class="usersSection">
        <div class="row">
            <div class="col-12 bgCard hi-shadow-2">
                <div class="container-fluid" id="loadPosts">
                    @include('Includes.AllPostsDraft')
                </div>
            </div>
        </div>
    </section>

@endsection

@section('javascript')
    <script src="{{ asset('js/dashboard/postDraft.js') }}"></script>
@endsection