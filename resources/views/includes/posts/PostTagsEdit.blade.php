@foreach($tags as $tag)    <li class="list-group-item justify-content-between ">        <label class='hi-categoryListGroup_li_square-checkbox'>            <input type='checkbox' class="pull-right" id="{{ $tag->id }}">            &nbsp;            <span>{{ $tag->name }}</span>        </label>        {!! Form::open(['method'=>'DELETE', 'action'=>['tagController@destroy', $tag->id], 'class'=>'tagSingleDestroy']) !!}            <button class="hi-button-btn1" type="submit"><i class="fa fa-times" aria-hidden="true"></i></button>        {!! Form::close() !!}    </li>@endforeach<script src="{{ asset('js/dashboard/EditPostInclude.js') }}"></script>