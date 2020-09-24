<?php

namespace Uxbert\Gamification\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class ActionRecord extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $connection = 'mongodb';
    protected $collection = 'action_records';

    protected $fillable = [
        'user_id', 'action_id', 'client_id', 'current_points', 'type', 'description', 'category_id'
    ];

    public function user()
    {
        return $this->belongsTo(Client_User::class, 'user_id', '_id');
    }

    public function action()
    {
        return $this->belongsTo(Action::class, 'action_id' , '_id');
    }

    public function brand()
    {
        return $this->belongsTo(Client::class, 'client_id' , '_id');
    }






}
