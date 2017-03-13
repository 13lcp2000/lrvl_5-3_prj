<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;
use Cinema\Http\Requests;
use Cinema\Http\Controllers\Controller;
use Cinema\Genero;
use Cinema\Pelicula;
use Session;
use Redirect;
use Illuminate\Routing\Route;

class PeliculaController extends Controller
{   

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
        //$this->beforeFilter('@find',['only' => ['edit','update','destroy']]);
    }

    /*public function find(Route $route){
        $this->movie = Movie::find($route->getParameter('pelicula'));
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return '<b> Estoy en el index :D </b>';
        $peliculas = Pelicula::Peliculas();
        return view('pelicula.index',compact('peliculas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return '</br><code><center> Esto seria el form para crear </center></code>';
        $generos = Genero::pluck('genero', 'id');
        return view('pelicula.create',compact('generos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pelicula::create($request->all());
        return "Listo";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->pelicula = Pelicula::find($id);
        $generos = Genero::pluck('genero', 'id');
        return view('pelicula.edit',['pelicula'=>$this->pelicula,'generos'=>$generos]);
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
        $this->pelicula = Pelicula::find($id);

        $this->pelicula->fill($request->all());
        $this->pelicula->save();

        Session::flash('message','Pelicula Editada Correctamente');
        return Redirect::to('/pelicula');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $this->pelicula = Pelicula::find($id);
        
        $this->pelicula->delete();
        Storage::delete($this->pelicula->ruta);
        Session::flash('message','Pelicula Eliminada Correctamente');
        return Redirect::to('/pelicula');
    }
}
