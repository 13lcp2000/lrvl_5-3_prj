<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;
use Cinema\Pelicula;

class FrontController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth',['only' => 'admin']);
    }

    public function index()
    {
    	return view('index');
    }

    public function contacto()
    {
    	return view('contacto');
    }

    public function resenias()
    {   
        $peliculas = Pelicula::Peliculas();
    	return view('resenias', compact('peliculas'));
    }

    public function admin()
    {
        return view('admin.index');
    }
}
