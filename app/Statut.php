<?php

namespace App;

use app;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Statut extends Model
{
    public function users(){
        return $this->belongsToMany('app\User');
    }
}
