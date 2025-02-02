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
        $autores = Autor::paginate(25);
        return view('admin.autores.autores_view', compact('autores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.autores.autor_create_form");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'nacionalidad' => 'required|string|max:100',
            'fecha_nacimiento' => 'required|date|before:today',
            'biografia' => 'nullable|string',
            'codigoDewey' => 'required|string|size:3|regex:/^[0-9]{3}$/',
        ]);

        $autor = new Autor();
        $autor->nombre = $request->input("nombre");
        $autor->nacionalidad = $request->input("nacionalidad");
        $autor->fecha_nacimiento = $request->input("fecha_nacimiento");
        $autor->biografia = $request->input("biografia");
        $autor->codigoDewey = $request->input("codigoDewey");
        $autor->save();

        return redirect()->route("dashboard");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $autor = Autor::findOrFail($id);
        return view('admin.autores.autor_detalle', compact('autor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $autor = Autor::findOrFail($id);
        return view('admin.autores.autor_edit_form', ['autor' => $autor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'nacionalidad' => 'required|string|max:100',
            'fecha_nacimiento' => 'required|date|before:today',
            'biografia' => 'nullable|string',
            'codigoDewey' => 'required|string|size:3|regex:/^[0-9]{3}$/',
        ]);

        $autor = Autor::findOrFail($id);
        $autor->update($request->all());
        return redirect()->route('autores');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $autor = Autor::findOrFail($id);
        $autor->delete();
        return redirect()->route("autores");
    }

    /**
     * Search for a specifics authors.
     */
    public function buscar(Request $request)
    {
        $query = $request->input('autor_query');
        $opcion = $request->input('opcion', 'nombre');

        $autores = Autor::where($opcion, 'like', "%$query%")->paginate(25);

        return view('admin.autores.autores_view', compact('autores'));
    }
}
