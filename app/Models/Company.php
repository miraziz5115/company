<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';
    protected $fillable = ['default_person'];

    function defaultPerson(){
    	return $this->hasOne('App\Models\Person','id', 'default_person');
    }

    function persons(){
    	return $this->hasMany('App\Models\Person','company_id');
    }
}

