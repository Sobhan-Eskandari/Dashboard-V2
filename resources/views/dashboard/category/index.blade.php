@extends('layouts.main')

@section('search')
    <div class="hi-search-1">
        {!! Form::open(['method'=>'GET', 'action'=>'CategoryController@index']) !!}
            {!! Form::text('query', isset($_GET['query'])? $_GET['query'] : '', ['class' => 'hi-search_field', 'placeholder'=>'جست و جو کنید...', 'id'=>'search']) !!}
            <button class="hi-button-btn1 pull-left" id="loading"><i class="fa fa-search white-text hi-fontSize-19" aria-hidden="true"></i></button>
        {!! Form::close() !!}
    </div>
@endsection

@section('breadcrumb')
    @component('components.Breadcrumb')
        <li><a href="{{ route('home') }}">داشبورد</a></li>
        <li><a href="{{ route('posts.index') }}">پست ها</a></li>
        <li><a class="breadcrumb_currentPage" href="{{ route('categories.index') }}">دسته بندی ها</a></li>
    @endcomponent
@endsection

@section('content')
    <div class="hi-whiteCategoryDashboardBox">

        <div class="row p-5">

            <div class="col-5 offset-1" id="loadCategories">
                @include('Includes.AllCategories')
            </div>

            <div class="col-4 offset-1 categoryRightDirection" id="create-div">
                {!! Form::open(['method'=>'POST', 'action'=>'CategoryController@store', 'id'=>'createForm']) !!}
                    <div class="row">
                        <div class="form-group">
                            <label for="hi-whiteCategoryDashboardBox_input"><h5>دسته بندی:</h5></label>
                            {!! Form::text('name', null, ['class' => 'form-control hi-whiteCategoryDashboardBox_input']) !!}
                        </div>
                    </div>
                    <div class="row pr-1 pl-0">
                        {!! Form::submit('ساخت', ['class'=>'btn hi-whiteCategoryDashboardBox_button light-blue darken-2', 'id' => 'submit']) !!}
                    </div>
                {!! Form::close() !!}
            </div>

            <div class="col-4 offset-1 categoryRightDirection" id="edit-div" style="display: none">
                {!! Form::open(['method'=>'PUT', 'id'=>'editForm']) !!}
                <div class="row">
                    <div class="form-group">
                        <label for="hi-whiteCategoryDashboardBox_input"><h5>دسته بندی:</h5></label>
                        {!! Form::text('name', null, ['class' => 'form-control hi-whiteCategoryDashboardBox_input']) !!}
                    </div>
                </div>
                <div class="row pr-1 pl-0">
                    {!! Form::submit('ویرایش', ['class'=>'btn hi-whiteCategoryDashboardBox_button light-blue darken-2', 'id' => 'edit-submit']) !!}
                </div>
                {!! Form::close() !!}
            </div>

        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('js/dashboard/categoryIndex.js') }}"></script>
@endsection


