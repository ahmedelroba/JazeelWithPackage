<?php

namespace Uxbert\Gamification\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class ClientPoints extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'client_points';

    protected $fillable = [
        'points', 'description', 'client_id', 'type'
    ];

}
