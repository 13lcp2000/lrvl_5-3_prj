<?php

namespace Cinema\Http\Controllers;

//use App\User;
//use Cinema\Http\Controllers\Controller;

class PruebaController extends Controller
{
    /**
     * Show the index 
     *
     * @return Response
     */
    public function index()
    {
        return 'Hola desde el PruebaController :D ';
    }

    public function nombre($nombre)
    {
        return 'Hola mi nombre es: '.$nombre;
    }
}
