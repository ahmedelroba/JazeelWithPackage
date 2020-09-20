<?php

namespace Uxbert\Gamification\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Rewards extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'rewards';

    protected $fillable = [
        'name',
        'description', 
        'quantity', 
        'image', 
        'sponsor_id'
    ];

    public function sponsor()
    {
        return $this->belongsTo(Client_User::class, 'action_id', '_id');
    }

}
