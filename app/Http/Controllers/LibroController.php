<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\Autor;
use App\Models\Ubicacion;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

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
            'titulo' => 'required|string|max:255',
            'isbn' => 'required|string|max:20|unique:libros,isbn',
            'anio_publicacion' => 'required|integer|min:1500|max:' . date('Y'),
            'estado' => 'required|in:disponible,prestado,extraviado',
            'autor_id' => 'required|exists:autores,id',
            'ubicacion_id' => 'required|exists:ubicaciones,id',
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
            $path = $file->storeAs('portadas', $filename, 'public');
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
    public function edit($id)
    {
        $libro = Libro::findOrFail($id);
        return view('admin.libros.libro_edit_form', ['libro' => $libro]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $libro = Libro::findOrFail($id);

        $old_filename = $libro->portada;

        $libro->update($request->except('portada'));

        $request->validate([
            'titulo' => 'required|string|max:255',
            'isbn' => 'required|string|max:20|unique:libros,isbn,' . $libro->id,
            'anio_publicacion' => 'required|integer|min:1500|max:' . date('Y'),
            'estado' => 'required|in:disponible,prestado,extraviado',
            'autor_id' => 'required|exists:autores,id',
            'ubicacion_id' => 'required|exists:ubicaciones,id',
            'portada' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('portada')) {

            Storage::delete('public/portadas/' . $old_filename);
            $file = $request->file('portada');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('portadas', $filename, 'public');
            $libro->portada = $filename;
            $libro->save();
        }


        return redirect()->route('dashboard');
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

    /**
     * Search libros by request.
     */
    public function buscar(Request $request)
    {
        $query = $request->input('libro_query');
        $opcion = $request->input('opcion');

        $validColumns = ['titulo', 'autor', 'ubicacion', 'isbn', 'estado'];
        if (!in_array($opcion, $validColumns)) {
            $opcion = 'titulo';
        }

        $librosQuery = Libro::with(['autor', 'ubicacion']);


        if ($opcion == 'autor') {
            $librosQuery->whereHas('autor', function ($q) use ($query) {
                $q->where('nombre', 'like', "%$query%");
            });
        } elseif ($opcion == 'ubicacion') {
            $librosQuery->whereHas('ubicacion', function ($q) use ($query) {
                $q->where('biblioteca', 'like', "%$query%");
            });
        } else {
            $librosQuery->where($opcion, 'like', "%$query%");
        }

        $libros = $librosQuery->paginate(50);
        return view('dashboard', compact('libros'));
    }
}
