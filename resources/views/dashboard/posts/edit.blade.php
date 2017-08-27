@extends('layouts.main')

@section('breadcrumb')
    @component('components.Breadcrumb')
        <li><a href="{{ route('home') }}">داشبورد</a></li>
        <li><a href="#">پست ها</a></li>
        <li><a href="{{ route('posts.index') }}">همه پست ها</a></li>
        <li><a class="breadcrumb_currentPage" href="{{ route('posts.edit', $post->id) }}">ویرایش پست ({{ $post->title }})</a></li>
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
        @component('components.errors.errors') @endcomponent
    </nav>

    <div class="row hi-createPostBox">
        <div class="col-8">
            {!! Form::model($post , ['method'=>'PUT', 'action'=>['PostController@update', $post->id], 'id'=>'createPostForm', 'files' => true]) !!}
                <div class="row">
                    <div class="form-group makeCreatePostTitleBox">
                        {!! Form::label('title', 'ایجاد پست جدید', ['class' => 'createPostLabel']) !!}
                        {!! Form::text('title', null, ['class' => 'form-control makeCreatePostTitle', 'placeholder'=>'عنوان پست را وارد کنید']) !!}
                    </div>
                </div>
                <br>
                <div class="row">
                    {{--============[ Right box without image ]===========--}}
                    <div class="col-10">
                        <div class="row pr-0">
                            <div class="col-6 pr-0 pt-3">
                                {!! Form::label('body', 'متن پست را وارد کنید:', ['class' => 'pull-right createPostLabel']) !!}
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
                            {!! Form::textarea('body', null, ['class'=>'form-control writeCreatePostBox', 'rows'=>'10']) !!}
                        </div>
                        <script>
                            CKEDITOR.replace('body', {
                                filebrowserUploadUrl : '{{ route('posts.imageUpload') }}',
                                filebrowserImageUploadUrl : '{{ route('posts.imageUpload') }}'
                            });
                        </script>
                        <br>

                        {!! Form::text('selectedCategories', $selectedCategories, ['style' => 'display: none;']) !!}
                        {!! Form::text('selectedTags', $selectedTags, ['style' => 'display: none;']) !!}
                        {!! Form::text('draft', null, ['style' => 'display: none;']) !!}
                        @if(is_null($indexPhoto))
                            {!! Form::text('indexPhoto', null, ['style' => 'display: none;']) !!}
                        @else
                            {!! Form::text('indexPhoto', $indexPhoto[0]->id, ['style' => 'display: none;']) !!}
                        @endif

                        <div class="row">
                            {!! Form::submit('ویرایش و انتشار', ['class'=>'btn btn-primary createPostPublicationButton px-4 light-blue darken-2', 'id'=>'releaseButton']) !!}
                            &nbsp;
                            {!! Form::submit('ویرایش و پیش نویس کن', ['class'=>'btn btn-primary createPostPublicationButton px-4 light-blue darken-2', 'id'=>'draftButton']) !!}
                        </div>
                    </div>
                    {{--============[ image box ]===========--}}
                    <div class="col-2 pr-0">
                        <br><br>
                        @if(is_null($indexPhoto))
                            <img src="{{asset('images/nobody_m.original.jpg')}}" alt="در حال بارگذاری عکس" class="createPostImage mr-2" id="indexPhoto">
                        @else
                            <img src="{{asset('photoGallery' . '/' . $indexPhoto[0]->name)}}" alt="در حال بارگذاری عکس" class="createPostImage mr-2" id="indexPhoto">
                        @endif
                    </div>
                </div>
            {!! Form::close() !!}
        </div>

        <div class="col-4 mt-1">
            <br>
            <div class="row">
                <ul class="list-group hi-infoPostListGroup">
                    <li class="list-group-item justify-content-between pl-4 pr-3 flip py-2" id="hi-infoPostListGroupFlip">
                        اطلاعات پست
                        <i class="fa fa-caret-down pull-left" aria-hidden="true"></i>
                    </li>
                    <div id="hi-infoPostListGroupPanel" class="panel">
                        <li class="list-group-item justify-content-between list-group-item_border">
                            <button class="btn btn-secondary btn-secondary-postInfo btn-sm active p-2">پیش نویس</button>
                            <button class="btn btn-secondary btn-secondary-postInfo btn-sm active p-2">پیش نمایش</button>
                        </li>
                        <li class="list-group-item"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp; {{ $post->views }} بازدید</li>
                        <li class="list-group-item"><i class="fa fa-comments" aria-hidden="true"></i>&nbsp;{{ count($post->comments) }} نظر</li>
                        <li class="list-group-item"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;{{ $post->created_at->format('y/m/d') }}</li>
                        <li class="list-group-item">ایجاد شده توسط : {{ $post->creator->full_name }}</li>
                        <li class="list-group-item">تعداد ویرایش&nbsp;<span class="badge badge-pill badge-default">{{ $post->revisions }}</span></li>
                        <li class="list-group-item">آخرین ویرایش : {{ $post->updated_at->format('y/m/d') }} - {{ $post->updater->full_name }}</li>
                    </div>
                </ul>
            </div>
            <br>

            <div class="row">
                @component('components.posts.CreatePostLeftSidebar')
                    @slot('title') دسته بندی ها @endslot
                    @slot('list')
                        <div id="postCategories">
                            @include('includes.posts.PostCategoriesEdit')
                        </div>
                    @endslot
                    @slot('search_form')
                        {!! Form::open(['method'=>'GET', 'action'=>'CategoryController@index']) !!}
                            {!! Form::text('query', null, ['class' => 'form-control searchFormListGroup mr-2 pb-1 hi-fontSize-13', 'placeholder'=>'جست و جو کنید', 'id'=>'categorySearch']) !!}
                        {!! Form::close() !!}
                    @endslot
                    @slot('create_form')
                        {!! Form::open(['method'=>'POST', 'action'=>'CategoryController@store', 'class'=>'form-inline TodoWidget l-ltr', 'id'=>'createCategoryForm']) !!}
                            <div class="input-group" id="addTodo">
                                <button type="submit" id="categorySubmit"><img class="img-fluid" src="{{asset('images/Add-icone.png')}}"></button>
                                {!! Form::text('name', null, ['class' => 'form-control', 'id'=>'todoText', 'placeholder'=>'دسته بندی جدید']) !!}
                            </div>
                        {!! Form::close() !!}
                    @endslot
                @endcomponent
            </div>

            <br>

            <div class="row">
                @component('components.posts.CreatePostLeftSidebar')
                    @slot('title') برچسب ها @endslot
                    @slot('list')
                        <div id="postTags">
                            @include('includes.posts.PostTagsEdit')
                        </div>
                    @endslot
                    @slot('search_form')
                        {!! Form::open(['method'=>'GET', 'action'=>'tagController@index']) !!}
                            {!! Form::text('query', null, ['class' => 'form-control searchFormListGroup mr-2 pb-1 hi-fontSize-13', 'placeholder'=>'جست و جو کنید', 'id'=>'tagSearch']) !!}
                        {!! Form::close() !!}
                    @endslot
                    @slot('create_form')
                        {!! Form::open(['method'=>'POST', 'action'=>'tagController@store', 'class'=>'form-inline TodoWidget l-ltr', 'id'=>'createTagForm']) !!}
                            <div class="input-group" id="addTodo">
                                <button type="submit" id="tagSubmit"><img class="img-fluid" src="{{asset('images/Add-icone.png')}}"></button>
                                {!! Form::text('name', null, ['class' => 'form-control', 'id'=>'todoText', 'placeholder'=>'برچسب جدید']) !!}
                            </div>
                        {!! Form::close() !!}
                    @endslot
                @endcomponent
            </div>


        </div>
    </div>


@endsection

@section('javascript')
    <script src="{{ asset('js/dashboard/EditPostIndex.js') }}"></script>
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

//                    window.history.pushState("", "", "http://dashboard.dev/test");
                });
            }
        };
    </script>
@endsection