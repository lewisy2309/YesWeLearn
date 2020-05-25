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

}
