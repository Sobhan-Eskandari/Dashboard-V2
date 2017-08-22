/**
 * Created by sobhaneskandari on 5/4/17.
 */

// Enter key detection
// $.fn.pressEnter = function(fn) {
//
//     return this.each(function() {
//         $(this).bind('enterPress', fn);
//         $(this).keyup(function(e){
//             if(e.keyCode == 13)
//             {
//                 $(this).trigger("enterPress");
//             }
//         })
//     });
// };
$("#addChips").click(function (e) {
    e.preventDefault();

    var chipsText = $("#chipsText").val();
    var CSRF_TOKEN =$( "input[name*='_token']" ).val();
    // if(chipsText===""){
    //     alert("is empty");
    // }else{
        $.ajax({
            type: 'POST',
            url: '/tags',
            data: {_token: CSRF_TOKEN,name:chipsText}
        }).done(function (data) {
            addChips(data['tag'],data['token']);
            notify(data['message']);
        }).fail(function (data) {
            // alert('Articles could not be loaded.');
            var errors = data.responseJSON;
            $.each(errors, function(i, item) {
                notify(item);
            });
        });
    // }
});
// $('#chipsText').pressEnter(function(e){
//     e.preventDefault();
//
//     var chipsText = $("#chipsText").val();
//     var CSRF_TOKEN =$( "input[name*='_token']" ).val();
//     if(chipsText===""){
//         alert("is empty");
//     }else{
//         $.ajax({
//             type: 'POST',
//             url: '/tags',
//             data: {_token: CSRF_TOKEN,name:chipsText}
//         }).done(function () {
//             addChips();
//         }).fail(function () {
//             alert('Articles could not be loaded.');
//         });
//     }
// });
function addChips(tag,token) {
    var box = $("#boxOfTags");
    var chipsText = $("#chipsText");
    var chipsDynamicText = `<div class="tag tag_darkMode">
                <p class="tag__text">`+chipsText.val()+`</p>
                   <form method="DELETE" action="/tag/`+tag.id+`">
                   <input name="_token" type="hidden" value="`+token+`">
                    <!--{!! Form::open(['method'=>'DELETE','action'=>['tagController@destroy',tag.id]]) !!}-->
                      <button class="tag__close deleteTag fa fa-times" aria-hidden="true" id="deleteTag" data-id="`+tag.id+`"></button>
                    <!--{!! Form::close() !!}-->
                    </form>
            </div>`;

    // fade in animation for chips affter appending
    $(box).append(chipsDynamicText).hide().fadeIn();

    // resting the value of input
    $("#chipsText").val('');
}

// this is the function to remove tag
$( "body" ).delegate( ".deleteTag", "click", function(e) {
    e.preventDefault();
    var parent = this.closest('div');
    var id = $(this).attr('data-id');
    var CSRF_TOKEN =$(this).parent().children("input[name*='_token']").val();
    if(chipsText===""){
        alert("is empty");
    }else{
        $.ajax({
            type: 'DELETE',
            url: '/tags/'+id,
            data: {_token: CSRF_TOKEN,id:id}
        }).done(function (data) {
            $(parent).fadeOut();
            notify(data);
        }).fail(function () {
            alert('Articles could not be loaded.');
        });
    }
});


// ============[ Wavejs Configuration ]===========

// Waves.attach('#dropdownMenuButton',['waves-button', 'waves-float', 'waves-light']);
// Waves.attach('.gallery_category_btn',['waves-block']);
// Waves.attach('button',['waves-float', 'waves-light']);
// Waves.attach('#home',['waves-float', 'waves-light','waves-button']);
// Waves.attach('#posts',['waves-float', 'waves-light','waves-button']);
// Waves.attach('#gallery',['waves-float', 'waves-light','waves-button']);
// Waves.attach('#messages',['waves-float', 'waves-light','waves-button']);
// Waves.attach('#users',['waves-float', 'waves-light','waves-button']);
// Waves.attach('#admins',['waves-float', 'waves-light','waves-button']);
// Waves.attach('#settings',['waves-float', 'waves-light','waves-button']);
// Waves.attach('#comments',['waves-float', 'waves-light','waves-button']);
// Waves.attach('#backup',['waves-float', 'waves-light','waves-button']);
// Waves.attach('.dropdown-item');
// Waves.attach('.gallery_category li',['waves-block']);
// Waves.init();

// ============[ Admin card dismissal button ]===========

// $(".dismissAdminCardBtn").click(function () {
//     $(this).parent().parent().parent().fadeOut();
// });

// ============[ Table Row Delete ]===========

$(".deleteRowBtn").click(function () {
     $(this).parent().parent().fadeOut();
});

// ============[ Persian Date Picker ]===========
$(document).ready(function() {
    $(".example1").pDatepicker();
    $("#fullCalender").pDatepicker();
    $(".backup_dateSelector").pDatepicker({
        altField: '#observerAlt',
        altFormat: "YYYY MM DD HH:mm:ss",
        observer: true,
        format: 'YYYY/MM/DD'
    });
});

// ============[ Translate English digits to farsi ]===========
var translate = function (englishNumber) {
    var chars = englishNumber.split('');
    var arabicNumbers = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    for (var i = 0; i < chars.length; i++) {
        if (/\d/.test(chars[i])) {
            chars[i] = arabicNumbers[chars[i]];
        }
    }
    return chars.join('');
};

// ============[ Home page Grid System ]===========
// external js: packery.pkgd.js, draggabilly.pkgd.js
// var width = window.innerWidth - 300;


var $grid = $('.grid').packery({
    itemSelector: '.grid-item',
    columnWidth: '#firstCols',
    percentPosition: true,
});

// make all grid-items draggable
$grid.find('.grid-item').each( function( i, gridItem ) {
    var draggie = new Draggabilly( gridItem );
    // bind drag events to Packery
    $grid.packery( 'bindDraggabillyEvents', draggie );
});

var $grid2 = $('.gridOfNotif').packery({
    itemSelector: '.grid-notif',
    columnWidth: '#gridWith',
    percentPosition: true,
});

// make all grid-items draggable
$grid2.find('.grid-notif').each( function( i, gridItem ) {
    var draggie = new Draggabilly( gridItem );
    // bind drag events to Packery
    $grid2.packery( 'bindDraggabillyEvents', draggie );
});


// ============[ Home page Circular Progress ]===========


// ============[ Home page Stat1 Circular Progress ]===========
var integerValueOfStat1 = 12;
var fakeValueOfStat1 = 0.12;
var fakeValueofStat1 = fakeValueOfStat1 + 0.00000001;
if (integerValueOfStat1.toString().slice(-1) === '0'){
    var countOfDigits1 = fakeValueOfStat1.toString().length-1;
}else{
    var countOfDigits1 = fakeValueOfStat1.toString().length-2;
}
var stat1 = new ProgressBar.Circle('#stat1', {
    color: '#aaa',
    // This has to be the same size as the maximum width to
    // prevent clipping
    strokeWidth: 6,
    trailWidth: 2,
    easing: 'easeInOut',
    duration: 1400,
    text: {
        autoStyleContainer: false,
        className: 'statNumber'
    },
    from: { color: '#10E8C2', width: 4 },
    to: { color: '#10E8C2', width:6 },
    // Set default step function for all animate calls
    step: function(state, circle) {
        circle.path.setAttribute('stroke', state.color);
        circle.path.setAttribute('stroke-width', state.width);

        var value = circle.value();
        for (var i = 0;i < countOfDigits1;i++){
            value = value*10;
        }
        value = Math.round(value);
        var valueString = value.toString();

        valueString = translate(valueString);

        if (value === 0) {
            circle.setText('');
        } else {
            circle.setText(valueString);
        }

    }
});
stat1.animate(fakeValueofStat1);  // Number from 0.0 to 1.0
// =======[ Moving Stat number to its container ]========
var sat1Numb = $("#stat1 .statNumber");
$("#stat1Container").append(sat1Numb);

// ============[ Home page Stat2 Circular Progress ]===========
var integerValueOfStat2 = 234;
var fakeValueOfStat2 = 0.234;
var fakeValueofStat2 = fakeValueOfStat2 + 0.00000001;
if (integerValueOfStat2.toString().slice(-1) === '0'){
    var countOfDigits2 = fakeValueOfStat2.toString().length-1;
}else{
    var countOfDigits2 = fakeValueOfStat2.toString().length-2;
}
var stat2 = new ProgressBar.Circle('#stat2', {
    color: '#aaa',
    // This has to be the same size as the maximum width to
    // prevent clipping
    strokeWidth: 6,
    trailWidth: 2,
    easing: 'easeInOut',
    duration: 1400,
    text: {
        autoStyleContainer: false,
        className: 'statNumber'
    },
    from: { color: '#364ACE', width: 4 },
    to: { color: '#364ACE', width:6 },
    // Set default step function for all animate calls
    step: function(state, circle) {
        circle.path.setAttribute('stroke', state.color);
        circle.path.setAttribute('stroke-width', state.width);

        var value = circle.value();
        for (var i = 0;i < countOfDigits2;i++){
            value = value*10;
        }
        value = Math.round(value);
        var valueString = value.toString();

        valueString = translate(valueString);

        if (value === 0) {
            circle.setText('');
        } else {
            circle.setText(valueString);
        }

    }
});
stat2.animate(fakeValueofStat2);  // Number from 0.0 to 1.0
// =======[ Moving Stat number to its container ]========
var sat2Numb = $("#stat2 .statNumber");
$("#stat2Container").append(sat2Numb);

// ============[ Home page Stat3 Circular Progress ]===========
var integerValueOfStat3 = 4523;
var fakeValueOfStat3 = 0.4523;
var fakeValueofStat3 = fakeValueOfStat3 + 0.00000001;
if (integerValueOfStat3.toString().slice(-1) === '0'){
    var countOfDigits3 = fakeValueOfStat3.toString().length-1;
}else{
    var countOfDigits3 = fakeValueOfStat3.toString().length-2;
}
var stat3 = new ProgressBar.Circle('#stat3', {
    color: '#aaa',
    // This has to be the same size as the maximum width to
    // prevent clipping
    strokeWidth: 6,
    trailWidth: 2,
    easing: 'easeInOut',
    duration: 1400,
    text: {
        autoStyleContainer: false,
        className: 'statNumber'
    },
    from: { color: '#B336C6', width: 4 },
    to: { color: '#B336C6', width:6 },
    // Set default step function for all animate calls
    step: function(state, circle) {
        circle.path.setAttribute('stroke', state.color);
        circle.path.setAttribute('stroke-width', state.width);

        var value = circle.value();
        for (var i = 0;i < countOfDigits3;i++){
            value = value*10;
        }
        value = Math.round(value);
        var valueString = value.toString();

        valueString = translate(valueString);

        if (value === 0) {
            circle.setText('');
        } else {
            circle.setText(valueString);
        }

    }
});
stat3.animate(fakeValueofStat3);  // Number from 0.0 to 1.0
// =======[ Moving Stat number to its container ]========
var sat3Numb = $("#stat3 .statNumber");
$("#stat3Container").append(sat3Numb);


// ============[ Home page Stat4 Circular Progress ]===========
var integerValueOfStat4 = 124341;
var fakeValueOfStat4 = 0.124341;
var fakeValueofStat4 = fakeValueOfStat4 + 0.00000001;
if (integerValueOfStat4.toString().slice(-1) === '0'){
    var countOfDigits4 = fakeValueOfStat4.toString().length-1;
}else{
    var countOfDigits4 = fakeValueOfStat4.toString().length-2;
}
var stat4 = new ProgressBar.Circle('#stat4', {
    color: '#aaa',
    // This has to be the same size as the maximum width to
    // prevent clipping
    strokeWidth: 6,
    trailWidth: 2,
    easing: 'easeInOut',
    duration: 1400,
    text: {
        autoStyleContainer: false,
        className: 'statNumber'
    },
    from: { color: '#EA4C00', width: 4 },
    to: { color: '#EA4C00', width:6 },
    // Set default step function for all animate calls
    step: function(state, circle) {
        circle.path.setAttribute('stroke', state.color);
        circle.path.setAttribute('stroke-width', state.width);

        var value = circle.value();
        for (var i = 0;i < countOfDigits4;i++){
            value = value*10;
        }
        value = Math.round(value);
        var valueString = value.toString();

        valueString = translate(valueString);

        if (value === 0) {
            circle.setText('');
        } else {
            circle.setText(valueString);
        }

    }
});
stat4.animate(fakeValueofStat4);  // Number from 0.0 to 1.0
// =======[ Moving Stat number to its container ]========
var sat4Numb = $("#stat4 .statNumber");
$("#stat4Container").append(sat4Numb);


// =================[ To-do Button  ]=====================

$.fn.extend({
    animateCss: function (animationName) {
        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        this.addClass('animated ' + animationName).one(animationEnd, function() {
            $(this).removeClass('animated ' + animationName);
        });
    }
});

$('body').on('keydown', 'input, select, textarea', function(e) {
    var self = $(this)
        , form = self.parents('form:eq(0)')
        , focusable
        , next
    ;
    if (e.keyCode == 13) {
        focusable = form.find('input,a,select,button,textarea').filter(':visible');
        next = focusable.eq(focusable.index(this)+1);
        if (next.length) {
            next.focus();
        } else {
            form.submit();
        }
        return false;
    }
});


// var numberofTodos = 6;
// $("#addTodo_addBtn").click(function () {
//     addTodo();
// });
// $('#todoText').pressEnter(function(){
//    //addTodo();
// });
// function addTodo() {
//     var textOfTodo = $("#todoText").val();
//     $("#listOfTodos ul").prepend(`
//         <li class="list-item">
//             <input type="checkbox" class="hidden-box" id="todo[`+(numberofTodos)+`]"/>
//            <label for="todo[`+(numberofTodos)+`]" class="check--label">
//               <span class="check--label-box"></span>
//               <span class="check--label-text">`+textOfTodo+`</span>
//            </label>
//         </li>
//     `);
//     $(".list-item").animateCss('slideInDown');
//     $("#todoText").val('');
// }

// =================[ Select All Comments Buttons  ]=====================
// function selectAllCmnt() {
//     if($("#selectAllComments").attr( "checked" ) === 'checked'){
//         for (var i = 0; i < 8;i++){
//             var selectorCmnt = "#cmnt_checkbox-"+i+"-";
//             $(selectorCmnt).click();
//             $(selectorCmnt).removeAttr("checked");
//         }
//     }else{
//         $("#selectAllComments").attr( "checked","checked" )
//         for (var i = 0; i < 8;i++){
//             var selector = "#cmnt_checkbox-"+i+"-";
//             if($(selector).attr( "checked" ) !== 'checked') {
//                 $(selector).click();
//             }
//             $(selector).attr("checked","checked");
//         }
//     }
// }
// function selectCmntCheckbox(ev) {
//     // ev.preventDefault();
//      $("#"+ev.target.id).attr("checked","checked");
// }

// =================[ Select All Comments Buttons  ]=====================
function selectAllCmnt() {
    $('input[type=checkbox]').each(function(){
        if($(this).attr("checked")!=="checked") {
            $(this).click();
            $(this).attr("checked", "checked");
        }
    });
    $(".selectAllCheckboxes").attr('onclick','removeAllCmnt()');
}
function removeAllCmnt(){
    $('input[type=checkbox]').each(function(){
        if($(this).attr("checked")==="checked") {
            $(this).click();
            $(this).removeAttr("checked");
        }
    });
    $(".selectAllCheckboxes").attr('onclick','selectAllCmnt()');
}
// function selectAllCmnt() {
//     if($(".selectAllCheckboxes").attr( "checked" ) === 'checked'){
//         var page = $(".page-item.active > a").attr('id');
//         $(".selectAllCheckboxes").removeAttr("checked");
//         for (var i = page-1; i <= page+7;i++){
//             var selectorCmnt = ".checkbox-"+i;
//             $(selectorCmnt).click();
//             $(selectorCmnt).removeAttr("checked");
//         }
//     }else{
//         var page = $(".page-item.active > a").attr('id');
//         $(".selectAllCheckboxes").attr( "checked","checked" )
//         for (var i = page-1; i <= page+7;i++){
//             var selector = ".checkbox-"+i;
//             if($(selector).attr( "checked" ) !== 'checked') {
//                 $(selector).click();
//             }
//             $(selector).attr("checked","checked");
//         }
//     }
// }
function selectCmntCheckbox(ev) {
    // ev.preventDefault();
    $("#"+ev.target.id).attr("checked","checked");
}




// =================[ Calender  ]=====================

window.pd = $("#inlineDatepicker").persianDatepicker({
    timePicker: {
        enabled: false
    },
    altField: '#inlineDatepickerAlt',
    altFormat: "YYYY MM DD HH:mm:ss",
//            minDate:1258675200000,
//            maxDate:1358675200000,
    checkDate: function (unix) {
        var output = true;
        var d = new persianDate(unix);
        if (d.date() == 20) {
            output = false;
        }
        return output;
    },
    checkMonth: function (month) {
        var output = true;
        if (month == 1) {
            output = false;
        }
        return output;

    }, checkYear: function (year) {
        var output = true;
        if (year == 1396) {
            output = false;
        }
        return output;
    }

}).data('datepicker');

// ================================[ Alert Notification  ]=================================
function notify(message) {
// create the notification
    var notification = new NotificationFx({

        // element to which the notification will be appended
        // defaults to the document.body
        wrapper: document.body,

        // the message
        message: '<p>'+message+'</p>',

        // layout type: growl|attached|bar|other
        layout: 'growl',

        // effects for the specified layout:
        // for growl layout: scale|slide|genie|jelly
        // for attached layout: flip|bouncyflip
        // for other layout: boxspinner|cornerexpand|loadingcircle|thumbslider
        // ...
        effect: 'jelly',

        // notice, warning, error, success
        // will add class ns-type-warning, ns-type-error or ns-type-success
        type: 'error',
        // if the user doesn´t close the notification then we remove it
        // after the following time
        ttl: 6000,

        // callbacks
        onClose: function () {
            return false;
        },
        onOpen: function () {
            return false;
        }

    });

// show the notification
    notification.show();
}
