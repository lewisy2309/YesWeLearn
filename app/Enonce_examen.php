<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enonce_examen extends Model
{
   public function examen(){
        return $this->belongsTo('app\Examen');
   }


   public function matiere(){
     return $this->belongsTo('app\Matiere');
    }


    public function user(){
    return $this->belongsTo('app\User');
    }
}
