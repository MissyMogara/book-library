<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ubicacion;
use App\Models\Libro;

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
        $request->validate([
            'biblioteca' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'numero_estanterias' => 'required|integer|min:1',
        ]);

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
        $libros = Libro::where('ubicacion_id', $id)->paginate(20);
        return view('admin.ubicaciones.ubicacion_detalle', compact('ubicacion', 'libros'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ubicacion = Ubicacion::findOrFail($id);
        return view('admin.ubicaciones.ubicacion_edit_form', ['ubicacion' => $ubicacion]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'biblioteca' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'numero_estanterias' => 'required|integer|min:1',
        ]);

        $ubicacion = Ubicacion::findOrFail($id);
        $ubicacion->update($request->all());
        return redirect()->route('ubicaciones');
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
