@foreach($photos as $photo)    <div class="col-2 text-center">        <div class="pure-radiobutton mt-2 mr-2">            <input id="photo{{ $photo->id }}" name="photo" type="radio" class="selectedPhoto">            <label for="photo{{ $photo->id }}">                <img class="rounded img-fluid my-3" src="{{ asset('gallery' . '/' . $photo->name) }}">            </label>        </div>    </div>@endforeach<script src="{{ asset('js/dashboard/CreatePostIndex.js') }}"></script>