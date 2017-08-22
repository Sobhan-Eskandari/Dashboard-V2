@extends('layouts.main')

@section('breadcrumb')
    @component('components.Breadcrumb')

    @endcomponent
@endsection

@section('content')
    <div class="row">
        <div class="col hi-subjectDashboardAdminProfile text-right" id="test">
            {{--<h5 class="hi-subjectDashboardAdminProfile_h5">تاریخ ثبت نام<span> &nbsp;|&nbsp; </span>تاریخ آخرین ویرایش--}}
                {{--اطلاعات : 1396/5/20</h5>--}}
        </div>
    </div>
    {!! Form::model($user,[]) !!}
        <div class="row">
            <!-- about me -->
            <div class="col-8 mt-3">

                @component('components.showUserInfoCard')
                    @slot('header_color')
                        blue-grey darken-1
                    @endslot

                    @slot('cardSubject')
                        :درباره کاربر
                    @endslot
                @endcomponent

            </div>

            <div class="col-4 mt-3">

                @component('components.showUsersInfoCard')
                    @slot('header_color')
                        blue-grey darken-1
                    @endslot
                @slot('img')
                            <div class="hi-profileCard_PictureSelectorBox_pictureBox_hover" >
                                <figure>
                                    <img src="{{ isset($user->avatar) ? asset('photos/'.$user->photo->name):asset('images/nobody_m.original.jpg') }}"
                                         class="hi-profileCard_PictureSelectorBox_picture img-fluid"
                                         alt="Responsive image" data-id=""></figure>
                            </div>
                    @endslot

                    @slot('characterName')
                    {{$user->getFullNameAttribute()}}
                    @endslot
                @endcomponent

            </div>
        </div>

    {!! Form::close() !!}
@endsection