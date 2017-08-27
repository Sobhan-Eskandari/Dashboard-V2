<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Scout\Searchable;

class User extends Authenticatable
{
//    use HasApiTokens;
    use Notifiable;
    use SoftDeletes;
    use Searchable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'avatar',
        'user_name',
        'first_name',
        'last_name',
        'email',
        'provider',
        'provider_id',
        'role_id',
        'password',
        'land_line',
        'mobile',
        'address',
        'zip',
        'gender',
        'occupation',
        'verified',
        'created_by',
        'updated_by',
        'email_token',
        'revisions',
        'last_seen',
        'about',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function faqs()
    {
        return $this->hasMany(Faq::class, 'created_by');
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'created_by');
    }

    public function friends()
    {
        return $this->hasMany(Friend::class, 'created_by');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function outboxes()
    {
        return $this->hasMany('App\Outbox', 'created_by');
    }

    public function setting() {
        return $this->hasOne(Setting::class, 'created_by');
    }

    public function sliders() {
        return $this->hasMany(Slider::class, 'created_by');
    }

    public function todos() {
        return $this->hasMany(Todo::class);
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
//    Todo Methods Begin
    public function addTodo(Todo $todo) {
        $this->todos()->save($todo);
    }
//    Todo Methods End

//    Setting Methods Begin
    public function saveSetting(Setting $setting) {
        $this->setting()->save($setting);
    }

    public function updateSetting(Setting $setting) {
        $setting->update();
    }
//    Setting Methods End

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'user_name' => $this->user_name,
            'email'=>$this->email,
            'first_name'=>$this->first_name,
            'last_name'=>$this->last_name,
        ];
    }
    public static function pagination()
    {
        $allUsers = User::orderByRaw('updated_at desc')->get();
        $usersArray = [];
        foreach ($allUsers as $user){
            $usersArray[] = $user;
        }

        $page = Input::get('page', 1); // Get the current page or default to 1
        $perPage = 8;
        $offset = ($page * $perPage) - $perPage;
        $path = "http://dash.dev/users";

        $users = new LengthAwarePaginator(array_slice($usersArray, $offset, $perPage, true),
            count($usersArray),
            $perPage,
            $page,
            ['path' => $path]
        );

        return $users;
    }
    public function photo(){
        return $this->belongsTo('App\Photo','avatar');
    }
}
