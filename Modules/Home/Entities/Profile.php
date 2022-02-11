<?php

namespace Modules\Home\Entities;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'phone',
        'age',
        'ethnic_origin',
        'marital_status',
        'height',
        'body_type',
        'religion',
        'region',
        'introduction',
        'physical_attributes',
        'hobbies_interests',
        'attitude_earnings',
        'spiritual_family_values',
        'lifestyle',
    ];

    function user(){
        return $this->belongsTo(\App\User::class);
    }
}
