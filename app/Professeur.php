<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professeur extends Model
{
    //
    public function somestres(){
    	return $this->belongsTo(Somestre::class);
    }
    public function users(){
    	return $this->belongsTo(User::class);
    }
    
}
