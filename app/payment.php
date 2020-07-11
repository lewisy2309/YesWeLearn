<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable=['cours_id','montant','part_professeur','part_YesWeLearn','email'];

    public function cours(){
        return $this->belongsTo('app\Cours');
    }
}
