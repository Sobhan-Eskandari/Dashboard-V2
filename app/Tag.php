<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Tag extends Model
{
    use Searchable;

    protected $fillable = [
        'name',
        'created_by',
        'updated_by',
        'revisions',
    ];
}
