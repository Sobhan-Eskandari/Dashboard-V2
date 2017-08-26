var collect = {};

$('#searchCmt').keyup(function (event) {

    collect['query'] = $('#searchCmt').val();
    if(collect['query'].length >=3 || event.keyCode===8){
        $.ajax({
            url: '/comments',
            dataType: 'text',
            data: collect
        }).done(function (data) {
            $('#categories').html(data);
            window.history.pushState(data, "Title"," /comments?query="+collect['query']);
        }).fail(function () {
            alert('Articles could not be loaded.');
        });
    }
});