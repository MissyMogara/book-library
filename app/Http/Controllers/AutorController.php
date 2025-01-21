<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("autor_form");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $autor = new Autor();
        $autor->nombre = $request->input("nombre");
        $autor->nacionalidad = $request->input("nacionalidad");
        $autor->fecha_nacimiento = $request->input("fecha_nacimiento");
        $autor->biografia = $request->input("biografia");
        $autor->codigoDewey = $request->input("codigoDewey");
        $autor->save();

        return redirect()->route("autores.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Autor $autor)
    {
        return $autor;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
