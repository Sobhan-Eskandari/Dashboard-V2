@extends('layouts.main')

@section('breadcrumb')
    @component('components.Breadcrumb')

    @endcomponent
@endsection

@section('content')

@section('gallery')
    @component('components.galleryModal')
        @slot('gallery')
            <div class="row gallery_files l-rtl gallery_uploadedImage" id="photos">
                @include('Includes.AllPhotosGallery')
            </div>
        @endslot
    @endcomponent
@endsection

{{--</div>--}}
{{--<button data-toggle="modal" data-target="#galleryModal"></button>--}}
    {!! Form::model($user,['method'=>'POST','action'=>['API\UserController@update',$user->id]]) !!}
        <div class="row">
            <!-- about me -->
            <div class="col-8 mt-3">

                @component('components.editUserInfoCard')
                    @slot('header_color')
                        blue-grey darken-1
                    @endslot

                    @slot('cardSubject')
                        :درباره کاربر
                    @endslot
                @endcomponent

            </div>

            <div class="col-4 mt-3">

                @component('components.editUsersInfoCard')
                    @slot('header_color')
                        blue-grey darken-1
                    @endslot
                @slot('photo')
                            @include('Includes.UserImage')
                    @endslot

                    @slot('characterName')
                      {{--سبحان اسکندری--}}
                   {{$user->getFullNameAttribute()}}
                    @endslot
                @endcomponent

            </div>
        </div>
    <div class="row pr-5 mt-5">
        <div class="col-3 push-11">
            <button class="btn hi-confirmButtonDashboard light-blue darken-2" type="submit">تایید</button>
        </div>
    </div>
    {!! Form::close() !!}
<script>

</script>
@endsection