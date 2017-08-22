@extends('layouts.main')

@section('breadcrumb')
    @component('components.Breadcrumb')

    @endcomponent
@endsection
@section('css_resources')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.css">
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
@endsection


@section('content')

    @component('components.errors')
    @endcomponent

    @component('components.flash')
    @endcomponent

    <section class="usersSection">
        <div class="row mb-5">
            <div class="col-12">
                <div class="container-fluid">
                    <form action="/settings" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}

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
                                        <input name="logo" type="file" />
                                    </div>
                                    {{--<button class="hi-button-simple blue"> آپلود <i class="fa fa-plus"></i></button>--}}
                                    {{--<button class="hi-button-simple red darken-2 mr-4"> حذف <i class="fa fa-trash"></i></button>--}}
                                </div>
                            </div>
                        {{--============[ image box ]===========--}}
                        <div class="col-2 pr-0">
                            <img src="{{asset('images/nobody_m.original.jpg')}}" alt="در حال بارگذاری عکس" class="createPostImage mr-2">
                        </div>
                    </div>


                    <div class="row rowOfInputs">
                        <div class="col-10">
                            <div class="row pr-0 justify-content-around">
                                <div class="col-6 pr-0 pt-3">
                                    {!! Form::label('header', 'متن هدر را وارد کنید:', ['class' => 'pull-right createPostLabel mr-4']) !!}
                                </div>
                                <div class="col-6 pl-0">
                                    <button type="button" data-toggle="modal" data-target="#galleryModal" class="btn btn-primary pull-left mb-2 ml-3 createPostAddFileButton">
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
                            <img src="{{asset('images/nobody_m.original.jpg')}}" alt="در حال بارگذاری عکس" class="createPostImage mr-2">
                        </div>
                    </div>

                    {{--============[ About us ]===========--}}
                    <div class="row rowOfInputs mt-5">
                        <div class="col-10">
                            <div class="row pr-0 justify-content-around">
                                <div class="col-6 pr-0 pt-3">
                                    {!! Form::label('aboutus', 'متن درباره ما را وارد کنید:', ['class' => 'pull-right createPostLabel mr-4']) !!}
                                </div>
                                <div class="col-6 pl-0">
                                    <button type="button" data-toggle="modal" data-target="#galleryModal" class="btn btn-primary pull-left mb-2 ml-3 createPostAddFileButton">
                                        <i class="fa fa-camera" aria-hidden="true"></i>
                                        افزودن فایل
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{--============[ Right box without image ]===========--}}
                        <div class="col-10">
                            {!! Form::textarea('aboutus', null, ['class'=>'form-control writeCreatePostBox', 'rows'=>'10']) !!}
                        </div>
                        <script>
                            CKEDITOR.replace('aboutus', {
                                filebrowserUploadUrl : '{{ route('posts.imageUpload') }}',
                                filebrowserImageUploadUrl : '{{ route('posts.imageUpload') }}'
                            });
                        </script>


                        {{--============[ image box ]===========--}}
                        <div class="col-2 pr-0">
                            <img src="{{asset('images/nobody_m.original.jpg')}}" alt="در حال بارگذاری عکس" class="createPostImage mr-2">
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
                                        {!! Form::textarea('aboutSite', null, ['class'=>'form-control writeCreatePostBox', 'rows'=>'10']) !!}
                                    </div>
                                </div>
                                <script>
                                    CKEDITOR.replace('aboutSite', {
                                        filebrowserUploadUrl : '{{ route('posts.imageUpload') }}',
                                        filebrowserImageUploadUrl : '{{ route('posts.imageUpload') }}'
                                    });
                                </script>

                                {{--==========[ Row of Informations about site ]========= --}}
                                <div class="row rowOfInputs mt-4" >
                                    <div class="col-3 pl-5">
                                        <label for="name">نام :</label>
                                        <input name="first_name" type="text" class="form-control hi-input-simple" id="name">
                                    </div>

                                    <div class="col-3 pl-5">
                                        <label for="lastname">نام خانوادگی :</label>
                                        <input name="last_name" type="text" class="form-control hi-input-simple" id="lastname">
                                    </div>

                                    <div class="col-3 pr-5">
                                        <label for="siteName">نام سایت :</label>
                                        <input name="site_title" type="text" class="form-control hi-input-simple" id="siteName">
                                    </div>

                                    <div class="col-3 pr-5">
                                        <label for="zip">کدپستی :</label>
                                        <input name="zip" type="text" class="form-control hi-input-simple" id="zipcode">
                                    </div>
                                </div>

                                {{--==========[ Row of Informations about site ]========= --}}
                                <div class="row rowOfInputs mt-3" >
                                    <div class="col-3 pl-5">
                                        <label for="phonenumber">تلفن ثابت :</label>
                                        <input name="land_line" type="text" class="form-control hi-input-simple" id="phonenumber">
                                    </div>

                                    <div class="col-3 pl-5">
                                        <label for="phonenumber2">تلفن ثابت ۲ :</label>
                                        <input name="land_line2" type="text" class="form-control hi-input-simple" id="phonenumber2">
                                    </div>

                                    <div class="col-3 pr-5">
                                        <label for="mobilenumber">تلفن همراه :</label>
                                        <input name="mobile_number" type="text" class="form-control hi-input-simple" id="mobilenumber">
                                    </div>

                                    <div class="col-3 pr-5">
                                        <label for="mobilenumber2">تلفن همراه ۲ :</label>
                                        <input name="mobile_number2" type="text" class="form-control hi-input-simple" id="mobilenumber2">
                                    </div>
                                </div>

                                {{--==========[ Row of Informations about site ]========= --}}
                                <div class="row rowOfInputs mt-3" >
                                    <div class="col-6 pl-5">
                                        <label for="email">پست الکترونیکی  :</label>
                                        <input name="email" type="text" class="form-control hi-input-simple" id="email">
                                    </div>

                                    <div class="col-6 pr-5">
                                        <label for="address">آدرس :</label>
                                        <input name="address" type="text" class="form-control hi-input-simple" id="address">
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
                                        <label for="telegram">تلگرام :</label>
                                        <input name="telegram" type="text" class="form-control hi-input-simple" id="telegram">
                                    </div>

                                    <div class="col-3 pl-5">
                                        <label for="instagram">اینستاگرام :</label>
                                        <input name="instagram" type="text" class="form-control hi-input-simple" id="instagram">
                                    </div>

                                    <div class="col-3 pr-5">
                                        <label for="facebook">فیسبوک :</label>
                                        <input name="facebook" type="text" class="form-control hi-input-simple" id="facebook">
                                    </div>

                                    <div class="col-3 pr-5">
                                        <label for="linkedin">لینکدین :</label>
                                        <input name="linkedin" type="text" class="form-control hi-input-simple" id="linkedin">
                                    </div>
                                </div>

                                {{--==========[ Row of Informations about site ]========= --}}
                                <div class="row rowOfInputs mt-3" >
                                    <div class="col-3 pl-5">
                                        <label for="aparat">آپارات :</label>
                                        <input name="aparat" type="text" class="form-control hi-input-simple" id="aparat">
                                    </div>

                                    <div class="col-3 pl-5">
                                        <label for="twitter">توییتر :</label>
                                        <input name="twitter" type="text" class="form-control hi-input-simple" id="twitter">
                                    </div>

                                </div>


                            </div>
                        </div>

                        <div class="rulesAndGuidesInfo text-right mt-5">
                            <label for="contactInfo"><b>: قوانین و مقررات</b></label><br>
                            <div class="row justify-content-end">
                                <div class="col-12">
                                    {!! Form::textarea('rules', null, ['class'=>'form-control writeCreatePostBox', 'rows'=>'10']) !!}
                                </div>
                            </div>
                            <script>
                                CKEDITOR.replace('rules', {
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
            CKEDITOR.replace( 'contactus' );
            CKEDITOR.replace( 'aboutSite' );
            CKEDITOR.replace( 'rules' );
            CKEDITOR.replace( 'guide' );
        </script>

    </section>
@endsection

@section('javascript')
    <script src="{{ asset('js/dashboard/CreatePostIndex.js') }}"></script>
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
