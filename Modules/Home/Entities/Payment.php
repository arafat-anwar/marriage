<?php

namespace Modules\Home\Entities;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id',
        'type',
        'info',
    ];

    function user(){
        return $this->belongsTo(\App\User::class);
    }
}
