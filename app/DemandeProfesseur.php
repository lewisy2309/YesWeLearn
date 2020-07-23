<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DemandeProfesseur extends Model
{
    public function user(){
        return $this->belongsTo('app\User');
     }
}
