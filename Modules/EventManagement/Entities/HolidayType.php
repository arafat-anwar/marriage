<?php

namespace Modules\EventManagement\Entities;

use Illuminate\Database\Eloquent\Model;

class HolidayType extends Model
{
    protected $fillable = [
    	'name',
        'desc',
        'created_by',
        'updated_by',
        'status',
    ];

    function holidays()
    {
        return $this->hasMany(Holiday::class);
    }

    public function creator(){
        return $this->hasOne(\App\User::class,'id','created_by');
    }

    public function editor(){
        return $this->hasOne(\App\User::class,'id','updated_by');
    }
}
