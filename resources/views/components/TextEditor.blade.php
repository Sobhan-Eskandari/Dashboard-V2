<div class="row pr-0">
    <div class="col-6 pr-0 pt-3">
        <label class="pull-right createPostLabel">
            {{$textEditorLabel}}
        </label>
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
    @if(isset($name))
        <textarea name="{{$name}}" class="form-control writeCreatePostBox" rows="10">@if(isset($value)){!! $value !!}@endif</textarea>
    @endif
</div>
<script>
    CKEDITOR.replace('postText');
</script>