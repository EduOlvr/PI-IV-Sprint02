<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function index()
{
    $consultas = Consulta::orderBy('data', 'asc')->orderBy('hora', 'asc')->get();
    return view('consultas', compact('consultas'));
}

}
