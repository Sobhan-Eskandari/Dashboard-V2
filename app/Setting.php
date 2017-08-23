<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'site_title',
        'meta_description',
        'email',
        'land_line',
        'land_line2',
        'mobile_number',
        'mobile_number2',
        'address',
        'zip',
        'instagram',
        'telegram',
        'facebook',
        'linkedin',
        'twitter',
        'aparat',
        'terms',
        'about_us',
        'about_site',
        'guide',
        'header',
        'slider',
        'favicon',
        'created_by',
        'updated_by',
        'revisions',
    ];


    public function user() {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function photos() {
        return $this->morphOne(Photo::class, 'photoable');
    }
}
