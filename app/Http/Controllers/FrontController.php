<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
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
    	return view('resenias');
    }

    public function admin()
    {
        return view('admin.index');
    }
}
