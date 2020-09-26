<?php

namespace Uxbert\Gamification\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use Uxbert\Gamification\Events\ActionRegistered;

class ActionRecord extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $connection = 'mongodb';
    protected $collection = 'action_records';

    protected $fillable = [
        'user_id', 
        'action_id', 
        'client_id', 
        'current_points', 
        'type', 
        'description', 
        'category_id',
        'element', // event name/groub name/etc
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

    // add events here to be fired automatically on actions
    protected $dispatchesEvents = [
        'saved' => ActionRegistered::class,
    ];

}
