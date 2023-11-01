<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public $incrementing = false;
    protected $fillable= ['id','fK_car', 'codA', 'nomA', 'slug'];

    public function getRouteKeyName() {
      return "slug";
    }
    
    //Relacion Uno a Muchos 
    public function productos(){
        return $this->hasMany(Producto::class);
    }

    //Relacion Uno a Muchos (Inversa)
    public function carteras(){
       return $this->belongsTo(Cartera::class);
    }
}