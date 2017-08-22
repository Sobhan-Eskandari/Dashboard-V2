/**
 * Created by Nima on 8/13/2017.
 */
var checkboxes;
$('input[type=checkbox]').change(function () {
    var val = [];
    $(':checkbox:checked').each(function(i){
        val[i] = $(this).val();
    });
    checkboxes = val;
});
//    console.log(checkboxes);

$("#forceDestroyComment").click(function (e) {
    e.preventDefault();
    var query = $('#searchCmt').val();
//            console.log(query);
    var commentId = $("#forceDestroyComment").attr('data-id');
//        console.log(commentId);
    var CSRF_TOKEN =$("input[name*='_token']").val();
    $.ajax({
        type: 'DELETE',
        url: '/comments-forceDelete/'+commentId,
        data: {_token: CSRF_TOKEN,query:query}
    }).done(function (data) {
        $("#trash").html(data);
        console.log('sddfsdf');
        if(query === "") {
            window.history.pushState("", "", "http://dash.dev/comments-trash");
        }else {
            window.history.pushState(data, "Title", " /comments-trash?query=" + query);
        }
    }).fail(function () {
    });
});
$("#restoreComment").click(function (e) {
    e.preventDefault();
    var query = $('#searchCmt').val();
//            console.log(query);
    var commentId = $("#restoreComment").attr('data-id');
//        console.log(commentId);
    var CSRF_TOKEN =$("input[name*='_token']").val();
    $.ajax({
        type: 'POST',
        url: '/comments-restore/'+commentId,
        data: {_token: CSRF_TOKEN,query:query}
    }).done(function (data) {
        $("#trash").html(data);
        if(query === "") {
            window.history.pushState("", "", "http://dash.dev/comments-trash");
        }else {
            window.history.pushState(data, "Title", " /comments-trash?query=" + query);
        }
    }).fail(function () {
    });
});

$('#forceMultiDestroy').click(function (e) {
    e.preventDefault();
    var query = $('#searchCmt').val();
    var CSRF_TOKEN =$("input[name*='_token']").val();
    $.ajax({
        type: 'POST',
        url: 'comments-multiForceDelete',
        data: {_token: CSRF_TOKEN,query:query,checkboxes:checkboxes}
    }).done(function (data) {
        $("#trash").html(data);
//            console.log(query);
        if(query === "") {
            window.history.pushState("", "", "http://dash.dev/comments-trash");
        }else {
            window.history.pushState(data, "Title", " /comments-trash?query=" + query);
        }
    }).fail(function () {
    });
//            console.log(checkboxes);
});