<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
 * users
 */
Route::prefix('users')->group(function(){

//    Route::get('','UserController@index')->name('all.users');
//    Route::Delete('/delete/{user}','UserController@destroy')->name('users.destroy');

    Route::get('/','UserController@index')->name('all.users');
    Route::Delete('/delete/{user}','UserController@destroy')->name('users.destroy');

    Route::post('/MultiDelete','UserController@multiDestroy')->name('user.multi.destroy');
    Route::get('/trash','UserController@trash')->name('user.trash');
//    Route::get('/create','UserController@create')->name('user.create');
//    Route::post('/','UserController@store')->name('user.store');
//    Route::post('photo','UserController@photo')->name('user.photo');
//    Route::get('/show/{user}','UserController@show')->name('user.show');
//    Route::get('/edit/{user}','UserController@edit')->name('user.edit');
//    Route::post('/update/{user}','UserController@update')->name('user.update');
    Route::delete('/forceDelete/{user}','UserController@forceDelete')->name('user.force.delete');
    Route::post('/forceMultiDelete','UserController@forceMultiDelete')->name('user.force.multiDelete');
    $this->post('/restore/{user}','UserController@restore')->name('user.restore');
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
Route::resource('/tags','tagController');

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

    //Route::middleware('role:SuperAdministrator|Administrator')->group(function() {
    Route::post('/restore/{admin}', 'UserController@adminRestore')->name('admins.restore');
    Route::get('/', 'UserController@adminIndex')->name('admins.index');
    Route::get('/create', 'UserController@adminCreate')->name('admins.create');
    Route::post('/', 'UserController@adminStore')->name('admins.store');
    Route::get('/{admin}', 'UserController@adminShow')->name('admins.show');
    Route::get('/{admin}/edit', 'UserController@adminEdit')->name('admins.edit');
    Route::put('/{admin}', 'UserController@adminUpdate')->name('admins.update');
    Route::delete('/{admin}', 'UserController@adminDestroy')->name('admins.destroy');
    //});
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
    $this->get('','PhotoController@index')->name('photo.all');
    $this->post('','PhotoController@store')->name('photo.store');
    $this->post('/multiDelete','PhotoController@multiDestroy')->name('photo.multi.delete');
});
/*
 * test gallery
 */
Route::get('/test', function (\Illuminate\Http\Request $request){
    $photos = \App\Photo::orderBy('created_at', 'desc')->get();
    if($request->ajax()){
        return view('includes.galleries.AllPhotos', compact('photos'));
    }
    return view('test', compact('photos'));
})->name('test');

Route::post('/test', 'PhotoController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/movie', function (){

    $client = new GuzzleHttp\Client();
    $res = $client->request('GET', 'https://api.themoviedb.org/3/search/movie', [
        'query' => [
            'api_key' => '7f0ab0d5f0c589a1a9820543ca326a81',
            'query' => 'Jack+Reacher'
            ]
    ]);

    dd(json_decode($res->getBody()->getContents()));
});