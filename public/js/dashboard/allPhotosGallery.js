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
Dropzone.options.myAwesomeDropzone = {
    init: function() {
        this.on("success", function(file,response) {
            $('#photos').html(response);
            notify('عکس اپلود شد');
        });
        this.on("complete", function(file) {
            this.removeFile(file);
        });
    }
}
$('#multiDestroy').click(function (e) {
    e.preventDefault();
    var CSRF_TOKEN =$("input[name*='_token']").val();
    $.ajax({
        type: 'POST',
        url: '/gallery/photos/multiDelete',
        data: {_token: CSRF_TOKEN,checkboxes:checkboxes}
    }).done(function (data) {
        $("#photos").html(data);
        window.history.pushState("", "", "http://dash.dev/gallery/photos");
        notify('عکس ها پاک شدند');
    }).fail(function () {
    });
});
$('#selectPhoto').click(function () {
    closeModal();
    var CSRF_TOKEN =$("input[name*='_token']").val();
    $.ajax({
        type: 'POST',
        url: '/photo',
        data: {_token: CSRF_TOKEN,checkboxes:checkboxes}
    }).done(function (data) {
        console.log(data);
        $("#img").html(data);
    }).fail(function () {
    });
});
