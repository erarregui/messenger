<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    
    //propiedad que adjunta la respuesta en json
    //contact_name = get(ContactName)Attribute   
    protected $appends = ['contact_name'];
    
    public function getContactNameAttribute()
    {
    	//utilizamos Query Builder para optimizar las consultas
    	return $this->contact()->first(['name'])->name;
    }

    //definimos una relacion contact para buscar el nombre del usuario
    public function contact()
    {
    	return $this->belongsTo(User::class);
    }                //pertenece a
}
