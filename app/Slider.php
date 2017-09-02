<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Facades\jDate;

class Slider extends Model
{
    protected $fillable = [
        'caption',
        'created_by',
    ];

    public function photos() {
        return $this->morphToMany(Photo::class, 'photoable');
    }

    public function create_date()
    {
        return jDate::forge($this->created_at)->format('%d %B، %Y');
    }

    public function user() {
        return $this->belongsTo(User::class, 'created_by');
    }
}
