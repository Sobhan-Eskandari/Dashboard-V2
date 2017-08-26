@extends('layouts.main')

@section('breadcrumb')
    @component('components.Breadcrumb')
        <li><a href="{{ route('home') }}">داشبورد</a></li>
        <li><a href="{{ route('comments.index') }}">نظرات</a></li>
        <li><a class="breadcrumb_currentPage" href="{{ route('comments.trash') }}">زباله دان</a></li>
    @endcomponent
@endsection

@section('content')

    <section class="usersSection">
        <div class="row">
            <div class="col-12 bgCard hi-shadow-2">
                <div class="container-fluid" id="trash">
                    @include('includes.comments.AllTrashedComments')
                </div>
            </div>
        </div>
    </section>

@endsection