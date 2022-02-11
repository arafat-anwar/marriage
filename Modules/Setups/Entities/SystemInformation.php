<?php

namespace Modules\Setups\Entities;

use Illuminate\Database\Eloquent\Model;

class SystemInformation extends Model
{
    protected $fillable = [
    	'name',
        'phone',
        'mobile',
        'address',
        'email',
        'twitter',
        'facebook',
        'instagram',
        'skype',
        'linked_in',
        'youtube',

        'how_it_works',
        'description',
        'about',
        'contact',
        'terms',
        
        'seo',
        'logo',
        'icon',
        'status',
    ];
}
