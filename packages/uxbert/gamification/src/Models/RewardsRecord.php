<?php

namespace Uxbert\Gamification\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class RewardsRecord extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'rewards';

    protected $fillable = [
        'user_id', // We will fill it only when we send gift to winner
        'reward_id', // Reward
        'given_to', // (leaderboard/campaign/goals/missions/achievement)
        'leaderboard_rank', // optional
        'leaderboard_id', // optional
        'status', // awarded/pending/cacnelled/etc
        'given_at', // date of given reward to user

    ];

    public function reward()
    {
        return $this->belongsTo(Rewards::class, 'reward_id', '_id');
    }

    public function user()
    {
        return $this->belongsTo(Client_User::class, 'user_id', '_id');
    }

}
