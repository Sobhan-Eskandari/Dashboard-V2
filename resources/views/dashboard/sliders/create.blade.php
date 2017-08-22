@extends('layouts.main')

@section('css_resources')
    <script src="//cdn.ckeditor.com/4.6.1/full/ckeditor.js"></script>
@endsection

@section('gallery')
    @component('components.galleryModal')
        @slot('gallery')
            <div class="row gallery_files l-rtl gallery_uploadedImage" id="loadPhotos">
                @include('Includes.AllPhotos')
            </div>
        @endslot
    @endcomponent
@endsection

@section('content')
<form action="/sliders" method="post">
    {{csrf_field()}}
    <div class="row direction_create_slider">
        <div class="col-8 pull-right">
            @component('components.TextEditor')
                @slot('textEditorLabel')
                    متن اسلاید را وارد کنید:
                @endslot
                @slot('name')
                    caption
                @endslot
            @endcomponent
            {!! Form::text('indexPhoto', null, ['style' => 'display: none;']) !!}
        </div>
    </div>
    {{--==========[ Submit Button ]========= --}}
    <div class="row">
        <div class="col-12 text-right mt-4 pr-0">
            <button type="submit" class="btn btn-primary hi-shadow-1 px-4 light-blue darken-2">
                انتشار
            </button>
        </div>
    </div>
</form>

@endsection

@section('javascript')
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