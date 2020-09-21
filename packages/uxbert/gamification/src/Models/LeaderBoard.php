<?php

namespace Uxbert\Gamification\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class LeaderBoard extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'leaderboards';

    protected $fillable = [
        'name', 'description', 'key', 'date_from', 'date_to', 'client_id', 'terms',
        'rewards'
        // = [
        //     {
        //         'rank' => 1,
        //         'user_id' => 1
        //         'reward_id' => 1
        //     },
        //     {
        //         'rank' => 2,
        //         'user_id' => 3323
        //         'reward_id' => 34535
        //     },
        // ]
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', '_id');
    }
}
