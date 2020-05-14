<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
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
        'model',
        'codigo',
        'numero_serie',
        'color',
        'size',
        'cantidad',
        'year',
        'usado',
        'probabilidad',
        'imagen',
        'user_id',
        'categoria_id',
        'estado',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'usado' => 'boolean',
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
