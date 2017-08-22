@if($tags)
    @foreach($tags as $tag)
        <div class="tag tag_darkMode">
            <p class="tag__text">
                {{$tag->name}}
            </p>
            {!! Form::open(['method'=>'DELETE','action'=>['tagController@destroy',$tag->id]]) !!}
            <button class="tag__close hi-button-btn1 deleteTag mt-1" aria-hidden="true" id="deleteTag" data-id="{{$tag->id}}">
                <i class="fa fa-times white-text"></i>
            </button>
            {!! Form::close() !!}
        </div>

    @endforeach
@endif