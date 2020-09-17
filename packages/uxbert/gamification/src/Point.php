<?php

namespace Uxbert\Gamification;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'points';

    protected $fillable = [
        'points', 'description', '', 'type'
    ];

}
