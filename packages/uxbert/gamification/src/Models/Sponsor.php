<?php

namespace Uxbert\Gamification\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Sponsor extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'sponsors';

    protected $fillable = [
        'name', 
        'logo', 
        'description', 
        'status' // active or not
    ];
}
