var selectedPhotoId = '';var selectedPhotoSrc = '';$('.selectedPhoto').click(function (event) {    selectedPhotoId = this.id.substring(5); // ignore "photo" string in the id    selectedPhotoSrc = $("label[for='"+ this.id +"']").find('img').attr('src');});$('#selectPhoto').click(function (event) {    $('#indexPhoto').attr('src', selectedPhotoSrc);    $("input[name=indexPhoto]").val(selectedPhotoId);});