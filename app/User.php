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
        'name', 'email', 'password','niveau_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function statut(){
        return $this->belongsToMany('app\Statut');
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

}
