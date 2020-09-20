<?php

namespace Uxbert\Gamification\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Reward extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'rewards';

    protected $fillable = [
        'name',
        'description', 
        'quantity', 
        'image', 
        'key', 
        'sponsor_id',
        'client_id'
    ];

    public function sponsor()
    {
        return $this->belongsTo(Client_User::class, 'action_id', '_id');
    }

}
