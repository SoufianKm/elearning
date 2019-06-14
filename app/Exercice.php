<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercice extends Model
{
    //
    public function cours(){
    	return $this->belongsTo(Cours::class);
    }
}
