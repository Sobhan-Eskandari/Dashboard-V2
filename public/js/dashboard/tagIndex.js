/**
 * Created by Nima on 8/8/2017.
 */
var collect ={};
$('#searchTag').keyup(function(e){
    collect['query'] = $('#searchTag').val();
    if(collect['query'].length >=3 || e.keyCode===8){
        $.ajax({
            url: '/tags',
            data: collect
        }).done(function (data) {
            $('#boxOfTags').html(data);
            if(collect['query']==""){
                window.history.pushState("", ""," /tags");
            }else{
                window.history.pushState(data, ""," /tags?query="+collect['query']);
            }
        }).fail(function () {
            alert('Articles could not be loaded.');
        });
    }
});