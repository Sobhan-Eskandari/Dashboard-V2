<div class="card hi-aboutMePanelCard">
    <div class="card-header hi-aboutMePanelCard_card-header {{$header_color}}">
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
                <h5>{{$cardSubject}}</h5>
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