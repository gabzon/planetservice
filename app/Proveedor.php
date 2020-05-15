<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'descripcion',
        'email',
        'whatsapp',
        'viber',
        'telegram',
        'wechat',
        'telefono',
        'direccion',
        'codigo_postal',
        'lugar',
        'estado',
        'pais',
        'facebook',
        'instagram',
        'youtube',
        'tiktok',
        'snapchat',
        'twitter',
        'es_empresa',
        'cantidad_de_venta',
        'contacto',
        'logo',
        'nif',
        'user_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
    ];


    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
}
