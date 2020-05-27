<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapitre extends Model
{
    public function cours(){
        return $this->belongsTo('app\Cours');
    }
}
