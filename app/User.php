<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'password',
        'role_id',
        'is_developer',
        'gender',
        'sound',
        'image',
        'phone',
        'email',
        'relation',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    function role(){
        return $this->hasOne(\Modules\Setups\Entities\Role::class,'id','role_id');
    }
    
    function profile(){
        return $this->hasOne(\Modules\Home\Entities\Profile::class,'user_id','id');
    }

    function myMatches(){
        return $this->hasMany(\Modules\Home\Entities\Match::class,'user_id','id');
    }

    function payments(){
        return $this->hasMany(\Modules\Home\Entities\Payment::class,'user_id','id');
    }

    function matches(){
        return $this->hasMany(\Modules\Home\Entities\Match::class,'matched_with','id');
    }
}
