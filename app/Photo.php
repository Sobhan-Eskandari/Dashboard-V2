<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'name',
        'order',
        'position',
        'created_by',
    ];

    public function photoable()
    {
        return $this->morphTo();
    }

    public function sliders() {
        return $this->morphedByMany(Slider::class, 'photoable');
    }
}
