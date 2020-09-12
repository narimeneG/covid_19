<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chiffre extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [];
    protected $table = 'stats';
    
    public function wilaya()
    {
        return $this->belongsTo('App\Wilaya','wilaya_id');
    }
}
