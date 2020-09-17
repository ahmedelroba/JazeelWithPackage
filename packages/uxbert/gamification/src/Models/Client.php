<?php

namespace Uxbert\Gamification\Models;

use App\User;
use Jenssegers\Mongodb\Eloquent\Model;

class Client extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'clients';

    protected $fillable = [
        'name', 'description', 'url', 'phone', 'username', 'job_title', 'email', 'password', 'industry', 'country', 'city', 'user_id', 'status', 'client_id', 'client_secret'
    ];

    public function users()
    {
        return $this->belongsToMany(Client_User::class, 'user_joining_clients', 'client_id', 'user_id' );
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', '_id');
    }

    public function ips()
    {
        return $this->hasMany(ClientServersIp::class, 'client_id', '_id');
    }
}
