<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
