<?php

namespace Uxbert\Gamification\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Reward extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $connection = 'mongodb';
    protected $collection = 'rewards';

    protected $fillable = [
        'name',
        'short_description', 
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
