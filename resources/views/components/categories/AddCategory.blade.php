{{--============[ Add Button with Textfield ]=========== --}}
<form class="form-inline TodoWidget l-ltr">
    <label class="sr-only" for="inlineFormInputGroup">new note</label>
    <div class="input-group" id="addTodo">
        <button type="submit" id="addTodo_addBtn"><img class="img-fluid" src="{{asset('images/Add-icone.png')}}"></button>
        <input type="text" class="form-control" id="todoText" placeholder="{{$btn_name}} جدید">
    </div>
</form>