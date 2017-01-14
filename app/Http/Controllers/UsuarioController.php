<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;


//use \Cinema\Http\Request;
use \Cinema\Http\Requests\UserCreateRequest;
use \Cinema\Http\Requests\UserUpdateRequest;
//use \Cinema\Http\Controllers\Controller;
//use \Cinema\Http\Controller;
use \Cinema\User;

//use Sessions;
//use Redirect;

use  Illuminate\Support\Facades\Session;
use  Illuminate\Support\Facades\Redirect;
use  Illuminate\Routing\Route;


class UsuarioController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        //$this->middleware('admin');
        //$this->beforeFilter('@find', ['only' => ['edit','update','destroy']]);
    }

    /*public function find(Route $route){
        $this->user = User::find($route->getParameter('usuario'));
        return $this->user;
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = User::All();
        $users = User::paginate(4); //para usar el paginador
        return view('usuario.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {   

        //$this->validate($request, [
        //    'name' => 'required|max:255',
        //    'email' => 'required|email|max:255|unique:users',
        //    'password' => 'required|min:6|confirmed',
        //]);

        //return "aki stoy";
        User::create($request->all());

        //return '<strong> usuario registrado </strong>';
        return redirect('/usuario')->with('message','Usuario "'.$request['name'].'" Almacenado Correctamente');
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
        $user = User::find($id);
        return view('usuario.edit', ['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::find($id);
        $user->fill($request->all());
        $user->save();

        Session::flash('message', 'Usuario Editado Correctamente');
        return Redirect::to('/usuario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //User::destroy($id); ya no usaremos esto por que no queremos destriur el recurso...
        $user = User::find($id);
        $user->delete();
        Session::flash('message', 'Usuario Eliminado Correctamente');
        return Redirect::to('/usuario');
    }
}
