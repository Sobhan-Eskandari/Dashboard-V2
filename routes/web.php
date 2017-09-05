<?php
/*
 * users
 */

//Route::middleware('role:superadministrator|administrator')->group(function() {
Route::prefix('users')->group(function(){

    Route::post('/MultiDelete','UserController@multiDestroy')->name('user.multi.destroy');
    Route::get('/trash','UserController@trash')->name('user.trash');
    Route::delete('/forceDelete/{user}','UserController@forceDelete')->name('user.force.delete');
    Route::post('/forceMultiDelete','UserController@forceMultiDelete')->name('user.force.multiDelete');
    Route::post('/restore/{user}','UserController@restore')->name('user.restore');
});

Route::resource('/users', 'UserController');

/*
 * comments
 */
Route::prefix('comments')->group(function(){
    Route::post('/approve/{comment}','CommentController@approve')->name('approveComment');
    Route::post('/multiDestroy','CommentController@multiDestroy')->name('multiCommentsDelete');
    route::post('/answer','CommentController@answer')->name('answerComment');
    Route::get('/trash','CommentController@trash')->name('comments.trash');
    Route::post('/restore/{id}','CommentController@restore')->name('comments.restore');
    Route::Delete('/forceDelete/{id}','CommentController@forceDelete')->name('comments.forceDelete');
    Route::post('/multiForceDelete','CommentController@multiForceDelete')->name('comments.multiForceDelete');
});

Route::resource('comments','CommentController');

/*
 * sliders
 */
Route::resource('sliders', 'SliderController');

/*
 * categories
 */
Route::post('/categories/multiDestroy', 'CategoryController@multiDestroy')->name('categories.multiDestroy');
Route::resource('/categories', 'CategoryController');

/*
 * faqs
 */
Route::post('/faqs/multiDestroy', 'FaqController@multiDestroy')->name('faqs.multiDestroy');
Route::resource('/faqs', 'FaqController');

/*
 * friends
 */
Route::post('/friends/multiDestroy', 'FriendController@multiDestroy')->name('friends.multiDestroy');
Route::resource('/friends', 'FriendController');

/*
 * inboxes
 */
Route::prefix('inbox')->group(function()
{
    Route::prefix('trash')->group(function()
    {
        Route::get('/', 'InboxController@trash')->name('inbox.trash');
        Route::delete('/{inbox}', 'InboxController@forceDestroy')->name('inbox.forceDestroy');
        Route::post('/forceMultiDestroy', 'InboxController@forceMultiDestroy')->name('inbox.forceMultiDestroy');
    });

    Route::post('/restore/{inbox}', 'InboxController@restore')->name('inbox.restore');
    Route::post('/multiDestroy', 'InboxController@multiDestroy')->name('inbox.multiDestroy');
});

Route::resource('/inbox', 'InboxController');

/*
 * outboxes
 */
Route::prefix('outbox')->group(function()
{
    Route::prefix('trash')->group(function () {
        Route::get('/', 'OutboxController@trash')->name('outbox.trash');
        Route::delete('/{outbox}', 'OutboxController@forceDestroy')->name('outbox.forceDestroy');
        Route::post('/forceMultiDestroy', 'OutboxController@forceMultiDestroy')->name('outbox.forceMultiDestroy');
    });

    Route::post('/restore/{outbox}', 'OutboxController@restore')->name('outbox.restore');
    Route::post('/multiDestroy', 'OutboxController@multiDestroy')->name('outbox.multiDestroy');
});

Route::resource('/outbox', 'OutboxController');

/*
 * tags
 */
Route::resource('/tags','TagController');

/*
 * backups
 */
Route::prefix('backups')->group(function()
{
    Route::get('/', 'BackupController@index')->name('backups.index');
    Route::get('/posts', 'BackupController@posts')->name('backups.posts');
    Route::get('/inbox', 'BackupController@inbox')->name('backups.inbox');
    Route::get('/users', 'BackupController@users')->name('backups.users');
    Route::get('/comments', 'BackupController@comments')->name('backups.comments');
    Route::get('/admins', 'BackupController@admins')->name('backups.admins');
});

/*
 * settings
 */
Route::resource('/settings','SettingController');

/*
 * admins
 */

Route::prefix('admins')->group(function()
{
    Route::prefix('trash')->group(function()
    {
        Route::get('/', 'UserController@adminTrash')->name('admins.trash');
        Route::delete('/{admin}', 'UserController@adminForceDestroy')->name('admins.forceDestroy');
        Route::post('/forceMultiDestroy', 'UserController@adminForceMultiDestroy')->name('admins.forceMultiDestroy');
    });

    Route::post('/restore/{admin}', 'UserController@adminRestore')->name('admins.restore');
    Route::get('/', 'UserController@adminIndex')->name('admins.index');
    Route::get('/create', 'UserController@adminCreate')->name('admins.create');
    Route::post('/', 'UserController@adminStore')->name('admins.store');
    Route::get('/{admin}', 'UserController@adminShow')->name('admins.show');
    Route::get('/{admin}/edit', 'UserController@adminEdit')->name('admins.edit');
    Route::put('/{admin}', 'UserController@adminUpdate')->name('admins.update');
    Route::delete('/{admin}', 'UserController@adminDestroy')->name('admins.destroy');
});

/*
 * posts
 */
Route::prefix('posts')->group(function()
{
    Route::prefix('trash')->group(function()
    {
        Route::get('/', 'PostController@trash')->name('posts.trash');
        Route::delete('/{post}', 'PostController@forceDestroy')->name('posts.forceDestroy');
        Route::post('/forceMultiDestroy', 'PostController@forceMultiDestroy')->name('posts.forceMultiDestroy');
    });

    Route::get('/drafts', 'PostController@draft')->name('posts.draft');
    Route::post('/restore/{post}', 'PostController@restore')->name('posts.restore');
    Route::post('/multiDestroy', 'PostController@multiDestroy')->name('posts.multiDestroy');
    Route::post('/image_upload', 'PostController@imageUpload')->name('posts.imageUpload');
});

Route::resource('/posts', 'PostController');

/*
 * todos
 */
Route::resource('/todos','TodoController');

/*
 * galleries
 */
Route::prefix('/gallery/photos')->group(function(){
    Route::get('/','PhotoController@index')->name('photo.all');
    Route::post('/','PhotoController@store')->name('photo.store');
    Route::post('/multiDelete','PhotoController@multiDestroy')->name('photo.multi.delete');
});

Route::get('/photo_loader', 'PhotoController@galleryModalAjaxLoader')->name('photo_loader');


//});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');