@extends('layouts.main')


@section('breadcrumb')
    @component('components.Breadcrumb')
        <li><a href="{{ route('home') }}">داشبورد</a></li>
        <li><a class="breadcrumb_currentPage" href="{{ route('backups.index') }}">پشتیبانی</a></li>
    @endcomponent
@endsection

@section('content')

    <div class="row backupBox_direction">
        <div class="col-4">
            @component('components.ExportCard')
                @slot('title') <i class="fa fa-pencil-square-o" aria-hidden="true"></i> نسخه پشتیبانی پیام ها@endslot
                @slot('color') background-color:#2b4748; @endslot
                @slot('address') {{ route('backups.inbox') }} @endslot
            @endcomponent
        </div>
        <div class="col-4">
            @component('components.ExportCard')
                @slot('title')<i class="fa fa-envelope-o" aria-hidden="true"></i>نسخه پشتیبانی نظرات@endslot
                @slot('color')background-color:#3e4d9e;@endslot
                @slot('address'){{ route('backups.comments') }}@endslot
            @endcomponent
        </div>
        <div class="col-4">
            @component('components.ExportCard')
                @slot('title')<i class="fa fa-user-o" aria-hidden="true"></i> نسخه پشتیبانی کاربران@endslot
                @slot('color')background-color:#3baeda;@endslot
                @slot('address'){{ route('backups.users') }}@endslot
            @endcomponent
        </div>
    </div>
    <br><br>
    <div class="row backupBox_direction">
        <div class="col-4">
            @component('components.ExportCard')
                @slot('title') <i class="fa fa-commenting-o" aria-hidden="true"></i>  نسخه پشتیبانی ادمین@endslot
                @slot('color') background-color:#b32e2e; @endslot
                @slot('address') {{ route('backups.admins') }} @endslot
            @endcomponent
        </div>
        <div class="col-4">
            @component('components.ExportCard')
                @slot('title') <i class="fa fa-user-circle-o" aria-hidden="true"></i> نسخه پشتیبانی پست ها@endslot
                @slot('color') background-color:#4d5667; @endslot
                @slot('address') {{ route('backups.posts') }}@endslot
            @endcomponent
        </div>
        <div class="col-4"></div>
    </div>


@endsection

@section('js_resources')
    <script src="{{ asset('Hi_Framework/javascript/Time And Date Picker/Other Libraries/PersianDatePicker/persian-date.js') }}"></script>
    <script src="{{ asset('Hi_Framework/javascript/Time And Date Picker/Other Libraries/PersianDatePicker/persian-datepicker-0.4.5.js') }}"></script>
@endsection