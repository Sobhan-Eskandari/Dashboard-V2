<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Pagination\LengthAwarePaginator;
use Laravel\Scout\Searchable;
use Morilog\Jalali\Facades\jDate;

class Post extends Model
{
    use Sluggable;
    use SoftDeletes;
    use Searchable;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
        'slug',
        'body',
        'views',
        'lock',
        'draft',
        'created_by',
        'updated_by',
        'updated_at',
        'locked_by',
        'revisions',
    ];

    public static function pagination($path, $draft = 0)
    {
        if ($path == URL::to('/posts/trash')){
            $allPosts = Post::with(['updater', 'creator', 'categories', 'tags'])->onlyTrashed()->orderBy('updated_at', 'desc')->get()->toArray();
        }else{
            $allPosts = Post::with(['updater', 'creator', 'categories', 'tags'])->where('draft', $draft)->orderBy('updated_at', 'desc')->get()->toArray();
        }

        $page = Input::get('page', 1); // Get the current page or default to 1
        $perPage = 8;
        $offset = ($page * $perPage) - $perPage;

        $posts = new LengthAwarePaginator(array_slice($allPosts, $offset, $perPage, true),
            count($allPosts),
            $perPage,
            $page,
            ['path' => $path]
        );

        return $posts;
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function photos()
    {
        return $this->morphToMany(Photo::class, 'photoable');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function create_date()
    {
        return jDate::forge($this->created_at)->format('%d %B، %Y');
    }

    public function update_date()
    {
        return jDate::forge($this->updated_at)->format('%d %B، %Y');
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
        ];
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function path()
    {
        return "/posts/$this->slug";
    }
}
