@extends('layouts.main')

@section('css_resources')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.css">
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
@endsection

@section('breadcrumb')
    @component('components.Breadcrumb')
        <li><a href="{{ route('home') }}">داشبورد</a></li>
        <li><a href="{{ route('sliders.index') }}">همه اسلایدرها</a></li>
        <li><a class="breadcrumb_currentPage" href="{{ route('sliders.edit', $slider->id) }}">ویرایش اسلاید</a></li>
    @endcomponent
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

    {!! Form::model($slider , ['method'=>'PUT', 'action'=>['SliderController@update', $slider->id], 'files' => true]) !!}
    <div class="row direction_create_slider">
        <div class="col-8 pull-right">
            <div class="row pr-0">
                <div class="col-6 pr-0 pt-3">
                    {!! Form::label('caption', 'متن اسلاید :', ['class' => 'pull-right createPostLabel']) !!}
                    <label class="pull-right createPostLabel"></label>
                </div>
                <div class="col-6 pl-0">
                    <button type="button" data-toggle="modal" data-target="#galleryModal" class="btn btn-primary pull-left mb-2 createPostAddFileButton">
                        <i class="fa fa-camera" aria-hidden="true"></i>
                        افزودن فایل
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <div class="row">
                {!! Form::textarea('caption', null, ['class'=>'form-control writeCreatePostBox', 'rows'=>'10']) !!}
            </div>
            <script>
                CKEDITOR.replace('caption', {
                    filebrowserUploadUrl : '{{ route('posts.imageUpload') }}',
                    filebrowserImageUploadUrl : '{{ route('posts.imageUpload') }}'
                });
            </script>
            @if(isset($slider->photos[0]->name))
                {!! Form::text('indexPhoto', $slider->photos[0]->id, ['style' => 'display: none;']) !!}
            @else
                {!! Form::text('indexPhoto', null, ['style' => 'display: none;']) !!}
            @endif
            <div class="col-2 pr-0">
                <br>
                @if(isset($slider->photos[0]->name))
                    <img src="{{ asset('gallery' . '/' . $slider->photos[0]->name) }}"
                         class="createPostImage mr-2"
                         alt="در حال بارگذاری عکس"
                         id="indexPhoto">
                @else
                    <img src="{{ asset('images/nobody_m.original.jpg') }}"
                         class="createPostImage mr-2"
                         alt="در حال بارگذاری عکس"
                         id="indexPhoto">
                @endif
            </div>
        </div>
    </div>
    {{--==========[ Submit Button ]========= --}}
    <div class="row">
        <div class="col-12 text-right mt-4 pr-0">
            <button class="btn btn-primary hi-shadow-1 px-4 light-blue darken-2">ویرایش</button>
        </div>
    </div>
    {!! Form::close() !!}

@endsection

@section('javascript')
    <script src="{{ asset('js/dashboard/CreateAdminUploadProfilePic.js') }}"></script>
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