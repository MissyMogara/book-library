<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\Autor;
use App\Models\Ubicacion;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros = Libro::with(['autor', 'ubicacion'])->paginate(50);

        // $autores = Autor::all();
        // $ubicaciones = Ubicacion::all();

        return view('dashboard', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.libros.libro_create_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'portada' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $libro = new Libro();
        $libro->titulo = $request->titulo;
        $libro->anio_publicacion = $request->anio_publicacion;
        $libro->isbn = $request->isbn;
        $libro->estado = $request->estado;
        $libro->ubicacion_id = $request->ubicacion_id;
        $libro->autor_id = $request->autor_id;

        if ($request->hasFile('portada')) {
            $file = $request->file('portada');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/portadas', $filename);
            $libro->portada = $filename;
        }

        $libro->save();

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $libro = Libro::with(['autor', 'ubicacion'])->findOrFail($id);
        return view('admin.libros.libro_detalle', compact('libro'));
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
        $libro = Libro::findOrFail($id);
        $libro->delete();
        return redirect()->route('dashboard');
    }
}
