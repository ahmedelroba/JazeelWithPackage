<?php

namespace Uxbert\Gamification\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class LeaderBoardRecord extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $connection = 'mongodb';
    protected $collection = 'leaderboard_records';

    protected $fillable = [
        'user_name', 'points', 'rank', 'user_id', 'leaderboard_id', 'client_id'
    ];

    public function action()
    {
        return $this->belongsTo(Action::class, 'action_id', '_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', '_id');
    }

    public function leaderboard()
    {
        return $this->belongsTo(LeaderBoard::class, 'leaderboard_id', '_id');
    }
}
