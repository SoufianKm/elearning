<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    //
    public function etudiants(){
    	return $this->belongsTo(Etudiant::class);
    }
}
