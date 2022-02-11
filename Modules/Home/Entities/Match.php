<?php

namespace Modules\Home\Entities;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable = [
        'user_id',
        'matched_with',
    ];

    function user(){
        return $this->belongsTo(\App\User::class);
    }

    function match(){
        return $this->hasOne(\App\User::class, 'id', 'matched_with');
    }
}
