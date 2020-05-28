<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enonce_examen extends Model
{
   public function examen(){
        $this->belongsTo('app\Examen');
   }


   public function matiere(){
    $this->belongsTo('app\Matiere');
    }


    public function user(){
    $this->belongsTo('app\User');
    }
}
