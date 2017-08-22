<tr>
    <td style="{{ $style2 }}">

        <li class="hi-roundedDashboardTagsTable_tbody_tr_td_li text-right">
            <div class="pure-checkbox mt-2 mr-2">
                <input id="{{ $id }}" class="checkbox-{{ $id }}" onclick="selectCmntCheckbox(event)" name="{{ $id }}" type="checkbox">
                <label for="{{ $id }}">{{ $site_name }}</label>
            </div>
        </li>

    </td>
    <td class="hi-roundedDashboardTagsTable_tbody_tr_td_edit text-center"><a href="{{ route('friends.edit', $id) }}" class="edit">ویرایش</a></td>
    <td class="hi-roundedDashboardTagsTable_tbody_tr_td_edit text-center"><a target="_blank" href="{{ $address }}">باز کردن سایت</a></td>
    <td class="hi-roundedDashboardTagsTable_tbody_tr_td_delete text-left pl-4" style="{{ $style3 }}">
        {!! Form::open(['method'=>'DELETE', 'action'=>['FriendController@destroy', $id], 'class'=>'singleDestroy']) !!}
            {!! Form::submit('حذف', ['id'=>'single-' . $id ,'style' => 'background: none; border: none; color: #b32e2e; font-weight: bold;']) !!}
        {!! Form::close() !!}
    </td>
</tr>