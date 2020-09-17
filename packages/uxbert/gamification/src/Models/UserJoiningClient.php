<?php

namespace App;

namespace Uxbert\Gamification\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class UserJoiningClient extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'user_joining_clients';

    protected $fillable = [
        'client_id', 'user_id'
    ];
    
}
