<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peliculas = Pelicula::with('proyecciones')->get();
        return view('peliculas.index', ['peliculas' => $peliculas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peliculas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
        ], [
            'titulo.required' => 'El titulo es obligatorio.',
            'titulo.max' => 'El titulo no puede tener más de 255 caracteres.',
        ]);

        $pelicula = new Pelicula();
        $pelicula->titulo = $validated['titulo'];
        $pelicula->save();

        return redirect()->route('peliculas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelicula $pelicula)
    {
        return view('peliculas.show', ['pelicula' => $pelicula]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelicula $pelicula)
    {
        return view('peliculas.edit', ['pelicula' => $pelicula ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelicula $pelicula)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
        ], [
            'titulo.required' => 'El titulo es obligatorio.',
            'titulo.max' => 'El titulo no puede tener más de 255 caracteres.',
        ]);

        $pelicula->titulo = $validated['titulo'];
        $pelicula->save();

        return redirect()->route('peliculas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelicula $pelicula)
    {

        foreach ($pelicula->proyecciones as $proyeccion) {
            if ($proyeccion->entradas->count() >= 1){
                session()->flash('error', 'Esta pelicula ya tiene entradas vendidas.');
                return redirect()->route('peliculas.index');
            };
        }

        $pelicula->delete();
        return redirect()->route('peliculas.index')->with('success', 'Película eliminada correctamente.');
    }

}
