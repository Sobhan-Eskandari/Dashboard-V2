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

                <div class="card hi-aboutMePanelCard">
                    <div class="card-header hi-aboutMePanelCard_card-header blue-grey darken-1">
                        &nbsp;
                    </div>
                    <div class="card-block pl-4 text-right">
                        <div class="row pl-2">
                            <div class="col-3">
                                <div class="row">
                                    <div class="form-group pl-2">
                                        <label for="hi-aboutMePanelCard_input" class="hi-aboutMePanelCard_label">: نام</label>
                                        {!! Form::text('first_name',null,['placeholder'=>'نام','tabindex'=>'2','class'=>'form-control  hi-aboutMePanelCard_input']) !!}
                                        {{--<input class="form-control  hi-aboutMePanelCard_input" type="text"--}}
                                        {{--placeholder="نام" tabindex="2">--}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group pl-2">
                                        <label for="hi-aboutMePanelCard_input" class="hi-aboutMePanelCard_label">:نام خانوادگی </label>
                                        {!! Form::text('last_name',null,['placeholder'=>'نام خانوادگی','tabindex'=>'3','class'=>'form-control  hi-aboutMePanelCard_input']) !!}
                                        {{--<input class="form-control  hi-aboutMePanelCard_input" type="text"--}}
                                        {{--placeholder="نام خانوادگی" tabindex="3">--}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-9">
                                <h5> :درباره کاربر</h5>
                                <div class="form-group">
                                    {!! Form::textarea('description',null,['placeholder'=>'چیزی درباره خود بنویسید','tabindex'=>'1','class'=>'form-control hi-aboutMePanelCard_textarea']) !!}
                                    {{--<textarea class="form-control hi-aboutMePanelCard_textarea"--}}
                                    {{--placeholder="چیزی درباره خود بنویسید" tabindex="1"></textarea>--}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="hi-aboutMePanelCard_input" class="hi-aboutMePanelCard_label">:ایمیل</label>
                                    {!! Form::text('email',null,['placeholder'=>'example@gmail.com','tabindex'=>'6','class'=>'form-control  hi-aboutMePanelCard_input text-left']) !!}
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group">
                                    <label for="hi-aboutMePanelCard_input" class="hi-aboutMePanelCard_label">:تلفن ثابت</label>
                                    {!! Form::text('land_line',null,['placeholder'=>'با پیش شماره','tabindex'=>'5','class'=>'form-control  hi-aboutMePanelCard_input']) !!}
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="hi-aboutMePanelCard_input" class="hi-aboutMePanelCard_label">:تلفن همراه</label>
                                    {!! Form::text('mobile',null,['placeholder'=>'0911*******','tabindex'=>'4','class'=>'form-control  hi-aboutMePanelCard_input text-left']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="hi-aboutMePanelCard_input" class="hi-aboutMePanelCard_label">:آدرس</label>
                                    {!! Form::text('address',null,['placeholder'=>'آدرس خود را وارد کنید','tabindex'=>'9','class'=>'form-control  hi-aboutMePanelCard_input']) !!}
                                    {{--<input class="form-control  hi-aboutMePanelCard_input" type="text"--}}
                                    {{--placeholder=" آدرس خود را وارد کنید" tabindex="9">--}}
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="hi-aboutMePanelCard_input" class="hi-aboutMePanelCard_label">:کد پستی</label>
                                    {!! Form::text('zip',null,['placeholder'=>'کد پستی ده رقمی','tabindex'=>'8','class'=>'form-control  hi-aboutMePanelCard_input']) !!}
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group">
                                    <label for="hi-aboutMePanelCard_input" class="hi-aboutMePanelCard_label">:شغل</label>
                                    {!! Form::text('occupation',null,['placeholder'=>'شغل شما','tabindex'=>'7','class'=>'form-control  hi-aboutMePanelCard_input']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="col-4 mt-3">


                <div class="card hi-profileCard">
                    <div class="card-header hi-profileCard_cardHeader blue-grey darken-1">
                        &nbsp;
                    </div>
                    <div class="hi-profileCard_PictureSelectorBox">
                        <div class="row">
                            <div class="col-4 pr-0 pt-5">
                                <div class="hi-profileCard_PictureSelectorBox_selector mt-4">
                                    {!! Form::select('gender',['0'=>'جنسیت','1'=>'مرد','2'=>'زن'],null,['class'=>'dropdown','data-settings'=>'{"wrapperClass":"metro"}']) !!}
                                    {{--<select class="dropdown " data-settings='{"wrapperClass":"metro"}'>--}}
                                    {{--<option value="1">جنسیت</option>--}}
                                    {{--<option value="2">مرد</option>--}}
                                    {{--<option value="3">زن</option>--}}
                                    {{--</select>--}}
                                </div>
                            </div>

                            <div class="col-4 px-2 hi-profileCard_PictureSelectorBox_pictureBox" id="img">
                                <div class="hi-profileCard_PictureSelectorBox_pictureBox_hover" >
                                    <figure>
                                        <img src="{{ isset($user->photo[0]) ? asset('photoGallery/'.$user->photo[0]->name):asset('images/nobody_m.original.jpg') }}"
                                             class="hi-profileCard_PictureSelectorBox_picture img-fluid"
                                             alt="Responsive image" data-id=""></figure>
                                </div>

                            </div>
                            <div class="col-4 pt-5">
                                <div class="hi-profileCard_PictureSelectorBox_selector hi-profileCard_PictureSelectorBox_selector_first mt-4">
                                    <select class="dropdown" data-settings='{"wrapperClass":"metro"}'>
                                        <option value="1">ادمین اصلی</option>
                                        <option value="2">ادمین دوم</option>
                                        <option value="3">ادمین سوم</option>
                                        <option value="4">ادمین چهارم</option>
                                        <option value="5">ادمین پنجم</option>
                                    </select>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="card-block pt-0 hi-profileCard_formBox pb-4">
                        <h4 class="card-title text-center">{{$user->getFullNameAttribute()}}</h4>
                        <fieldset class="form-group px-3 pt-3">
                            <div class="form-group row">
                                {!! Form::text('user_name',null,['placeholder'=>'نام کاربری','tabindex'=>'7','class'=>'form-control text-center hi-profileCard_formBox_input']) !!}
                            </div>
                            <div class="form-group row">
                                {!! Form::password('password',null,['placeholder'=>'رمز عبور ','tabindex'=>'7','class'=>'form-control text-center hi-profileCard_formBox_input']) !!}
                                {{--<input class="form-control text-center hi-profileCard_formBox_input" type="password"--}}
                                {{--value="" placeholder="رمز عبور">--}}
                            </div>
                            <div class="form-group row">
                                <input class="form-control text-center hi-profileCard_formBox_input" type="password"
                                       value="" placeholder="تکرار رمز عبور">
                            </div>
                        </fieldset>
                    </div>
                </div>

            </div>
        </div>

    {!! Form::close() !!}
@endsection