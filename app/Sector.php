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
   public function planDesarrollo(){
      return $this->belongsTo(PlanDesarrollo::class);
    }

   //Relacion Uno a Muchos 
   public function clase(){
     return $this->hasMany(Clase::class);
    }
}
