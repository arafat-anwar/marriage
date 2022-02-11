<?php

namespace Modules\Home\Entities;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'subject',
        'message',
        'status',
    ];
}
