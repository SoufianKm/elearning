<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filliere extends Model
{
    //
    public function cours(){
    	return $this->hasMany(Cours::class);
    }
    public function professeurs(){
    	return $this->hasMany(Professeur::class);
    }
}
