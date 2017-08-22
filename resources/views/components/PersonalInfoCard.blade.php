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
                <h5>{{ $cardSubject }}</h5>
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
                    {!! Form::text('land_line', null, ['class' => 'form-control hi-aboutMePanelCard_input', 'placeholder' => 'کد پستی ده رقمی', 'tabindex' => '8']) !!}
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