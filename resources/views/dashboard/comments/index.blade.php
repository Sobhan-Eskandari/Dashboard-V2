@extends('layouts.main')
@section('search')
    <div class="hi-search-1">
        {!! Form::open(['method'=>'GET', 'action'=>'CommentController@index']) !!}
        {!! Form::text('query', isset($_GET['query'])? $_GET['query'] : '', ['class' => 'hi-search_field', 'placeholder'=>'جست و جو کنید...', 'id'=>'searchCmt']) !!}
        <button class="hi-button-btn1 pull-left" id="cmtSearch"><i class="fa fa-search white-text hi-fontSize-19" aria-hidden="true"></i></button>
        {!! Form::close() !!}
    </div>
@endsection
@section('breadcrumb')
    @component('components.Breadcrumb')

    @endcomponent
@endsection

@section('content')

    <section class="usersSection">
        <div class="row">
            <div class="col-12 bgCard hi-shadow-2">
                <div class="container-fluid" id="categories">
                    @include('Includes.AllComments')
                </div>
            </div>
        </div>
    </section>

    <script src="{{asset('/js/dashboard/commentIndex')}}"></script>

@endsection
@section('javascript')
    <script src="{{ asset('Hi_Framework/javascript/Time And Date Picker/Other Libraries/PersianDatePicker/persian-date.js') }}"></script>
    <script src="{{ asset('Hi_Framework/javascript/Time And Date Picker/Other Libraries/PersianDatePicker/persian-datepicker-0.4.5.js') }}"></script>
    {{--<script src="{{asset('js/application.js')}}"></script>--}}
@endsection

