<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Producto extends Model
{
    protected $fillable = [
        'fK_sProg',
        'fK_tProd',
        'fK_uMed',
        'fK_user',
        'codProd',
        'nomProd',
        'iB',
        'mCuatrienia',
        'slug'
    ];
    protected $with = [
        'subprograma',
        'tipoproducto',
        'unidadmedida',
        'area',
        'user'
    ];

    public function getRouteKeyName()
    {
        return "slug";
    }

    //Relacion Uno a Muchos (Inversa)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Relacion Uno a Muchos (Inversa)
    public function subprograma()
    {
        return $this->belongsTo(SubPrograma::class);
    }

    //Relacion Uno a Muchos (Inversa)
    public function tipoproducto()
    {
        return $this->belongsTo(TipoProducto::class);
    }

    //Relacion Uno a Muchos (Inversa)
    public function unidadmedida()
    {
        return $this->belongsTo(UnidadMedida::class);
    }

    //Relacion Uno a Muchos (Inversa)
    public function area()
    {
        return $this->belongsTo(Area::class, 'fK_area', 'id');
    }
}
