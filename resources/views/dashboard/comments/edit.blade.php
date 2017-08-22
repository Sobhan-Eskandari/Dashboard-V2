@extends('layouts.main')
@section('search')
    {{--<div class="hi-search-1">--}}
        {{--{!! Form::open(['method'=>'GET', 'action'=>'CommentController@index']) !!}--}}
        {{--{!! Form::text('query', isset($_GET['query'])? $_GET['query'] : '', ['class' => 'hi-search_field', 'placeholder'=>'جست و جو کنید...', 'id'=>'searchCmt']) !!}--}}
        {{--<button class="hi-button-btn1 pull-left" id="cmtSearch"><i class="fa fa-search white-text hi-fontSize-19" aria-hidden="true"></i></button>--}}
        {{--{!! Form::close() !!}--}}
    {{--</div>--}}
@endsection
@section('breadcrumb')
    @component('components.Breadcrumb')

    @endcomponent
@endsection

@section('content')
    <div>کاربر:{{$comments->full_name}}</div>
    <p>parent</p>
    <div>{{$comments->parent->subject}}</div>
    <div>{{$comments->parent->message}}</div>
    {!! Form::model($comments,['method'=>'PATCH','action'=>['CommentController@update',$comments->id]])!!}
    {!! Form::text('subject',null,['class'=>'form-control inputCategory','id'=>'inputCategory','tabindex'=>'1']) !!}
    {!! Form::textarea('message',null,['class'=>'form-control inputCategory','id'=>'inputCategory','tabindex'=>'1']) !!}
    {!! Form::submit('ویرایش') !!}
    {!! Form::close() !!}
@endsection

