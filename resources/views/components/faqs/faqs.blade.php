<div class="row">
    <div class="col-1 pr-1 pt-3">
        <label class='FAQ_card-block_square-checkbox'>
            <input id="{{ $id }}" type='checkbox' class="pull-right">
            <span></span>
        </label>
    </div>
    <div class="col-11">
        <div class="row pl-4">
            <p class="FAQ_card_card-block_redBorder px-3 py-2">
                <span>{{ $question }} </span>
                <span class="FAQ_card_card-block_lightText"> {{ $created_at }}&nbsp;|&nbsp;توسط : {{ $created_by }}</span>
                <span>
                    <span class="btn-group">
                        <button type="button" class="btn btn-danger btn-sm p-0 dropDownSettingFAQ" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                        </button>
                        <span class="dropdown-menu dropSubDownSettingFAQ p-0 mr-5">
                            <a class="dropdown-item px-0 edit" href="{{ route('faqs.edit', $id) }}">ویرایش</a>
                            {!! Form::open(['method'=>'DELETE', 'action'=>['FaqController@destroy', $id], 'class'=>'singleDestroy']) !!}
                                {!! Form::submit('حذف', ['id'=>'delete', 'style' => 'background: none; border: none;']) !!}
                            {!! Form::close() !!}
                            {{--<a class="dropdown-item px-0" href="#">حذف</a>--}}
                        </span>
                    </span>
                </span>
            </p>
        </div>
        <div class="row pl-4">
            <p class="FAQ_card_card-block_blueBorder px-3 py-2">{{ $answer }}</p>
        </div>
    </div>
</div>