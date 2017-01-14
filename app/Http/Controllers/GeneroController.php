<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;
use Cinema\Genero;
use Cinema\Http\Requests;

use Cinema\Http\Requests\GeneroRequest;

class GeneroController extends Controller
{
    
    /**
     * Display a listing of the resource in JSON format.
     *
     * @return \Illuminate\Http\Response
     */
    public function listing()
    {
       $generos = Genero::all(); 
       
        return response()->json(
        $generos->toArray()
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('genero.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('genero.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GeneroRequest $request)
    {
        if ($request->ajax()) { 
            Genero::create($request->all());
            return response()->json(["mensaje" => "creado"]);
        }
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
        $genero = Genero::find($id);
        return response()->json(
            $genero->toArray()
        );
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
        $genero = Genero::find($id);
        $genero->fill($request->all());
        $genero->save();

        return response()->json([
            "mensaje" => "listo"
        ]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $genero = Genero::find($id);
        $genero->delete();
        return response()->json([
            "mensaje"=>"borrado"
        ]);
    }
}
