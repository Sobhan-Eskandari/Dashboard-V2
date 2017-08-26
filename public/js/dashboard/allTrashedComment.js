var checkboxes;
$('input[type=checkbox]').change(function () {
    var val = [];
    $(':checkbox:checked').each(function(i){
        val[i] = $(this).val();
    });
    $('#deleteForm').find('input[name=ids]').val(val);
});

// $("#forceDestroyComment").click(function (e) {
//     e.preventDefault();
//     var query = $('#searchCmt').val();
//     var commentId = $("#forceDestroyComment").attr('data-id');
//     var CSRF_TOKEN =$("input[name*='_token']").val();
//     $.ajax({
//         type: 'DELETE',
//         url: '/comments-forceDelete/'+commentId,
//         data: {_token: CSRF_TOKEN,query:query}
//     }).done(function (data) {
//         $("#trash").html(data);
//         console.log('sddfsdf');
//         if(query === "") {
//             window.history.pushState("", "", "/comments-trash");
//         }else {
//             window.history.pushState(data, "Title", " /comments-trash?query=" + query);
//         }
//     }).fail(function () {
//     });
// });

// $("#restoreComment").click(function (e) {
//     e.preventDefault();
//     var query = $('#searchCmt').val();
//     var commentId = $("#restoreComment").attr('data-id');
//     var CSRF_TOKEN =$("input[name*='_token']").val();
//     $.ajax({
//         type: 'POST',
//         url: '/comments-restore/'+commentId,
//         data: {_token: CSRF_TOKEN,query:query}
//     }).done(function (data) {
//         $("#trash").html(data);
//         if(query === "") {
//             window.history.pushState("", "", "/comments-trash");
//         }else {
//             window.history.pushState(data, "Title", " /comments-trash?query=" + query);
//         }
//     }).fail(function () {
//     });
// });

//
// $('#forceMultiDestroy').click(function (e) {
//     e.preventDefault();
//     var query = $('#searchCmt').val();
//     var CSRF_TOKEN =$("input[name*='_token']").val();
//     $.ajax({
//         type: 'POST',
//         url: 'comments-multiForceDelete',
//         data: {_token: CSRF_TOKEN,query:query,checkboxes:checkboxes}
//     }).done(function (data) {
//         $("#trash").html(data);
//
//         if(query === "") {
//             window.history.pushState("", "", "/comments-trash");
//         }else {
//             window.history.pushState(data, "Title", " /comments-trash?query=" + query);
//         }
//     }).fail(function () {
//     });
//
// });