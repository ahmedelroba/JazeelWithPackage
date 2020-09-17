<?php

namespace Uxbert\Gamification\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class ClientServersIp extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'client_servers_ips';

    protected $fillable = [
        'brand_id', 'name', 'ip'
    ];

}
