<?php

namespace Uxbert\Gamification\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Action extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'actions';

    protected $fillable = [
        'name', 'description', 'key', 'points', 'type', 'client_id'
    ];

    public function transactions()
    {
        return $this->hasMany(ActionRecord::class, "action_id", "_id");
    }

    public function brand()
    {
        return $this->belongsTo(Client::class, 'brand_id', '_id');
    }
}
