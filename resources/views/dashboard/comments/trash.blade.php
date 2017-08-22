@extends('layouts.main')
{{--@section('search')--}}
    {{--<div class="hi-search-1">--}}
        {{--{!! Form::open(['method'=>'GET', 'action'=>'CommentController@trash']) !!}--}}
        {{--{!! Form::text('query', isset($_GET['query'])? $_GET['query'] : '', ['class' => 'hi-search_field', 'placeholder'=>'جست و جو کنید...', 'id'=>'searchCmt']) !!}--}}
        {{--<button class="hi-button-btn1 pull-left" id="cmtSearch"><i class="fa fa-search white-text hi-fontSize-19" aria-hidden="true"></i></button>--}}
        {{--{!! Form::close() !!}--}}
    {{--</div>--}}
{{--@endsection--}}
@section('breadcrumb')
    @component('components.Breadcrumb')

    @endcomponent
@endsection

@section('content')

    <section class="usersSection">
        <div class="row">
            <div class="col-12 bgCard hi-shadow-2">
                <div class="container-fluid" id="trash">
                    @include('Includes.AllTrashedComments')
                </div>
            </div>
        </div>
    </section>

@endsection