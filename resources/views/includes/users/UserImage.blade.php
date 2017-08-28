
    <div class="hi-profileCard_PictureSelectorBox_pictureBox_hover" >
    <figure data-toggle="modal" data-target="#galleryModal">
    <img src="{{ isset($photo) ? asset('photos/'.$photo->name):asset('images/nobody_m.original.jpg') }}"
         class="hi-profileCard_PictureSelectorBox_picture img-fluid"
         alt="Responsive image" data-id="userPhoto">
    </figure>
    </div>
    {!! Form::text('avatar',isset($photo)?$photo->id:'',['readonly','id'=>'avatar','hidden']) !!}
