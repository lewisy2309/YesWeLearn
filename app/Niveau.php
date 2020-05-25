<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    public function matiere(){
        return $this->belongsToMany('app\Matiere');
    }
}
