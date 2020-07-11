<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    public function user(){
        return $this->belongsTo('app\User');
    }

    public function matiere(){
        return $this->belongsTo('app\Matiere');
    }

    public function niveau(){
        return $this->belongsTo('app\Niveau');
    }

    public function chapitre(){
      return $this->hasMany('app\Chapitre');
    }

    public function payment(){
        return $this->hasMany('app\Payment');
    }

}
