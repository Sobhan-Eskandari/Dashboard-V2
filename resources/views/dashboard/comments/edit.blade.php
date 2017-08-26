@extends('layouts.main')

@section('breadcrumb')
    @component('components.Breadcrumb')
        <li><a href="{{ route('home') }}">داشبورد</a></li>
        <li><a href="#">نظرات</a></li>
        <li><a class="breadcrumb_currentPage" href="{{ route('comments.show', $comments->id) }}">ویرایش پیام : {{ $comments->full_name }}</a></li>
    @endcomponent
@endsection

@section('content')
    <nav dir="rtl">
        @component('components.errors.errors') @endcomponent
    </nav>

    <div class="row answerPmBox">
        <div class="card answerMsgFormCard">
            <div class="card-header px-4 answerMsgFormCard_header py-2">
                <span class="pull-right">{{ $comments->full_name }} &nbsp; &nbsp;|&nbsp; &nbsp; {{ $comments->created_at->format('y/m/d') }}</span>
{{--                <span class="pull-left">{{ $comments->parent->subject }}</span>--}}
            </div>
            <div class="card-block px-4">
                {{--<p class="card-text answerMsgFormCard_text">{{ $comments->parent->message }}</p>--}}
            </div>
        </div>
    </div>
    <br>
    <div class="row answerPmBox">
        {!! Form::model($comments,['method'=>'PATCH','action'=>['CommentController@update',$comments->id]])!!}
        <div class="card answerMsgFormCard">
            <div class="card-header answerMsgFormCard_header py-2">
                {{--<span class="pull-right pt-2">پاسخ به : {!! Form::text('email',$inbox->email,['style'=>'background-color:#09686a; color:white; border: none; width: 300px;', 'readonly'=>'true']) !!}</span>--}}
                <span class="pull-left">
                    {!! Form::text('subject',null,['class'=>'form-control inputCategory','id'=>'inputCategory','tabindex'=>'1']) !!}
                </span>
                <span class="pull-left pt-2">
                        موضوع:&nbsp;
                    </span>
            </div>
            <div class="card-block p-0">
                {!! Form::textarea('message',null,['class'=>'form-control inputCategory','id'=>'inputCategory','tabindex'=>'1']) !!}
            </div>
            {!! Form::submit('ویرایش') !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection

