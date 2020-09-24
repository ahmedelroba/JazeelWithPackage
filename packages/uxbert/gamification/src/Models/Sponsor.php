<?php

namespace Uxbert\Gamification\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Sponsor extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $connection = 'mongodb';
    protected $collection = 'sponsors';

    protected $fillable = [
        'name', 
        'logo', 
        'description', 
        'status', // active or not
        'key',
        'client_id' 
    ];
}
