<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cour extends Model
{
    //
    public function exercices(){
    	return $this->hasMany(Exercice::class);
    }
    public function somestres(){
    	return $this->belongsTo(Somestre::class);
    }
}
