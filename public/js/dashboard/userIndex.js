/**
 * Created by Nima on 8/8/2017.
 */
var collect = {};
$('#searchUser').keyup(function (e) {
    collect['query'] = $('#searchUser').val();
    if(collect['query'].length >=3 || e.keyCode===8){
        $.ajax({
            url: '/users',
            data: collect
        }).done(function (data) {
            console.log(data);
            $('#user').html(data);
            if(collect['query'] === "") {
                window.history.pushState("", "", "/users");
            }else {
                window.history.pushState(data, "Title", " /users?query=" + collect['query']);
            }
        }).fail(function () {
            alert('Users could not be loaded.');
        });
    }
});