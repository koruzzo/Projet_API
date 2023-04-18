<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
           // On récupère tous les film
    $films = Film::all();

    // On retourne les informations des films en JSON
    return response()->json($films);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $film = new Film();
        $film->title = $request->title;
        $film->content = $request->content;
        $film->release_date = $request->release_date;

        $film->save();

    // On retourne les informations du nouveau film en JSON
    return response()->json($film);
    }

    /**
     * Display the specified resource.
     */
    public function show(Film $films)
    {
        // On retourne les informations du film en JSON
    return response()->json($films);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    $films = Film::find($id);
            // La validation de données
    $this->validate($request, [
        'title' => 'required|max:100',
        'content' => 'required|max:100',
        'release_date' => 'date_format:Y-m-d'
    ]);

    // On modifie les informations du film
    $films->update([
        "title" => $request->title,
        "content" => $request->content,
        "release_date" => $request->release_date
    ]);

    // On retourne la réponse JSON
    return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    $films = Film::find($id);
            // On supprime le film
    $films->delete();

    // On retourne la réponse JSON
    return response()->json();
    }

    function liste () 
    {
        return response ()->json(Film::all());
    }

    function detail ($id) 
    {
            return response()->json(Film::find($id));
    }

}