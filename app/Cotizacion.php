<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'articulo',
        'descripcion',
        'marca',
        'modelo',
        'codigo',
        'numero_serie',
        'color',
        'size',
        'cantidad',
        'year',
        'usado',
        'probabilidad',
        'imagen',
        'estado',
        'user_id',
        'categoria_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'categoria_id' => 'integer',
    ];


    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function categoria()
    {
        return $this->belongsTo(\App\Categoria::class);
    }
}
