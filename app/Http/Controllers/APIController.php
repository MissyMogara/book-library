<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\Autor;
use Illuminate\Support\Facades\Auth;

class APIController extends Controller
{
    // /**
    //  * API login.
    //  */
    // public function login(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required'
    //     ]);

    //     if (!Auth::attempt($credentials)) {
    //         return response()->json(['message' => 'Credenciales inválidas'], 401);
    //     }

    //     $user = Auth::user();
    //     $token = $user->createToken('authToken')->plainTextToken;

    //     return response()->json(['token' => $token]);
    // }
    /**
     * Display a listing of the resource.
     */
    public function libros() //GET /api/v1/libros 
    {
        $libros = Libro::with(['autor', 'ubicacion']);
        return response()->json($libros->paginate(50));
    }

    /**
     * Display a listing of the resource.
     */
    public function autores() //GET /api/v1/autores 
    {
        $autores = Autor::paginate(50);
        return response()->json($autores);
    }

    /**
     * Display books by isbn.
     */
    public function librosByIsbn(string $isbn) //GET /api/v1/libros/isbn/{isbn}
    {
        $libros = Libro::where('isbn', $isbn)->with(['autor', 'ubicacion'])->get();
        return response()->json($libros);
    }

    /**
     * Display books by author.
     */
    public function librosByAutor(string $autor_id) //GET /api/v1/libros/autor/{autor_id}
    {
        $libros = Libro::where('autor_id', $autor_id)->with(['autor', 'ubicacion'])->get();
        return response()->json($libros);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'isbn' => 'required',
            'titulo' => 'required',
            'autor_id' => 'required',
            'ubicacion_id' => 'required'
        ]);

        $libro = new Libro();
        $libro->titulo = $request->titulo;
        $libro->isbn = $request->isbn;
        $libro->portada = $request->portada;
        $libro->anio_publicacion = $request->anio_publicacion;
        $libro->estado = $request->estado;
        $libro->autor_id = $request->autor_id;
        $libro->ubicacion_id = $request->ubicacion_id;
        $libro->save();

        return response()->json(['message' => 'Libro creado']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
    public function destroy(string $isbn)
    {
        $libro = Libro::where('isbn', $isbn)->first();
        if ($libro) {
            $libro->delete();
            return response()->json(['message' => 'Libro eliminado']);
        }
        return response()->json(['message' => 'Libro no encontrado'], 404);
    }
}
