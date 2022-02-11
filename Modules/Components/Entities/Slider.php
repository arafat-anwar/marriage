<?php

namespace Modules\Components\Entities;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'title',
        'desc',
        'slider',
        'status',
    ];
}
