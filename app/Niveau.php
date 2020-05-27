<?php

namespace App;

use App\User;
use App\Matiere;
use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    public function matiere(){
        return $this->belongsToMany('app\Matiere');
    }

    public function user(){
        return $this->hasMany('app\User');
    }

    public function cours(){
        return $this->hasMany('app\Cours');
    }
}
