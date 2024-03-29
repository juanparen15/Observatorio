<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanDesarrollo extends Model
{
    public $incrementing = false;
    protected $table = 'plandesarrollo';
    protected $fillable= ['id','anno','nomPD','slug'];

    public function getRouteKeyName() {
      return "slug";
    }
    

     //Relacion Uno a Muchos 
     public function sector(){
        return $this->hasMany(Sector::class);
    }
}