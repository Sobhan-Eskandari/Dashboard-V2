@extends('layouts.main')

@section('breadcrumb')
    @component('components.Breadcrumb')
        <li><a href="{{ route('home') }}">داشبورد</a></li>
        <li><a href="#">پیام ها</a></li>
        <li><a href="{{ route('inbox.index') }}">صندوق ورودی</a></li>
        <li><a class="breadcrumb_currentPage" href="{{ route('inbox.trash') }}">زباله دان</a></li>
    @endcomponent
@endsection

@section('content')

    <section class="usersSection">
        <div class="row">
            <div class="col-12 bgCard hi-shadow-2">
                <div class="container-fluid" id="loadInboxes">
                    @include('Includes.AllInboxesTrash')
                </div>
            </div>
        </div>
    </section>

@endsection

@section('javascript')
    <script src="{{ asset('js/dashboard/inboxTrashIndex.js') }}"></script>
@endsection