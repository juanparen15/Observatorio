<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    public $incrementing = false;
    protected $fillable= ['id','fK_pDes','codS', 'nomS', 'slug'];

    public function getRouteKeyName() {
      return "slug";
    }

   //Relacion Uno a Muchos (Inversa)
   public function planesDesarrollo(){
      return $this->belongsTo(PlanDesarrollo::class);
    }

   //Relacion Uno a Muchos 
   public function programas(){
     return $this->hasMany(Programa::class);
    }
}
