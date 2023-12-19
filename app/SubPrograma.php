<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubPrograma extends Model
{
    public $incrementing = false;
    protected $table = 'subprograma';
    protected $fillable= ['id','fK_programa', 'codSP', 'nomSP', 'slug'];

    public function getRouteKeyName() {
      return "slug";
    }

    //Relacion Uno a Muchos (Inversa)
    public function programa(){
        return $this->belongsTo(Programa::class, 'fK_programa', 'id');
    }

    //Relacion Uno a Muchos

    public function productos(){
        return $this->hasMany(Producto::class);
    }
}
