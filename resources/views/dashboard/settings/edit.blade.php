@extends('layouts.main')

@section('breadcrumb')
    @component('components.Breadcrumb')

    @endcomponent
@endsection
@section('css_resources')
    <script src="//cdn.ckeditor.com/4.7.0/full/ckeditor.js"></script>
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
                    {!! Form::open(['method'=>'PATCH', 'url' => '/settings/'. $setting->id]) !!}

                    {{--==========[ Sample Gallery Modal Lunch ]========= --}}


                    <div class="row rowOfInputs">
                        <div class="col-2">
                            @section('gallery')
                                @component('components.galleryModal')
                                    @slot('gallery')
                                        <div class="row gallery_files l-rtl gallery_uploadedImage" id="loadPhotos">
                                            @include('Includes.AllPhotos')
                                        </div>
                                    @endslot
                                @endcomponent
                            @endsection
                            <p class="mt-4"> لوگو : <button data-toggle="modal" data-target="#galleryModal" class="hi-button-simple"> آپلود <i class="fa fa-plus"></i></button> </p>
                        </div>

                        {{--============[ image box ]===========--}}
                        <div class="col-2 pr-0">
                            <img src="{{$setting->logo}}" alt="در حال بارگذاری عکس" class="createPostImage mr-2">
                        </div>
                    </div>

                    <div class="row rowOfInputs">
                        {{--============[ Right box without image ]===========--}}
                        <div class="col-10">
                            @component('components.TextEditor')
                                @slot('textEditorLabel')
                                    متن هدر را وارد کنید:
                                @endslot

                                @slot('name')
                                    header
                                @endslot

                                @slot('value')
                                    {!! $setting->header !!}
                                @endslot


                            @endcomponent
                            <br>
                        </div>
                        {{--============[ image box ]===========--}}
                        <div class="col-2 pr-0">
                            <br><br>
                            <img src="{{asset('images/nobody_m.original.jpg')}}" alt="در حال بارگذاری عکس" class="createPostImage mr-2">
                        </div>
                    </div>

                    <div class="row rowOfInputs">
                        {{--============[ Right box without image ]===========--}}
                        <div class="col-10">
                            @component('components.TextEditor')
                                @slot('textEditorLabel')
                                    درباره ما:
                                @endslot

                                @slot('name')
                                    about_us
                                @endslot

                                @slot('value')
                                    {!! $setting->about_us !!}
                                @endslot
                            @endcomponent
                            <br>
                        </div>
                        {{--============[ image box ]===========--}}
                        <div class="col-2 pr-0">
                            <br><br>
                            <img src="{{asset('images/nobody_m.original.jpg')}}" alt="در حال بارگذاری عکس" class="createPostImage mr-2">
                        </div>
                    </div>

                    {{--==========[ Row of Informations about site ]========= --}}
                    <div class="row text-right contactUsInfo">
                        <div class="col-12 bgCard px-4 hi-shadow-1">
                            <h5>اطلاعات تماس</h5>
                            <hr class="contactUsInfo_line">

                            <label for="siteInfo" class="mt-3 hi-fontSize-18"><b>: درباره سایت</b></label>
                            <textarea name="about_site" id="siteInfo" class="contactUsInfo_textarea">{{$setting->about_site}}</textarea>

                            {{--==========[ Row of Informations about site ]========= --}}
                            <div class="row rowOfInputs mt-4" >
                                <div class="col-3 pl-5">
                                    <label for="name">نام :</label>
                                    <input value="{{$setting->first_name}}" name="first_name" type="text" class="form-control hi-input-simple" id="name">
                                </div>

                                <div class="col-3 pl-5">
                                    <label for="lastname">نام خانوادگی :</label>
                                    <input value="{{$setting->last_name}}"  name="last_name" type="text" class="form-control hi-input-simple" id="lastname">
                                </div>

                                <div class="col-3 pr-5">
                                    <label for="siteName">نام سایت :</label>
                                    <input value="{{$setting->site_title}}" name="site_title" type="text" class="form-control hi-input-simple" id="siteName">
                                </div>

                                <div class="col-3 pr-5">
                                    <label for="zip">کدپستی :</label>
                                    <input value="{{$setting->zip}}" name="zip" type="text" class="form-control hi-input-simple" id="zipcode">
                                </div>
                            </div>

                            {{--==========[ Row of Informations about site ]========= --}}
                            <div class="row rowOfInputs mt-3" >
                                <div class="col-3 pl-5">
                                    <label for="phonenumber">تلفن ثابت :</label>
                                    <input value="{{$setting->land_line}}" name="land_line" type="text" class="form-control hi-input-simple" id="phonenumber">
                                </div>

                                <div class="col-3 pl-5">
                                    <label for="phonenumber2">تلفن ثابت ۲ :</label>
                                    <input value="{{$setting->land_line2}}" name="land_line2" type="text" class="form-control hi-input-simple" id="phonenumber2">
                                </div>

                                <div class="col-3 pr-5">
                                    <label for="mobilenumber">تلفن همراه :</label>
                                    <input value="{{$setting->mobile_number}}" name="mobile_number" type="text" class="form-control hi-input-simple" id="mobilenumber">
                                </div>

                                <div class="col-3 pr-5">
                                    <label for="mobilenumber2">تلفن همراه ۲ :</label>
                                    <input value="{{$setting->mobile_number2}}" name="mobile_number2" type="text" class="form-control hi-input-simple" id="mobilenumber2">
                                </div>
                            </div>

                            {{--==========[ Row of Informations about site ]========= --}}
                            <div class="row rowOfInputs mt-3" >
                                <div class="col-6 pl-5">
                                    <label for="email">پست الکترونیکی  :</label>
                                    <input value="{{$setting->email}}" name="email" type="text" class="form-control hi-input-simple" id="email">
                                </div>

                                <div class="col-6 pr-5">
                                    <label for="address">آدرس :</label>
                                    <input value="{{$setting->address}}" name="address" type="text" class="form-control hi-input-simple" id="address">
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
                                    <input value="{{$setting->telegram}}" name="telegram" type="text" class="form-control hi-input-simple" id="telegram">
                                </div>

                                <div class="col-3 pl-5">
                                    <label for="instagram">اینستاگرام :</label>
                                    <input value="{{$setting->instagram}}" name="instagram" type="text" class="form-control hi-input-simple" id="instagram">
                                </div>

                                <div class="col-3 pr-5">
                                    <label for="facebook">فیسبوک :</label>
                                    <input value="{{$setting->facebook}}" name="facebook" type="text" class="form-control hi-input-simple" id="facebook">
                                </div>

                                <div class="col-3 pr-5">
                                    <label for="linkedin">لینکدین :</label>
                                    <input value="{{$setting->linkedin}}" name="linkedin" type="text" class="form-control hi-input-simple" id="linkedin">
                                </div>
                            </div>

                            {{--==========[ Row of Informations about site ]========= --}}
                            <div class="row rowOfInputs mt-3" >
                                <div class="col-3 pl-5">
                                    <label for="aparat">آپارات :</label>
                                    <input value="{{$setting->aparat}}" name="aparat" type="text" class="form-control hi-input-simple" id="aparat">
                                </div>

                                <div class="col-3 pl-5">
                                    <label for="twitter">توییتر :</label>
                                    <input value="{{$setting->twitter}}" name="twitter" type="text" class="form-control hi-input-simple" id="twitter">
                                </div>

                            </div>


                        </div>
                    </div>

                    <div class="rulesAndGuidesInfo text-right mt-5">
                        <label for="contactInfo"><b>: قوانین و مقررات</b></label><br>
                        <textarea name="terms" id="contactInfo" class="rulesAndGuidesInfo_textarea hi-shadow-1">{{$setting->terms}}</textarea>
                        <br>
                        <label for="siteInfo" class="mt-3"><b>: راهنما</b></label><br>
                        <textarea name="guide" id="siteInfo" class="rulesAndGuidesInfo_textarea hi-shadow-1">{{$setting->guide}}</textarea>
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

{{--@section('js_resources')--}}
    {{--<script src="{{ asset('Hi_Framework/javascript/other/dropzone.js') }}"></script>--}}

{{--@endsection--}}

@section('javascript')
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
