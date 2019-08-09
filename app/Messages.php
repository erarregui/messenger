<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $casts = [

    	'written_by_me' => 'boolean'
    ];
}
