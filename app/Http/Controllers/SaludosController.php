<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaludosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //MOSTRAR LA TABLA USUARIOS
        return view("saludo");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //SIRVE PARA PODER TENER UN FORMULARIO CON LOS DATOS NUEVOS
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //INSERT INTO
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //BUSQUEDAS
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //PREVISUALIZAR LOS DATOS QUE SE VAN A MODIFICAR
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //SIRVE PARA MODIFICAR
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //ELIMINA UN REGISTRO
    }
}
