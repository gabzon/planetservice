<?php

namespace App\Http\Controllers;

use App\Cotizacion;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $search = request()->query('search');            
        if ($search) {            
            $cotizacion = Cotizacion::where([['user_id', auth()->user()->id],['articulo', 'LIKE', "%{$search}%"]])->paginate(10);                        
        }else {
            $cotizacion = Cotizacion::where('user_id', auth()->user()->id)->paginate(10);
        }
        
        return view('home')->with('cotizaciones', $cotizacion);
    }
}
