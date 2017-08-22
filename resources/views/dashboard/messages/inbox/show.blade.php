@extends('layouts.main')

@section('breadcrumb')
    @component('components.Breadcrumb')
        <li><a href="{{ route('home') }}">داشبورد</a></li>
        <li><a href="#">پیام ها</a></li>
        <li><a href="{{ route('inbox.index') }}">صندوق ورودی</a></li>
        <li><a class="breadcrumb_currentPage" href="{{ route('inbox.show', $inbox->id) }}">پاسخ به : {{ $inbox->full_name }}</a></li>
    @endcomponent
@endsection

@section('content')

    <nav dir="rtl">
        @component('components.errors') @endcomponent
    </nav>

    <div class="row answerPmBox">
        <div class="card answerMsgFormCard">
            <div class="card-header px-4 answerMsgFormCard_header py-2">
                <span class="pull-right"> {{ $inbox->full_name }} &nbsp; &nbsp;|&nbsp; &nbsp; {{ $inbox->created_at->format('y/m/d') }}</span>
                <span class="pull-left">{{ $inbox->email }}</span>
            </div>
            <div class="card-block px-4">
                <p class="card-text answerMsgFormCard_text">{{ $inbox->message }}</p>
            </div>
        </div>
    </div>
    <br>
    <div class="row answerPmBox">
        {!! Form::open(['method'=>'POST', 'action'=>'OutboxController@store']) !!}
            <div class="card answerMsgFormCard">
                <div class="card-header answerMsgFormCard_header py-2">
                   <span class="pull-right pt-2">پاسخ به : {!! Form::text('email',$inbox->email,['style'=>'background-color:#09686a; color:white; border: none; width: 300px;', 'readonly'=>'true']) !!}</span>
                    <span class="pull-left">
                        {!! Form::text('subject', null, ['class' => 'form-control answerMsgFormCard_form', 'placeholder'=>'موضوع را وارد کنید']) !!}
                        {!! Form::text('inbox_id',$inbox->id,['style'=>'display: none;', 'readonly'=>'true']) !!}
                    </span>
                    <span class="pull-left pt-2">
                        موضوع:&nbsp;
                    </span>
                </div>
                <div class="card-block p-0">
                    {!! Form::textarea('message', null, ['class'=>'form-control answerMsgFormCard_textarea', 'rows'=>'8', 'placeholder'=>'متن پاسخ را وارد کنید', 'id'=>'exampleTextarea']) !!}
                </div>
                {!! Form::submit('ارسال پاسخ') !!}
            </div>
        {!! Form::close() !!}
    </div>


@endsection