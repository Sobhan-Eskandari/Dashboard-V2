<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Morilog\Jalali\Facades\jDate;

class Faq extends Model
{
    use Searchable;

    protected $fillable = [
        'question',
        'answer',
        'revisions',
        'created_by',
        'updated_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public static function pagination()
    {
        return Faq::with('user')->orderBy('updated_at', 'desc')->get();
    }

    public function create_date()
    {
        return jDate::forge($this->created_at)->format('%d %B، %Y');
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'question' => $this->question,
            'answer' => $this->answer,
        ];
    }
}
