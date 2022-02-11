<?php

namespace Modules\EventManagement\Entities;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
    	'event_type_id',
        'title',
        'desc',
        'from',
        'to',
        'attachments',
        'created_by',
        'updated_by',
        'status',
    ];

    public function eventType(){
    	return $this->belongsTo(EventType::class);
    }

    public function creator(){
        return $this->hasOne(\App\User::class,'id','created_by');
    }

    public function editor(){
        return $this->hasOne(\App\User::class,'id','updated_by');
    }
}
