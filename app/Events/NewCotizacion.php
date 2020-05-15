<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;

class NewCotizacion
{
    use SerializesModels;

    public $cotizacion;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($cotizacion)
    {
        $this->cotizacion = $cotizacion;
    }
}
