<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubPrograma extends Model
{
    public $incrementing = false;
    protected $fillable= ['id','fK_programa', 'codProg', 'nomProg', 'slug'];

    public function getRouteKeyName() {
      return "slug";
    }

    //Relacion Uno a Muchos (Inversa)
    public function programas(){
        return $this->belongsTo(Programa::class);
    }

    //Relacion Uno a Muchos

    public function productos(){
        return $this->hasMany(Producto::class);
    }
    // //Relacion Muchos a Muchos

    // public function planadquisiciones(){
    //     return $this->belongsToMany(Planadquisicione::class);
    // }
}
