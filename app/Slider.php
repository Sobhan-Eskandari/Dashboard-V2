<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'caption',
        'created_by',
    ];

    public function photos() {
        return $this->morphToMany(Photo::class, 'photoable');
    }

    public function admin() {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function user() {
        return $this->belongsTo(User::class, 'created_by');
    }
}
