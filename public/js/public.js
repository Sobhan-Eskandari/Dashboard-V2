$(".panel").show();
$(document).ready(function () {

    $('.flip').click(function () {

        //-----------[ Open and close the menu bu toggling between isopen and isclose class ] ------------
        if ($(this).hasClass('is-open')){

            $(this).toggleClass('is-open is-close');
            $(this).closest('.menuDetector').next().find('.panel').slideUp();

        }else if($(this).hasClass('is-close')){

            $(this).toggleClass('is-close is-open');
            $(this).closest('.menuDetector').next().find('.panel').slideDown();
        }

    });

});

function closeModal() {
    $('#galleryModal').modal('hide')
}

//////////////////////

$(".iconClose-2").hide();
$(".iconSearch-2").hide();
$(".searchFormListGroup").hide();

$(document).ready(function () {
    $('.iconSearch-1').click(function () {
        $(this).parent().find(".categoryTitle").hide();
        $(this).parent().find(".caretIcon").hide();
        $(this).parent().find(".iconSearch-1").hide();
        $(this).parent().find(".searchFormListGroup").show();
        $(this).parent().find(".iconSearch-2").show();
        $(this).parent().find(".iconClose-2").show();
    });
});

$(document).ready(function () {
    $('.iconClose-2').click(function () {
        $(this).parent().parent().parent().find(".categoryTitle").show();
        $(this).parent().parent().parent().find(".caretIcon").show();
        $(this).parent().parent().parent().find(".iconSearch-1").show();
        $(this).parent().parent().find(".iconDelete-1").show();
        $(this).parent().parent().find(".searchFormListGroup").hide();
        $(this).parent().parent().find(".iconSearch-2").hide();
        $(this).parent().parent().find(".iconClose-2").hide();
    });
});

