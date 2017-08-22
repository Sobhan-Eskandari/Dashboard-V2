/**
 * Created by Nima on 8/8/2017.
 */
$( "button[id='forceDestroyUser']" ).click(function (e) {
    e.preventDefault();
    var userId = $(this).attr('data-id');
    var CSRF_TOKEN =$("input[name*='_token']").val();
//        console.log(commentId);
    $.ajax({
        type: 'DELETE',
        url: 'forceDelete/'+userId,
        data: {_token: CSRF_TOKEN}
    }).done(function (data) {
        $("#user").html(data);
        window.history.pushState("", "", "http://dash.dev/users/trash");
        notify(' حذف دائم کاریر انجام شد');
    }).fail(function () {
        notify(' حذف دائم کاریر انجام نشد');
    });
});

$( "button[id='restore']" ).click(function (e) {
    e.preventDefault();
    var userId = $(this).attr('data-id');
    var CSRF_TOKEN =$("input[name*='_token']").val();
//        console.log(commentId);
    $.ajax({
        type: 'POST',
        url: '/users/restore/'+userId,
        data: {_token: CSRF_TOKEN}
    }).done(function (data) {
        $("#user").html(data);
        window.history.pushState("", "", "http://dash.dev/users/trash");
        notify('بازگردانی شد');
    }).fail(function () {
        notify('بازگردانی انجام نشد دوباره تلاش کنید');
    });
});

var checkboxes;
$('input[type=checkbox]').change(function () {
    var val = [];
    $(':checkbox:checked').each(function(i){
        val[i] = $(this).val();
    });
    checkboxes = val;
});

$('#userForceMultiDestroy').click(function (e) {
    e.preventDefault();
    var CSRF_TOKEN =$("input[name*='_token']").val();
    $.ajax({
        type: 'POST',
        url: '/users/forceMultiDelete',
        data: {_token: CSRF_TOKEN,checkboxes:checkboxes}
    }).done(function (data) {
        $("#user").html(data);
        window.history.pushState("", "", "http://dash.dev/users/trash");
        notify(' حذف دائم کاریران انجام شد');
    }).fail(function () {
        notify(' حذف دائم کاریر انجام نشد');
    });
});