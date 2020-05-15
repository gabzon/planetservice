<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;

class NewCotization
{
    use SerializesModels;

    public $cotization;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($cotization)
    {
        $this->cotization = $cotization;
    }
}
