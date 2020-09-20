<?php

namespace Uxbert\Gamification\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class ActionCategory extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'action_categories';

    protected $fillable = [
        'name', 'description', 'key', 'status', 'client_id'
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
