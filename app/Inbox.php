<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;
use Laravel\Scout\Searchable;

class Inbox extends Model
{
    use SoftDeletes;
    use Searchable;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'full_name',
        'email',
        'message',
        'subject',
        'seen',
        'status',
        'tracking_code',
        'answered_at',
        'answered_by',
        'seen_by',
        'updated_by',
    ];

    public function outboxes()
    {
        return $this->hasMany(Outbox::class)->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'seen_by');
    }

    public static function pagination($path)
    {
        if ($path == URL::to('/inbox')){
            $allInboxes = Inbox::orderBy('created_at', 'desc')->get();
        }else{
            $allInboxes = Inbox::onlyTrashed()->orderBy('created_at', 'desc')->get();
        }

        $inboxesArray = [];
        foreach ($allInboxes as $inbox){
            $inboxesArray[] = $inbox;
        }

        $page = Input::get('page', 1); // Get the current page or default to 1
        $perPage = 8;
        $offset = ($page * $perPage) - $perPage;

        $inboxes = new LengthAwarePaginator(array_slice($inboxesArray, $offset, $perPage, true),
            count($inboxesArray),
            $perPage,
            $page,
            ['path' => $path]
        );

        return $inboxes;
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'full_name' => $this->full_name,
            'message' => $this->message,
            'subject' => $this->subject,
        ];
    }
}
