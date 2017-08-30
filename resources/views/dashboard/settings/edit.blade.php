@extends('layouts.main')

@section('breadcrumb')
    @component('components.Breadcrumb')
        <li><a href="{{ route('home') }}">داشبورد</a></li>
        <li><a class="breadcrumb_currentPage" href="{{ route('settings.index') }}">تنظیمات</a></li>
    @endcomponent
@endsection

@section('css_resources')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.css">
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
@endsection

@section('gallery')
    @component('components.galleries.galleryModal')
        @slot('gallery')
            <div class="row gallery_files l-rtl gallery_uploadedImage" id="loadPhotos">
                @include('includes.galleries.AllPhotos')
            </div>
        @endslot
    @endcomponent
@endsection

@section('content')

    <nav dir="rtl">
        @if(count($errors) > 0)
            @component('components.errors.errors') @endcomponent
        @endif

        @if(Session::has('success') || Session::has('warning') || Session::has('danger'))
            @component('components.errors.flash') @endcomponent
        @endif
    </nav>

    <section class="usersSection">
        <div class="row mb-5">
            <div class="col-12">
                <div class="container-fluid">
                    {!! Form::model($setting , ['method'=>'PUT', 'action'=>['SettingController@update', $setting->id], 'files' => true]) !!}
                    {{--==========[ Sample Gallery Modal Lunch ]========= --}}
                    <div class="row rowOfInputs">
                        <div class="col-2">
                            <p class="mt-4"> لوگو :
                                <img src="{{asset('images/nobody_m.original.jpg')}}" alt="در حال بارگذاری عکس" class="createPostImage mr-2">
                            </p>
                        </div>

                        {{--============[ image box ]===========--}}
                        <div class="col-3 pr-0 align-self-center">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <div class="upload-button">
                                    <div class="hi-button-simple blue">
                                        آپلود <i class="fa fa-plus"></i>
                                    </div>
                                    {!! Form::file('logoFile'); !!}
                                </div>
                                {{--<button class="hi-button-simple blue"> آپلود <i class="fa fa-plus"></i></button>--}}
                                {{--<button class="hi-button-simple red darken-2 mr-4"> حذف <i class="fa fa-trash"></i></button>--}}
                            </div>
                        </div>
                    </div>


                    <div class="row rowOfInputs">
                        <div class="col-10">
                            <div class="row pr-0 justify-content-around">
                                <div class="col-6 pr-0 pt-3">
                                    {!! Form::label('header', 'متن هدر را وارد کنید:', ['class' => 'pull-right createPostLabel mr-4']) !!}
                                </div>
                                <div class="col-6 pl-0">
                                    <button id="header_selector" type="button" data-toggle="modal" data-target="#galleryModal" class="btn btn-primary pull-left mb-2 ml-3 createPostAddFileButton">
                                        <i class="fa fa-camera" aria-hidden="true"></i>
                                        افزودن فایل
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{--============[ Right box without image ]===========--}}
                        <div class="col-10">
                            {!! Form::textarea('header', null, ['class'=>'form-control writeCreatePostBox', 'rows'=>'10']) !!}
                        </div>
                        <script>
                            CKEDITOR.replace('header', {
                                filebrowserUploadUrl : '{{ route('posts.imageUpload') }}',
                                filebrowserImageUploadUrl : '{{ route('posts.imageUpload') }}'
                            });
                        </script>


                        {{--============[ image box ]===========--}}
                        <div class="col-2 pr-0">
                            <img src="{{asset('images/nobody_m.original.jpg')}}"
                                 alt="در حال بارگذاری عکس"
                                 class="createPostImage mr-2"
                                 id="header_img">
                            {!! Form::text('header_img', null, ['style' => 'display: none']) !!}
                        </div>
                    </div>

                    {{--============[ About us ]===========--}}
                    <div class="row rowOfInputs mt-5">
                        <div class="col-10">
                            <div class="row pr-0 justify-content-around">
                                <div class="col-6 pr-0 pt-3">
                                    {!! Form::label('about_us', 'متن درباره ما را وارد کنید:', ['class' => 'pull-right createPostLabel mr-4']) !!}
                                </div>
                                <div class="col-6 pl-0">
                                    <button id="about_us_selector" type="button" data-toggle="modal" data-target="#galleryModal" class="btn btn-primary pull-left mb-2 ml-3 createPostAddFileButton">
                                        <i class="fa fa-camera" aria-hidden="true"></i>
                                        افزودن فایل
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{--============[ Right box without image ]===========--}}
                        <div class="col-10">
                            {!! Form::textarea('about_us', null, ['class'=>'form-control writeCreatePostBox', 'rows'=>'10']) !!}
                        </div>
                        <script>
                            CKEDITOR.replace('about_us', {
                                filebrowserUploadUrl : '{{ route('posts.imageUpload') }}',
                                filebrowserImageUploadUrl : '{{ route('posts.imageUpload') }}'
                            });
                        </script>


                        {{--============[ image box ]===========--}}
                        <div class="col-2 pr-0">
                            <img src="{{asset('images/nobody_m.original.jpg')}}"
                                 alt="در حال بارگذاری عکس"
                                 class="createPostImage mr-2"
                                 id="about_us_img">
                            {!! Form::text('about_us_img', null, ['style' => 'display: none']) !!}
                        </div>
                    </div>

                    {{--==========[ Row of Informations about site ]========= --}}
                    <div class="row text-right contactUsInfo">
                        <div class="col-12 bgCard px-4 hi-shadow-1">
                            <h5>اطلاعات تماس</h5>
                            <hr class="contactUsInfo_line">

                            <label for="siteInfo" class="mt-3 hi-fontSize-18"><b>: درباره سایت</b></label>

                            <div class="row justify-content-end">
                                <div class="col-12">
                                    {!! Form::textarea('about_site', null, ['class'=>'form-control writeCreatePostBox', 'rows'=>'10']) !!}
                                </div>
                            </div>
                            <script>
                                CKEDITOR.replace('about_site', {
                                    filebrowserUploadUrl : '{{ route('posts.imageUpload') }}',
                                    filebrowserImageUploadUrl : '{{ route('posts.imageUpload') }}'
                                });
                            </script>

                            {{--==========[ Row of Informations about site ]========= --}}
                            <div class="row rowOfInputs mt-4" >
                                <div class="col-3 pl-5">
                                    {!! Form::label('first_name', 'نام :') !!}
                                    {!! Form::text('first_name', null, ['class' => 'form-control hi-input-simple', 'id'=>'name']) !!}
                                </div>

                                <div class="col-3 pl-5">
                                    {!! Form::label('last_name', 'نام خانوادگی :') !!}
                                    {!! Form::text('last_name', null, ['class' => 'form-control hi-input-simple', 'id'=>'lastname']) !!}
                                </div>

                                <div class="col-3 pr-5">
                                    {!! Form::label('site_title', 'نام سایت :') !!}
                                    {!! Form::text('site_title', null, ['class' => 'form-control hi-input-simple', 'id'=>'siteName']) !!}
                                </div>

                                <div class="col-3 pr-5">
                                    {!! Form::label('zip', 'کد پستی :') !!}
                                    {!! Form::text('zip', null, ['class' => 'form-control hi-input-simple', 'id'=>'zipcode']) !!}
                                </div>
                            </div>

                            {{--==========[ Row of Informations about site ]========= --}}
                            <div class="row rowOfInputs mt-3" >
                                <div class="col-3 pl-5">
                                    {!! Form::label('land_line', 'تلفن ثابت ۱:') !!}
                                    {!! Form::text('land_line', null, ['class' => 'form-control hi-input-simple', 'id'=>'phonenumber']) !!}
                                </div>

                                <div class="col-3 pl-5">
                                    {!! Form::label('land_line2', 'تلفن ثابت ۲:') !!}
                                    {!! Form::text('land_line2', null, ['class' => 'form-control hi-input-simple', 'id'=>'phonenumber2']) !!}
                                </div>

                                <div class="col-3 pr-5">
                                    {!! Form::label('mobile_number', 'تلفن همراه ۱:') !!}
                                    {!! Form::text('mobile_number', null, ['class' => 'form-control hi-input-simple', 'id'=>'mobilenumber']) !!}
                                </div>

                                <div class="col-3 pr-5">
                                    {!! Form::label('mobile_number2', 'تلفن همراه ۲:') !!}
                                    {!! Form::text('mobile_number2', null, ['class' => 'form-control hi-input-simple', 'id'=>'mobilenumber2']) !!}
                                </div>
                            </div>

                            {{--==========[ Row of Informations about site ]========= --}}
                            <div class="row rowOfInputs mt-3" >
                                <div class="col-6 pl-5">
                                    {!! Form::label('email', 'ایمیل :') !!}
                                    {!! Form::email('email', null, ['class' => 'form-control hi-input-simple', 'id'=>'email']) !!}
                                </div>

                                <div class="col-6 pr-5">
                                    {!! Form::label('address', 'آدرس :') !!}
                                    {!! Form::text('address', null, ['class' => 'form-control hi-input-simple', 'id'=>'address']) !!}
                                </div>
                            </div>

                        </div>
                    </div>

                    {{--==========[ Row of Informations about site ]========= --}}
                    <div class="row text-right contactUsInfo mt-5">
                        <div class="col-12 bgCard px-4 pb-5 hi-shadow-1">
                            <h5>شبکه های اجتماعی</h5>
                            <hr class="contactUsInfo_line">

                            {{--==========[ Row of Informations about site ]========= --}}
                            <div class="row rowOfInputs mt-4" >
                                <div class="col-3 pl-5">
                                    {!! Form::label('telegram', 'تلگرام :') !!}
                                    {!! Form::text('telegram', null, ['class' => 'form-control hi-input-simple', 'id'=>'telegram']) !!}
                                </div>

                                <div class="col-3 pl-5">
                                    {!! Form::label('instagram', 'اینستاگرام :') !!}
                                    {!! Form::text('instagram', null, ['class' => 'form-control hi-input-simple', 'id'=>'instagram']) !!}
                                </div>

                                <div class="col-3 pr-5">
                                    {!! Form::label('facebook', 'فیسبوک :') !!}
                                    {!! Form::text('facebook', null, ['class' => 'form-control hi-input-simple', 'id'=>'facebook']) !!}
                                </div>

                                <div class="col-3 pr-5">
                                    {!! Form::label('linkedin', 'لینکدین :') !!}
                                    {!! Form::text('linkedin', null, ['class' => 'form-control hi-input-simple', 'id'=>'linkedin']) !!}
                                </div>
                            </div>

                            {{--==========[ Row of Informations about site ]========= --}}
                            <div class="row rowOfInputs mt-3" >
                                <div class="col-3 pl-5">
                                    {!! Form::label('aparat', 'آپارات :') !!}
                                    {!! Form::text('aparat', null, ['class' => 'form-control hi-input-simple', 'id'=>'aparat']) !!}
                                </div>

                                <div class="col-3 pl-5">
                                    {!! Form::label('twitter', 'توئیتر :') !!}
                                    {!! Form::text('twitter', null, ['class' => 'form-control hi-input-simple', 'id'=>'twitter']) !!}
                                </div>

                            </div>


                        </div>
                    </div>

                    <div class="rulesAndGuidesInfo text-right mt-5">
                        <label for="contactInfo"><b>: قوانین و مقررات</b></label><br>
                        <div class="row justify-content-end">
                            <div class="col-12">
                                {!! Form::textarea('terms', null, ['class'=>'form-control writeCreatePostBox', 'rows'=>'10']) !!}
                            </div>
                        </div>
                        <script>
                            CKEDITOR.replace('terms', {
                                filebrowserUploadUrl : '{{ route('posts.imageUpload') }}',
                                filebrowserImageUploadUrl : '{{ route('posts.imageUpload') }}'
                            });
                        </script>

                        <br>

                        <label for="siteInfo" class="mt-3"><b>: راهنما</b></label><br>
                        <div class="row justify-content-end">
                            <div class="col-12">
                                {!! Form::textarea('guide', null, ['class'=>'form-control writeCreatePostBox', 'rows'=>'10']) !!}
                            </div>
                        </div>
                        <script>
                            CKEDITOR.replace('guide', {
                                filebrowserUploadUrl : '{{ route('posts.imageUpload') }}',
                                filebrowserImageUploadUrl : '{{ route('posts.imageUpload') }}'
                            });
                        </script>
                    </div>

                    <div class="row">
                        <div class="col-12 text-right mt-4">
                            <button type="submit" class="hi-button-simple light-blue darken-2 mb-5 mt-4">ذخیره تغییرات</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <script>
            CKEDITOR.replace( 'contact_us' );
            CKEDITOR.replace( 'about_site' );
            CKEDITOR.replace( 'terms' );
            CKEDITOR.replace( 'guide' );
        </script>

    </section>
@endsection

@section('javascript')
    <script src="{{ asset('js/dashboard/SettingUploadPhoto.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.js"></script>
    <script>
        Dropzone.options.myAwesomeDropzone = {
            init: function() {
                this.on("success", function() {
                    $.ajax({
                        type: "GET",
                        url: "/test",
                        data: [],
                        success: function (data) {
                            $('#loadPhotos').html(data);
                        },
                        fail: function () {
                            alert('مشکلی در آپلود تصویر مورد نظر ایجاد شد');
                        }
                    });
                });
            }
        };
    </script>
@endsection