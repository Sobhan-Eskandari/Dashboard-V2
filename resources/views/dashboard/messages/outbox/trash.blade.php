@extends('layouts.main')

@section('breadcrumb')
    @component('components.Breadcrumb')
        <li><a href="{{ route('home') }}">داشبورد</a></li>
        <li><a href="#">پیام ها</a></li>
        <li><a href="{{ route('outbox.index') }}">صندوق خروجی</a></li>
        <li><a class="breadcrumb_currentPage" href="{{ route('outbox.trash') }}">زباله دان</a></li>
    @endcomponent
@endsection

@section('content')

    <section class="usersSection">
        <div class="row">
            <div class="col-12 bgCard hi-shadow-2">
                <div class="container-fluid" id="loadOutboxes">
                    @include('Includes.AllOutboxesTrash')
                </div>
            </div>
        </div>
    </section>

@endsection

@section('javascript')
    <script src="{{ asset('js/dashboard/outboxTrashIndex.js') }}"></script>
@endsection