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

var checkboxes = [];

$('input[type=checkbox]').click(function () {
    var checkedId = this.id;
    if(this.checked){
        checkboxes.push(checkedId);
    }else{
        $.each(checkboxes, function (index, value) {
            if(checkedId === value){
                checkboxes.splice(index, 1);
            }
        });
    }
    $('#deleteForm').find('input[name=ids]').val(checkboxes);
});