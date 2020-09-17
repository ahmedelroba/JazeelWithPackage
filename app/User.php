<?php

namespace App;

use App\Models\IntegrationSystem\Integ_Brand;
use App\Models\IntegrationSystem\Integ_User;
use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Eloquent\Model ;

// use Illuminate\Auth\Authenticatable;

use DesignMyNight\Mongodb\Auth\User as Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Foundation\Auth\Access\Authorizable;
// use Jenssegers\Mongodb\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Maklad\Permission\Traits\HasRoles;

class User extends Authenticatable implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use  Authorizable, CanResetPassword, MustVerifyEmail, Notifiable, HasApiTokens, HasRoles;

    protected $collection = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'phone', 'city', 'country', 'email', 'timezone', 'halayalla_user_id', 'gender',  'type', 'password', 'remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function brand()
    {
        return $this->belongsTo(Integ_Brand::class, '_id', 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(Integ_User::class, '_id', 'user_id');
    }
}
