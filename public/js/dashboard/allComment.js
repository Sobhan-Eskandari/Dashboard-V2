// $("#destroyComment").click(function (event) {
//     event.preventDefault();
//     var query = $('#searchCmt').val();
//     var commentId = $("#destroyComment").attr('data-id');
//     var CSRF_TOKEN =$("input[name*='_token']").val();
//     $.ajax({
//         type: 'DELETE',
//         url: '/comments/'+commentId,
//         data: {_token: CSRF_TOKEN,query:query}
//     }).done(function (data) {
//         $("#categories").html(data);
//         if(query === null) {
//             window.history.pushState("", "", "/comments");
//         }else {
//             window.history.pushState(data, "Title", " /comments?query=" + collect['query']);
//         }
//     }).fail(function () {
//     });
// });

// var checkboxes;

$('input[type=checkbox]').change(function () {
    var val = [];
    $(':checkbox:checked').each(function(i){
        val[i] = $(this).val();
    });
    // noinspection JSAnnotator
    $('#deleteForm').find('input[name=ids]').val(val);
});

// $('#multiDestroy').click(function (e) {
//     e.preventDefault();
//     var query = $('#searchCmt').val();
//     var CSRF_TOKEN =$("input[name*='_token']").val();
//     $.ajax({
//         type: 'POST',
//         url: 'comments/multiDestroy',
//         data: {_token: CSRF_TOKEN,query:query,checkboxes:checkboxes}
//     }).done(function (data) {
//         $("#categories").html(data);
//         if(query === null) {
//             window.history.pushState("", "", "/comments");
//         }else {
//             window.history.pushState(data, "Title", " /comments?query=" + collect['query']);
//         }
//     }).fail(function () {
//     });
//
// });