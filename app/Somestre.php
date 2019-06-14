<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Somestre extends Model
{
    //
    public function modules(){
    	return $this->hasMany(Module::class);
    }
    public function professeurs(){
    	return $this->hasMany(Professeurs::class);
    }
}
