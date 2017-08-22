@extends('layouts.main')

@section('breadcrumb')
    @component('components.Breadcrumb')
        <li><a href="{{ route('home') }}">داشبورد</a></li>
        <li><a href="#">مدیران</a></li>
        <li><a href="{{ route('admins.index') }}">همه مدیران</a></li>
        <li><a class="breadcrumb_currentPage" href="{{ route('admins.trash') }}">زباله دان</a></li>
    @endcomponent
@endsection

@section('content')

    <section class="usersSection">
        <div class="row">
            <div class="col-12 bgCard hi-shadow-2">
                <div class="container-fluid" id="loadAdmins">
                    @include('Includes.AllAdminsTrash')
                </div>
            </div>
        </div>
    </section>

@endsection

@section('javascript')
    <script src="{{ asset('js/dashboard/adminTrashIndex.js') }}"></script>
@endsection