@extends('layouts.main')

@section('breadcrumb')
    @component('components.Breadcrumb')
        <li><a href="{{ route('home') }}">داشبورد</a></li>
        <li><a href="#">پیام ها</a></li>
        <li><a href="{{ route('outbox.index') }}">صندوق خروجی</a></li>
        <li><a class="breadcrumb_currentPage" href="{{ route('outbox.show', $outbox->id) }}">مکالمه بین مدیر ({{ $outbox->user->full_name }}) و فرستنده ({{ $outbox->inbox->full_name }})</a></li>
    @endcomponent
@endsection

@section('content')

    <div class="row answerPmBox">
        <div class="card answerMsgFormCard">
            <div class="card-header px-4 answerMsgFormCard_header py-2">
                <span class="pull-right"> {{ $outbox->inbox->full_name }} &nbsp; &nbsp;|&nbsp; &nbsp; {{ $outbox->inbox->created_at->format('y/m/d') }}</span>
                <span class="pull-left">{{ $outbox->inbox->email }}</span>
            </div>
            <div class="card-block px-4">
                <p class="card-text answerMsgFormCard_text">{{ $outbox->inbox->message }}</p>
            </div>
        </div>
    </div>
    <br>
    <div class="row answerPmBox">
        <div class="card answerMsgFormCard">
            <div class="card-header px-4 answerMsgFormCard_header py-2">
                <span class="pull-right"> {{ $outbox->user->full_name }} &nbsp; &nbsp;|&nbsp; &nbsp; {{ $outbox->created_at->format('y/m/d') }}</span>
                <span class="pull-left">{{ $outbox->user->email }}</span>
            </div>
            <div class="card-block px-4">
                <p class="card-text answerMsgFormCard_text">{{ $outbox->message }}</p>
            </div>
        </div>
    </div>
    <br>
@endsection