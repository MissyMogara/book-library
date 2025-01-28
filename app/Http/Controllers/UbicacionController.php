<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ubicacion;

class UbicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ubicaciones = Ubicacion::all();
        return view('admin.ubicaciones.ubicaciones_view', compact('ubicaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.ubicaciones.ubicacion_create_form");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ubicacion = new Ubicacion();
        $ubicacion->biblioteca = $request->input("biblioteca");
        $ubicacion->direccion = $request->input("direccion");
        $ubicacion->numero_estanterias = $request->input("numero_estanterias");
        $ubicacion->save();

        return redirect()->route("ubicaciones");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ubicacion = Ubicacion::findOrFail($id);
        return view('admin.ubicaciones.ubicacion_detalle', compact('ubicacion'));
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
    public function destroy($id)
    {
        $ubicacion = Ubicacion::findOrFail($id);
        $ubicacion->delete();
        return redirect()->route("ubicaciones");
    }
}
