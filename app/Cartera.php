<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cartera extends Model
{
    public $incrementing = false;
    protected $table = 'cartera';
    protected $fillable= ['id','codC','nomCar', 'slug'];

    public function getRouteKeyName() {
      return "slug";
    } 

    //Relacion Uno a Muchos 
    public function area(){
        return $this->hasMany(Area::class);
    }
}
