<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'citoyens';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 'prenom', 'email', 'password','com_id', 'pro_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function likes()
    {
        return $this->hasMany('App\User');
    }

    public function idee(){
        return $this->hasMany('App\Idee');
      }

    public function commune()
    {
        return $this->belongsTo('App\Commune','com_id');
    }

    public function prof()
    {
        return $this->belongsTo('App\Profession','pro_id');
    }

    public function maladies()
    {
        return $this->belongsToMany('App\Maladie', 'citoyen_maladies', 'cit_id', 'mal_id');
    }
}
