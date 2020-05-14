<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\User;

class PerfilController extends Controller
{
    public function show()
    {
        return view('perfil.show')->with('user', auth()->user());
    }

    public function edit()
    {
        return view('perfil.edit')->with('user', auth()->user());
    }

    public function update(Request $request, User $user)
    {
        //dd($request->all());
        //dd($user);
        
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'biografia' => $request->biografia,
            'sexo' => $request->sexo,
            'telefono1' => $request->telefono1,
            'telefono2' => $request->telefono2,
            'direccion' => $request->direccion,
            'direccion2' => $request->direccion2,
            'codigo_postal' => $request->codigo_postal,
            'lugar' => $request->lugar,
            'estado' => $request->estado,
            'pais' => $request->pais,
            'avatar' => $request->avatar,
            'profession' => $request->profession,
            'es_empresa' => $request->es_empresa,
            'nombre_empresa' => $request->nombre_empresa,
        ]);

        $user->save();


        session()->flash('success', 'Su perfil ha sido actualizado exitosamente!');

        return redirect(route('perfil.show', auth()->user()->id));
    }

    public function destroy()
    {
    }
}

