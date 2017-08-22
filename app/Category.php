<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;
use Laravel\Scout\Searchable;

class Category extends Model
{
    use Searchable;

    protected $fillable = [
        'name',
        'created_by',
        'updated_by',
        'revisions',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public static function pagination()
    {
        $allCategories = Category::orderBy('updated_at', 'desc')->get();
        $categoriesArray = [];
        foreach ($allCategories as $category){
            $categoriesArray[] = $category;
        }

        $page = Input::get('page', 1); // Get the current page or default to 1
        $perPage = 8;
        $offset = ($page * $perPage) - $perPage;
        $path = URL::to('/categories');

        $categories = new LengthAwarePaginator(array_slice($categoriesArray, $offset, $perPage, true),
            count($categoriesArray),
            $perPage,
            $page,
            ['path' => $path]
        );

        return $categories;
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
