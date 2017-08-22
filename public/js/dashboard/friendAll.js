/*==========> get the category form after clicking singleDelete button              and send an ajax request to CategoryController@destroy <=========*/$('.singleDestroy').click(function (event) {    event.preventDefault();    var singleDeleteUrl = this.action;    var dataArray = $(this).serializeArray();    $.ajax({        type: "POST",        url: singleDeleteUrl,        data: dataArray    }).success(function (data) {        $('#loadFriends').html(data);        ShowNotification('سایت دوست پاک شد');    }).fail(function () {        ShowNotification('لطفا دوباره تلاش کنید');    });    window.history.pushState("", "", "/friends");});/*==========> get the category form after clicking singleDelete button              and send an ajax request to CategoryController@destroy <=========*//*==========> get the csrf token of multi delete button form <=========*/var token = $('#deleteForm').find('input[name=_token]').val();var csrf = {    name: '_token',    value: token};/*==========> get the csrf token of multi delete button form <=========*//*==========> get the selected categories to be deleted <=========*/var checkboxes = [];var selectedFriends = {};$('input[type=checkbox]').click(function () {    var checkedId = this.id;    if(this.checked){        checkboxes.push(checkedId);    }else{        $.each(checkboxes, function (index, value) {            if(checkedId === value){                checkboxes.splice(index, 1);            }        });    }    selectedFriends = {        name: 'ids',        value: checkboxes    };});/*==========> get the selected categories to be deleted <=========*//*==========> send a POST request to delete selected              categories using CategoryController@multiDestroy <=========*/$('#multiDestroy').click(function (event) {    event.preventDefault();    $.ajax({        type: "POST",        url: "/friends/multiDestroy",        data: [            csrf, selectedFriends        ]    }).success(function (data) {        $('#loadFriends').html(data);        ShowNotification('دوست (ها) پاک شدند');    }).fail(function () {        ShowNotification('یک یا چند دوست انتخاب کنید');    });    window.history.pushState("", "", "/friends");});/*==========> send a POST request to delete selected              categories using CategoryController@multiDestroy <=========*/$('.edit').click(function (event) {    event.preventDefault();    var editFriendUrl = this.href;    var editForm = $('#editForm');    $.ajax({        type: "GET",        url: editFriendUrl    }).success(function (data) {        editForm.attr('action', '/friends/' + JSON.parse(data).id);        $('#create-div').fadeOut();        $('#edit-div').fadeIn();        editForm.find('input[name=site_name]').val(JSON.parse(data).site_name);        editForm.find('input[name=address]').val(JSON.parse(data).address);        ShowNotification('سایت دوست آماده ویرایش می باشد');    }).fail(function () {        ShowNotification('دوباره تلاش کنید');    });});