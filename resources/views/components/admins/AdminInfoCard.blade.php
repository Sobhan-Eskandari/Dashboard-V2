<div class="card hi-profileCard">
    <div class="card-header hi-profileCard_cardHeader {{$header_color}}">
        &nbsp;
    </div>
    <div class="hi-profileCard_PictureSelectorBox">
        <div class="row">
            <div class="col-4 pr-0 pt-5">
                <div class="hi-profileCard_PictureSelectorBox_selector mt-4">
{{--                    {!! Form::select('tags[]',$tags, null, ['class'=>'selectpicker', 'multiple data-done-button'=>'true', 'data-live-search'=>'true']) !!}--}}
                    <select class="dropdown " data-settings='{"wrapperClass":"metro"}'>
                        <option value="1" selected>مرد</option>
                        <option value="0">زن</option>
                    </select>
                </div>
            </div>
            <div class="col-4 px-2 hi-profileCard_PictureSelectorBox_pictureBox">
                <div class="hi-profileCard_PictureSelectorBox_pictureBox_hover">
                    <figure>
                        <img src="{{ asset('images/nobody_m.original.jpg') }}"
                             class="hi-profileCard_PictureSelectorBox_picture img-fluid"
                             alt="Responsive image"></figure>
                </div>
            </div>
            <div class="col-4 pt-5">
                <div class="hi-profileCard_PictureSelectorBox_selector hi-profileCard_PictureSelectorBox_selector_first mt-4">
                    {{--{!! Form::select('role',$roles, null, ['class'=>'dropdown', 'data-settings'=>'{"wrapperClass":"metro"}']) !!}--}}
                    {{--<select class="dropdown" data-settings='{"wrapperClass":"metro"}'>--}}
                        {{--<option value="1">ادمین اصلی</option>--}}
                        {{--<option value="2">ادمین دوم</option>--}}
                        {{--<option value="3">ادمین سوم</option>--}}
                        {{--<option value="4">ادمین چهارم</option>--}}
                        {{--<option value="5">ادمین پنجم</option>--}}
                    {{--</select>--}}
                </div>
            </div>


        </div>
    </div>
    <div class="card-block pt-0 hi-profileCard_formBox pb-4">
        <h4 class="card-title text-center">{{$characterName}}</h4>
        <fieldset class="form-group px-3 pt-3">
            <div class="form-group row">
                {!! Form::text('user_name', null, ['class' => 'form-control text-center hi-profileCard_formBox_input', 'placeholder' => 'نام کاربری']) !!}
            </div>
            <div class="form-group row">
                <input name="password" class="form-control text-center hi-profileCard_formBox_input" type="password"
                       value="" placeholder="رمز عبور">
            </div>
            <div class="form-group row">
                <input name="password_confirm" class="form-control text-center hi-profileCard_formBox_input" type="password"
                       value="" placeholder="تکرار رمز عبور">
            </div>
        </fieldset>
    </div>
</div>