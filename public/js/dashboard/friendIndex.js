/*==========> get the create category form after clicking submit button and send an ajax request to CategoryController[at]store <=========*/var createForm = $("#createForm");var loadFriends = $('#loadFriends');// $('#submit').click(function (event) {//     event.preventDefault();//     var dataArray = $(this).parents('#createForm').serializeArray();//     $.ajax({//         type: "POST",//         url: "/friends",//         data: dataArray//     }).success(function (data) {//         createForm.find("input[name=site_name]").val('');//         createForm.find("input[name=address]").val('');//         loadFriends.html(data);//         ShowNotification('سایت دوست ساخته شد');//     }).fail(function () {//         ShowNotification('از پر بودن تمام بخش ها اطمینان حاصل کنید');//     });////     window.history.pushState("", "", "/friends");// });/*==========> get the create category form after clicking submit button and send an ajax request to CategoryController[at]store <=========*//*==========> hide create category form after clicking edit button on any category and sends a PUT request to CategoryController[at]update <=========*/// $('#edit-submit').click(function (event) {//     event.preventDefault();//     var dataArray = $(this).parents('#editForm').serializeArray();//     var editUrl = $(this).parents('#editForm').attr('action');//     $.ajax({//         type: "PUT",//         url: editUrl,//         data: dataArray//     }).success(function (data) {//         createForm.find("input[name=site_name]").val('');//         createForm.find("input[name=address]").val('');//         loadFriends.html(data);//         $('#create-div').fadeIn();//         $('#edit-div').fadeOut();//         ShowNotification('دوست شما ویرایش شد');//     }).fail(function () {//         ShowNotification('از پر بودن تمام بخش ها اطمینان حاصل کنید');//     });////     window.history.pushState("", "", "/friends");// });/*==========> hide create category form after clicking edit button on any category and sends a PUT request to CategoryController[at]update <=========*//*==========> preform ajax pagination <=========*/// loadFriends.on('click', '.pagination a', function(event) {//     event.preventDefault();////     loadFriends.find('a').css('color', '#dfecf6');//     loadFriends.append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="/images/loading.gif" />');////     var url = $(this).attr('href');//     getFriends(url);//     window.history.pushState("", "", url);// });//// function getFriends(url) {//     $.ajax({//         url : url//     }).done(function (data) {//         loadFriends.html(data);//     }).fail(function () {//         ShowNotification('مشکلی در بارگذاری بوجود آمد');//     });// }/*==========> preform ajax pagination <=========*//*==========> show notification function <=========*/function ShowNotification(notifText) {    var notification = new NotificationFx({        wrapper : document.body,        message : notifText,        layout : 'growl',        effect : 'jelly',        type : 'error',        ttl : 6000,        onClose : function() { return false; },        onOpen : function() { return false; }    });    notification.show();}/*==========> show notification function <=========*//*==========> search function using TNT and scout <=========*/var SearchUrl = "/friends";var friendSearch = $("#search");var collect = {};friendSearch.keyup(function (event) {    if(friendSearch.val().length >=0  || event.keyCode === 8){        /**         *      loading code goes here         */        collect["query"] = friendSearch.val();        $.ajax({            url : SearchUrl,            data: collect        }).done(function (data) {            loadFriends.html(data);//                    ShowNotification('نتیجه های زیر یافت شدند');        }).fail(function () {//                    ShowNotification('نتیجه ای یافت نشد');        });        window.history.pushState("", "", SearchUrl + '?query=' + friendSearch.val());    }});/*==========> search function using TNT and scout <=========*/