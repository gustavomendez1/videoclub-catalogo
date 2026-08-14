<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie; // Importamos el modelo Movie para interactuar con MySQL
use App\Models\Rental; // <-- Añade esto arriba junto al de Movie

class CatalogController extends Controller
{
    // 1. LISTADO DE PELÍCULAS (INDEX)
    public function getIndex()
    {
        $peliculas = Movie::all();
        return view('catalog.index', ['arrayPeliculas' => $peliculas]);
    }

    // 2. DETALLE DE UNA PELÍCULA (SHOW)
    public function getShow($id)
    {
        $pelicula = Movie::findOrFail($id);
        return view('catalog.show', [
            'pelicula' => $pelicula,
            'id' => $id
        ]);
    }

    // 3. VISTA DEL FORMULARIO DE CREACIÓN (GET)
    public function getCreate()
    {
        return view('catalog.create');
    }

    // 4. PROCESAR ALMACENAMIENTO DE NUEVA PELÍCULA (POST)
    public function postCreate(Request $request)
{
    $pelicula = new Movie;
    $pelicula->title = $request->input('title');
    $pelicula->year = $request->input('year');
    $pelicula->director = $request->input('director');
    
    // 💡 ESTA ES LA LÍNEA CRUCIAL QUE FALTA:
    $pelicula->poster = $request->input('poster'); 
    
    $pelicula->synopsis = $request->input('synopsis');
    $pelicula->rented = false; 
    
    $pelicula->save(); // Aquí se guarda físicamente en MySQL

    return redirect('/catalog');
}
    // 5. VISTA DEL FORMULARIO DE EDICIÓN (GET)
    public function getEdit($id)
    {
        $pelicula = Movie::findOrFail($id);
        return view('catalog.edit', [
            'pelicula' => $pelicula,
            'id' => $id
        ]);
    }

    // 6. PROCESAR LA ACTUALIZACIÓN DE UNA PELÍCULA (PUT)
    public function putEdit(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);
        
        // Mapeo estricto de campos para evitar errores de restricción de integridad (SQLSTATE[23000])
        $movie->title = $request->input('title');
        $movie->year = $request->input('year');
        $movie->director = $request->input('director');
        $movie->synopsis = $request->input('synopsis');

        // Modifica el póster solo si se arrastra un archivo nuevo
        if ($request->hasFile('poster')) {
            $file = $request->file('poster');
            $path = $file->store('posters', 'public');
            $movie->poster = $path;
        }

        $movie->save();
        return redirect('/catalog/show/' . $id);
    }

   // Recuerda asegurarte de importar tu modelo al inicio del archivo si no está:
// use App\Models\Movie; 

public function putRent($id) {
    // 1. Buscamos la película por el ID que viene de la ruta
    $pelicula = Movie::findOrFail($id);
    $pelicula->rented = true;
    $pelicula->save();

    // 2. Creamos el registro en la tabla 'rentals'
    $alquiler = new Rental();
    
    // 🎬 Aquí va el ID de la película (el $id que recibe la función)
    $alquiler->movie_id = $id; 
    
    // 👤 ¡AQUÍ ESTABA EL DETALLE! 
    // Usamos auth()->id() para capturar el ID del USUARIO logueado, NO el de la película
    $alquiler->user_id = auth()->id(); 
    
    $alquiler->rented_at = now();
    $alquiler->save(); // Guardamos en MySQL

    return redirect('/catalog/show/' . $id)->with('notification', 'Película alquilada con éxito.');
}
public function putReturn($id) {
    $pelicula = Movie::findOrFail($id);
    $pelicula->rented = false;
    $pelicula->save();

    // Busca el alquiler abierto de esta película
    $alquilerActivo = Rental::where('movie_id', $id)
                            ->whereNull('returned_at')
                            ->latest()
                            ->first();

    if ($alquilerActivo) {
        $alquilerActivo->returned_at = now();
        $alquilerActivo->save();
    }

    return redirect('/catalog/show/' . $id)->with('notification', 'Película devuelta con éxito.');
}

public function deleteMovie($id) {
    $pelicula = Movie::findOrFail($id);
    $pelicula->delete();

    return redirect('/catalog')->with('notification', 'La película ha sido eliminada del catálogo.');
}

}