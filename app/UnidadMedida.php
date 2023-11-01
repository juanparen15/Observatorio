<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnidadMedida extends Model
{
    public $incrementing = false;
    protected $fillable= ['id','nomUMed','slug'];

    public function getRouteKeyName() {
      return "slug";
    }
    

     //Relacion Uno a Muchos 
     public function productos(){
        return $this->hasMany(Producto::class);
    }
}