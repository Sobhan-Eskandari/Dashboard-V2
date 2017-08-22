/**
 * Created by sobhaneskandari on 4/29/17.
 */
$( document ).ready(function() {

    // The function to rotate the arrow in navigation menu
    $(".Sidebar_menu_link").parent().click(function () {


        var parentId = $(this).attr('id');
        console.log(parentId);

        $(".fa-chevron-left", this).animateRotate(-90,0, {
            duration:150,
            easing: 'linear',
            complete: function () {
                $("#"+parentId+" .Sidebar_menu_link").addClass('turned');
            },
            step: function () {}
        });

        // check if the arrow has turned or not
        if ($("#"+parentId+" .Sidebar_menu_link").hasClass('turned')){
            $(".fa-chevron-left", this).animateRotate(0,-90, {
                duration:150,
                easing: 'linear',
                complete: function () {
                    $("#"+parentId+" .Sidebar_menu_link").removeClass('turned');
                },
                step: function () {}
            });
        }
    });


    // Rotate function Jqury animation
    $.fn.animateRotate = function(angle,currentangle, duration, easing, complete) {
        var args = $.speed(duration, easing, complete);
        var step = args.step;
        return this.each(function(i, e) {
            args.complete = $.proxy(args.complete, e);
            args.step = function(now) {
                $.style(e, 'transform', 'rotate(' + now + 'deg)');
                if (step) return step.apply(e, arguments);
            };

            $({deg: currentangle}).animate({deg: angle}, args);
        });
    };
});