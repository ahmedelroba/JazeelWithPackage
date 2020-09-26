<?php

namespace Uxbert\Gamification\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Action extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $connection = 'mongodb';
    protected $collection = 'actions';
    

    protected $fillable = [
        'name', 'description', 'key', 'points', 'type', 'status', 'client_id', 'category_id',
        'action_frequency',
        'start_date',
        'end_date',
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
