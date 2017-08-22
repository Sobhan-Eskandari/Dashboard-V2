@extends('layouts.main')

@section('css_resources')
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
@endsection

@section('search')
    <div class="hi-search-1">
        {!! Form::open(['method'=>'GET', 'action'=>'FaqController@index']) !!}
            {!! Form::text('query', isset($_GET['query'])? $_GET['query'] : '', ['class' => 'hi-search_field', 'placeholder'=>'جست و جو کنید...', 'id'=>'search']) !!}
            <button class="hi-button-btn1 pull-left" id="loading"><i class="fa fa-search white-text hi-fontSize-19" aria-hidden="true"></i></button>
        {!! Form::close() !!}
    </div>
@endsection

@section('breadcrumb')
    @component('components.Breadcrumb')
        <li><a href="{{ route('home') }}">داشبورد</a></li>
        <li><a href="{{ route('settings.index') }}">تنظیمات</a></li>
        <li><a class="breadcrumb_currentPage" href="{{ route('faqs.index') }}">سوالات متداول</a></li>
    @endcomponent
@endsection

@section('content')

    <nav dir="rtl">
        @component('components.errors') @endcomponent
        @component('components.flash') @endcomponent
    </nav>

    <div class="row FAQBox_direction">
        <div class="col-6" id="create-div">
            {!! Form::open(['method'=>'POST', 'action'=>'FaqController@store', 'id'=>'createForm']) !!}
                <div class="row">
                    <label>متن سوال را وارد کنید:</label>
                    {!! Form::text('question', null, ['class' => 'form-control FAQInput']) !!}
                </div>
                <br>
                <div class="row">
                    <label>متن جواب را وراد کنید:</label>
                    {!! Form::textarea('answer', null, ['class'=>'form-control', 'rows'=>'6', 'id'=>'answer']) !!}
                    <script>
                        CKEDITOR.replace('answer', {
                            filebrowserUploadUrl : '{{ route('posts.imageUpload') }}',
                            filebrowserImageUploadUrl : '{{ route('posts.imageUpload') }}'
                        });
                    </script>
                </div>
                <button class="btn hi-whiteCategoryDashboardBox_button light-blue darken-2 pull-right mt-4 py-2 px-1 hi-fontSize-16" id="create-submit"
                        type="submit">تایید</button>
            {!! Form::close() !!}
        </div>

        <div class="col-6" id="edit-div" style="display: none">
            {!! Form::open(['method'=>'PUT', 'id'=>'editForm']) !!}
            <div class="row">
                <label>متن سوال را وارد کنید:</label>
                {!! Form::text('question', null, ['class' => 'form-control FAQInput']) !!}
            </div>
            <br>
            <div class="row">
                <label>متن جواب را وراد کنید:</label>
                {!! Form::textarea('answer', null, ['class'=>'form-control', 'rows'=>'6', 'id'=>'answerEdit']) !!}
                <script>
                    CKEDITOR.replace('answerEdit', {
                        filebrowserUploadUrl : '{{ route('posts.imageUpload') }}',
                        filebrowserImageUploadUrl : '{{ route('posts.imageUpload') }}'
                    });
                </script>
            </div>
            <button class="btn hi-whiteCategoryDashboardBox_button light-blue darken-2 pull-right mt-4 py-2 px-1 hi-fontSize-16" id="edit-submit"
                    type="submit">ویرایش</button>
            {!! Form::close() !!}
        </div>

        <div class="col-6">
            <div class="card" id="loadFaqs">
                @include('includes.AllFaqs')
            </div>
        </div>
    </div>

@endsection

@section('javascript')
    <script src="{{ asset('js/dashboard/faqIndex.js') }}"></script>
@endsection