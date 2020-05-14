<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Pedido;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePedidoRequest;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pedidos.create')->with('categorias', Categoria::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePedidoRequest $request)
    {
        //dd($request->all());
        Pedido::create([
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

        session()->flash('success', 'Su pedido fue creado con exito');

        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {        
        return view('pedidos.show')->with('pedido', $pedido);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        $pedido->delete();

        session()->flash('success', 'Su pedido a sido borrado exitosamente');

        return redirect('home');
    }
}
