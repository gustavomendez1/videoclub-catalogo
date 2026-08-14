<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class APICatalogController extends Controller
{
    public function index() {
        return response()->json(Movie::all());
    }

    public function show($id) {
        return response()->json(Movie::findOrFail($id));
    }

    public function store(Request $request) {
        $movie = new Movie();
        $movie->title = $request->input('title');
        $movie->year = $request->input('year');
        $movie->director = $request->input('director');
        $movie->poster = $request->input('poster');
        $movie->synopsis = $request->input('synopsis');
        $movie->save();

        return response()->json(['error' => false, 'msg' => 'Película guardada con éxito']);
    }

    public function update(Request $request, $id) {
        $movie = Movie::findOrFail($id);
        
        // Evitamos sobreescribir con vacíos usando una condición rápida
        if($request->has('title')) $movie->title = $request->input('title');
        if($request->has('year')) $movie->year = $request->input('year');
        if($request->has('director')) $movie->director = $request->input('director');
        if($request->has('poster')) $movie->poster = $request->input('poster');
        if($request->has('synopsis')) $movie->synopsis = $request->input('synopsis');
        
        $movie->save();
        return response()->json(['error' => false, 'msg' => 'Película modificada con éxito']);
    }

    public function destroy($id) {
        $movie = Movie::findOrFail($id);
        $movie->delete();
        return response()->json(['error' => false, 'msg' => 'Película eliminada con éxito']);
    }

    public function putRent($id) {
        $movie = Movie::findOrFail($id);
        $movie->rented = true;
        $movie->save();
        return response()->json(['error' => false, 'msg' => 'La película se ha marcado como alquilada']);
    }

    public function putReturn($id) {
        $movie = Movie::findOrFail($id);
        $movie->rented = false;
        $movie->save();
        return response()->json(['error' => false, 'msg' => 'La película se ha devuelto correctamente']);
    }
}