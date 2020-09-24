<?php

namespace Uxbert\Gamification\Models;

use App\User;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Client_User extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public $timestamps = TRUE;

    protected $connection = 'mongodb';
    protected $collection = 'client_users';

    // if we wants to get relationship with key we can send parameter in it
    protected $action_id;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'city', 'country', 'phone', 'status', 'user_id', 'referral_key', 
    ];

    protected $appends = [
        'total_current_points', 'total_earned_points', 'total_withdrawn_points'
    ];

    public function clients()
    {
        return $this->belongsToMany(Client::class, null, 'user_ids' , 'client_ids');
    }

    public function joining()
    {
        return $this->hasMany(UserJoiningClient::class, "user_id", "_id");
    }

    public function allpoints()
    {
        return $this->hasMany(ActionRecord::class, "user_id", "_id");
    }

    public function plus_points()
    {
        return $this->hasMany(ActionRecord::class, "user_id", "_id")->where('type', '=','plus');
    }

    public function minus_points()
    {
        return $this->hasMany(ActionRecord::class, "user_id", "_id")->where('type', 'minus');
    }

    public function by_action_id()
    {
        return $this->hasMany(ActionRecord::class, "user_id", "_id")->where('action_id', $this->action_id);
    }

    function getTotalCurrentPointsAttribute() {
        return $this->allpoints->sum('current_points');
    }

    function getTotalEarnedPointsAttribute() {
        return $this->plus_points->sum('current_points');
    }

    function getTotalWithdrawnPointsAttribute() {
        return $this->minus_points->sum('current_points');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', '_id');
    }

}
