<?php

namespace Uxbert\Gamification\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class LeaderBoard extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'leaderboards';

    protected $fillable = [
        'name', 'description', 'key', 'date_from', 'date_to', 'action_id', 'client_id', 'terms'
    ];

    public function action()
    {
        return $this->belongsTo(Action::class, 'action_id', '_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', '_id');
    }
}
