@extends('layouts.main')

@section('breadcrumb')
    @component('components.Breadcrumb')
        <li><a href="{{ route('home') }}">داشبورد</a></li>
        <li><a href="#">مدیران</a></li>
        <li><a href="{{ route('admins.index') }}">همه مدیران</a></li>
        <li><a class="breadcrumb_currentPage" href="{{ route('admins.edit', $admin->id) }}">ویرایش مدیر ({{ $admin->full_name }})</a></li>
    @endcomponent
@endsection

@section('css_resources')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.css">
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


    <div class="row">
        <div class="col hi-subjectDashboardAdminProfile text-right">
            <h5 class="hi-subjectDashboardAdminProfile_h5">تاریخ ثبت نام {{ $admin->create_date() }}<span> &nbsp;|&nbsp; </span>تاریخ آخرین ویرایش
                اطلاعات : {{ $admin->update_date() }}</h5>
        </div>
    </div>
    {!! Form::model($admin , ['method'=>'PUT', 'action'=>['UserController@adminUpdate', $admin->id], 'files' => true, 'id'=>'form']) !!}
        <div class="row">
            <div class="col-8 mt-3">
                <div class="card hi-aboutMePanelCard">
                    <div class="card-header hi-aboutMePanelCard_card-header cyan darken-4">
                        &nbsp;
                    </div>
                    <div class="card-block pl-4 text-right">
                        <div class="row pl-2">
                            <div class="col-3">
                                <div class="row">
                                    <div class="form-group pl-2">
                                        <label for="hi-aboutMePanelCard_input" class="hi-aboutMePanelCard_label">: نام</label>
                                        {!! Form::text('first_name', null, ['class' => 'form-control hi-aboutMePanelCard_input', 'placeholder' => 'نام', 'tabindex' => '2']) !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group pl-2">
                                        <label for="hi-aboutMePanelCard_input" class="hi-aboutMePanelCard_label">:نام خانوادگی </label>
                                        {!! Form::text('last_name', null, ['class' => 'form-control hi-aboutMePanelCard_input', 'placeholder' => 'نام خانوادگی', 'tabindex' => '3']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-9">
                                <h5>: درباره</h5>
                                <div class="form-group">
                                    {!! Form::textarea('about', null, ['class'=>'form-control hi-aboutMePanelCard_textarea', 'tabindex'=>'1', 'placeholder'=>'چیزی درباره خود بنویسید']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="hi-aboutMePanelCard_input" class="hi-aboutMePanelCard_label">:ایمیل</label>
                                    {!! Form::email('email', null, ['class' => 'form-control hi-aboutMePanelCard_input text-left', 'placeholder'=>'you@example.com', 'tabindex'=>'6']) !!}
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group">
                                    <label for="hi-aboutMePanelCard_input" class="hi-aboutMePanelCard_label">:تلفن ثابت</label>
                                    {!! Form::text('land_line', null, ['class' => 'form-control hi-aboutMePanelCard_input', 'placeholder' => '01333445566', 'tabindex' => '5']) !!}
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="hi-aboutMePanelCard_input" class="hi-aboutMePanelCard_label">:تلفن همراه</label>
                                    {!! Form::text('mobile', null, ['class' => 'form-control hi-aboutMePanelCard_input text-left', 'placeholder' => '09112223344', 'tabindex' => '4']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="hi-aboutMePanelCard_input" class="hi-aboutMePanelCard_label">:آدرس</label>
                                    {!! Form::text('address', null, ['class' => 'form-control hi-aboutMePanelCard_input', 'placeholder' => 'آدرس خود را وارد کنید', 'tabindex' => '9']) !!}
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="hi-aboutMePanelCard_input" class="hi-aboutMePanelCard_label">:کد پستی</label>
                                    {!! Form::text('zip', null, ['class' => 'form-control hi-aboutMePanelCard_input', 'placeholder' => 'کد پستی ده رقمی', 'tabindex' => '8']) !!}
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group">
                                    <label for="hi-aboutMePanelCard_input" class="hi-aboutMePanelCard_label">:شغل</label>
                                    {!! Form::text('occupation', null, ['class' => 'form-control hi-aboutMePanelCard_input', 'placeholder' => 'شغل شما', 'tabindex' => '7']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-4 mt-3">
                <div class="card hi-profileCard">
                    <div class="card-header hi-profileCard_cardHeader cyan darken-4">
                        &nbsp;
                    </div>

                    <div class="hi-profileCard_PictureSelectorBox">
                        <div class="row">
                            <div class="col-4 pr-0 pt-5">
                                <div class="hi-profileCard_PictureSelectorBox_selector mt-4">
                                    {!! Form::select('gender',['1' => 'مرد', '0' => 'زن'], null, ['class'=>'dropdown', 'data-settings'=>'{"wrapperClass":"metro"}']) !!}
                                </div>
                            </div>
                            {{-- profile pic upload - start --}}

                            <div class="col-4 px-2 hi-profileCard_PictureSelectorBox_pictureBox">
                                <div class="hi-profileCard_PictureSelectorBox_pictureBox_hover">
                                    @if(isset($admin->photos[0]->name))
                                        {!! Form::text('indexPhoto', $admin->photos[0]->id, ['style' => 'display: none;']) !!}
                                    @else
                                        {!! Form::text('indexPhoto', null, ['style' => 'display: none;']) !!}
                                    @endif
                                    <figure data-toggle="modal" data-target="#galleryModal">
                                        @if(isset($admin->photos[0]->name))
                                            <img src="{{ asset('gallery' . '/' . $admin->photos[0]->name) }}"
                                                 class="hi-profileCard_PictureSelectorBox_picture img-fluid"
                                                 alt="Responsive image"
                                                 id="indexPhoto">
                                        @else
                                            <img src="{{ asset('images/nobody_m.original.jpg') }}"
                                                 class="hi-profileCard_PictureSelectorBox_picture img-fluid"
                                                 alt="Responsive image"
                                                 id="indexPhoto">
                                        @endif
                                    </figure>
                                </div>
                            </div>

                            {{-- profile pic upload - end --}}
                            <div class="col-4 pt-5">
                                <div class="hi-profileCard_PictureSelectorBox_selector hi-profileCard_PictureSelectorBox_selector_first mt-4">
{{--                                    {!! Form::select('role_id',$roles, null, ['class'=>'dropdown', 'data-settings'=>'{"wrapperClass":"metro"}']) !!}--}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-block pt-0 hi-profileCard_formBox pb-4">
                        <h4 class="card-title text-center">{{ $admin->full_name }}</h4>
                        <fieldset class="form-group px-3 pt-3">
                            <div class="form-group row">
                                {!! Form::text('user_name', null, ['class' => 'form-control text-center hi-profileCard_formBox_input', 'placeholder' => 'نام کاربری']) !!}
                            </div>
                            <div class="form-group row">
                                <input name="password" class="form-control text-center hi-profileCard_formBox_input" type="password" placeholder="رمز عبور">
                            </div>
                            <div class="form-group row">
                                <input name="password_confirmation" class="form-control text-center hi-profileCard_formBox_input" type="password" placeholder="تکرار رمز عبور">
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pr-5 mt-5">
            <div class="col-3 push-11">
                {!! Form::submit('ویرایش', ['class'=>'btn hi-confirmButtonDashboard light-blue darken-2']) !!}
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