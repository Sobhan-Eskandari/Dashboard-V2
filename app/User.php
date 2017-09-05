<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Input;
use Laravel\Scout\Searchable;
use Morilog\Jalali\Facades\jDate;

class User extends Authenticatable
{
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
        'description',
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

    public function parent()
    {
        return $this->belongsTo(User::class, 'created_by')->withTrashed();
    }

    public function children()
    {
        return $this->hasMany(User::class, 'created_by')->withTrashed();
    }

    public function tags()
    {
        return $this->hasMany(Tag::class, 'created_by');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'created_by');
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'created_by');
    }

    public function friends()
    {
        return $this->hasMany(Friend::class, 'created_by');
    }

    public function createPhotos()
    {
        return $this->hasMany(Photo::class, 'created_by');
    }

    public function photos()
    {
        return $this->morphToMany(Photo::class, 'photoable');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function outboxes()
    {
        return $this->hasMany(Outbox::class, 'created_by');
    }

    public function setting()
    {
        return $this->hasOne(Setting::class, 'created_by');
    }

    public function sliders()
    {
        return $this->hasMany(Slider::class, 'created_by');
    }

    public function todos()
    {
        return $this->hasMany(Todo::class);
    }

    public function create_date()
    {
        return jDate::forge($this->created_at)->format('%d %B، %Y');
    }

    public function update_date()
    {
        return jDate::forge($this->updated_at)->format('%d %B، %Y');
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

//    Todo Methods Begin
    public function addTodo(Todo $todo)
    {
        $this->todos()->save($todo);
    }
//    Todo Methods End

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'user_name' => $this->user_name,
            'email' => $this->email,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
        ];
    }
    public static function pagination($path)
    {
        $allUsers = User::orderByRaw('updated_at desc')->get()->toArray();

        $page = Input::get('page', 1); // Get the current page or default to 1
        $perPage = 8;
        $offset = ($page * $perPage) - $perPage;

        $users = new LengthAwarePaginator(array_slice($allUsers, $offset, $perPage, true),
            count($allUsers),
            $perPage,
            $page,
            ['path' => $path]
        );

        return $users;
    }
}
