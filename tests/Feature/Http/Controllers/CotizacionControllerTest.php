<?php

namespace Tests\Feature\Http\Controllers;

use App\Cotizacion;
use App\Events\NewCotizacion;
use App\Jobs\SyncMedia;
use App\Mail\ReviewNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CotizacionController
 */
class CotizacionControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('cotizacion.create'));

        $response->assertOk();
        $response->assertViewIs('cotizaciones.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CotizacionController::class,
            'store',
            \App\Http\Requests\CotizacionStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $articulo = $this->faker->word;
        $descripcion = $this->faker->text;

        Mail::fake();
        Queue::fake();
        Event::fake();

        $response = $this->post(route('cotizacion.store'), [
            'articulo' => $articulo,
            'descripcion' => $descripcion,
        ]);

        $cotizacions = Cotizacion::query()
            ->where('articulo', $articulo)
            ->where('descripcion', $descripcion)
            ->get();
        $this->assertCount(1, $cotizacions);
        $cotizacion = $cotizacions->first();

        $response->assertRedirect(route('home'));
        $response->assertSessionHas('success.cotizacion', $success->cotizacion);

        Mail::assertSent(ReviewNotification::class, function ($mail) use ($cotizacion) {
            return $mail->hasTo($cotizacion->user) && $mail->cotizacion->is($cotizacion);
        });
        Queue::assertPushed(SyncMedia::class, function ($job) use ($cotizacion) {
            return $job->cotizacion->is($cotizacion);
        });
        Event::assertDispatched(NewCotizacion::class, function ($event) use ($cotizacion) {
            return $event->cotizacion->is($cotizacion);
        });
    }
}
