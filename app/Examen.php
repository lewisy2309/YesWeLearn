<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    public function niveau(){
        return $this->belongsTo('app\Niveau');
    }

    public function enonce_examen(){
        return $this->hasMany('app\Enonce_examen');
    }

}
