<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    //
    public function cours(){
    	return $this->hasMany(Cours::class);
    }
    public function somestres(){
    	return $this->belongsTo(Module::class);
    }

}
