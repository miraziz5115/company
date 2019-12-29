<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'person';
    protected $fillable = [
    	'fullname',
    	'birthdate',
    	'email',
        'company_id',
    	
    ];

    function address(){
    	return $this->hasOne('App\Models\Address');
    }

    function company(){
        return $this->belongsTo('App\Models\Company',  'id','default_person');
    }

    function companyName(){
        return $this->belongsTo('App\Models\Company','company_id', 'id');
    }
}
