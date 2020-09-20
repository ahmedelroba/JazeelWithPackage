<?php

namespace Uxbert\Gamification\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class UploadedFiles extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $connection = 'mongodb';
    protected $table = 'uploaded_files';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'real_name',
        'new_name',
        'extension',
        'path',
        'url',
        'type',
    ];

}
