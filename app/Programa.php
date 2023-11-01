<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    public $incrementing = false;
    protected $fillable= [
        'id',
        'fK_sector',
        'codProg',
        'nomProg',
        'slug'
    ];

    public function getRouteKeyName() {
      return "slug";
    }
     
    //Relacion Uno a Muchos (Inversa)
    public function sector(){
        return $this->belongsTo(Sector::class);
    }

    //Relacion Uno a Muchos 
    public function subprograma(){
        return $this->hasMany(SubPrograma::class);
    }
}
