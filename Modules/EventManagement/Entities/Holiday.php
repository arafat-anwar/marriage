<?php

namespace Modules\EventManagement\Entities;

use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    protected $fillable = [
    	'holiday_type_id',
        'name',
        'date',
        'desc',
        'created_by',
        'updated_by',
        'status',
    ];

    function holidayType()
    {
        return $this->belongsTo(HolidayType::class);
    }

    public function creator(){
        return $this->hasOne(\App\User::class,'id','created_by');
    }

    public function editor(){
        return $this->hasOne(\App\User::class,'id','updated_by');
    }
}
