<?php

namespace App\Http\Controllers;

use App\Cotizacion;
use App\Categoria;
use App\Events\NewCotizacion;
use App\Http\Requests\CotizacionStoreRequest;
use App\Jobs\SyncMedia;
use App\Mail\ReviewNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CotizacionController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {        
        return view('cotizaciones.create')->with('categorias', Categoria::all());
    }

    /**
     * @param \App\Http\Requests\CotizacionStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CotizacionStoreRequest $request)
    {
        $cotizacion = Cotizacion::create([
            'articulo' => $request->articulo,
            'descripcion' => $request->descripcion,
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'codigo' => $request->codigo,
            'numero_serie' => $request->numero_serie,
            'color' => $request->color,
            'size' => $request->size,
            'cantidad' => $request->cantidad,
            'year' => $request->year,
            'usado' => $request->usado,
            'probabilidad' => $request->probabilidad,            
            'estado' => 'En espera',
            'user_id' => auth()->user()->id,
            'categoria_id' => $request->categoria, 
        ]);

        //Mail::to($cotizacion->user->email)->send(new ReviewNotification($cotizacion));

        //SyncMedia::dispatch($cotizacion);

        //event(new NewCotizacion($cotizacion));

        $request->session()->flash('success', 'Su pedido fue creado con exito' );

        return redirect()->route('home');
    }


    public function show(Cotizacion $cotizacion)
    {       
        //dd($cotizacion);
        return view('cotizaciones.show')->with('cotizacion', $cotizacion);
    }



    public function destroy(Cotizacion $cotizacion)
    {                
        $cotizacion->delete();

        session()->flash('success', 'Su cotizacion a sido borrado exitosamente');

        return redirect('home');
    }
}