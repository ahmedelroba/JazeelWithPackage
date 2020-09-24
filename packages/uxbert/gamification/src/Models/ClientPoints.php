<?php

namespace Uxbert\Gamification\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class ClientPoints extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $connection = 'mongodb';
    protected $collection = 'client_points';

    protected $fillable = [
        'points', 'description', 'client_id', 'type'
    ];

}
