<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;
use Laravel\Scout\Searchable;

class Outbox extends Model
{
    use SoftDeletes;
    use Searchable;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'inbox_id',
        'subject',
        'message',
        'created_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function inbox()
    {
        return $this->belongsTo(Inbox::class)->withTrashed();
    }

    public static function pagination($path)
    {
        if ($path == URL::to('/outbox')){
            $allOutboxes = Outbox::with(['inbox', 'user'])->orderBy('created_at', 'desc')->get();
        }else{
            $allOutboxes = Outbox::with(['inbox', 'user'])->onlyTrashed()->orderBy('created_at', 'desc')->get();
        }
        $outboxesArray = [];
        foreach ($allOutboxes as $outbox){
            $outboxesArray[] = $outbox;
        }

        $page = Input::get('page', 1); // Get the current page or default to 1
        $perPage = 8;
        $offset = ($page * $perPage) - $perPage;

        $outboxes = new LengthAwarePaginator(array_slice($outboxesArray, $offset, $perPage, true),
            count($outboxesArray),
            $perPage,
            $page,
            ['path' => $path]
        );

        return $outboxes;
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'message' => $this->message,
            'subject' => $this->subject,
        ];
    }
}
