<?php

namespace App;

use App\Cours;
use App\Niveau;
use App\Statut;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','niveau_id','statut_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function isAdmin(){
        return $this->statut_id===3;
    }

    public function isProf(){
        return $this->statut_id===2;
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function statut(){
        return $this->belongsTo('app\Statut');
    }

    public function cours(){
        return $this->hasMany('app\Cours');
    }

    public function niveau(){
        return $this->belongsTo('app\Niveau');
    }

    public function enonce_examen(){
        return $this->hasMany('app\Enonce_examen');
    }

    public function photo(){
        return $this->hasOne('app\Photo');
    }

    public function demandeProfesseur(){
        return $this->hasOne('app\DemandeProfesseur');
    }

}
