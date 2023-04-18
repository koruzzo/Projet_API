<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Acteur;
use App\Models\Film;
use Illuminate\Http\Request;

class ActeurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
           // On récupère tous les film
    $acteurs = Acteur::all();

    // On retourne les informations des films en JSON
    return response()->json($acteurs);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $acteur = new Acteur();
        $acteur->nom = $request->nom;
        $acteur->prenom = $request->prenom;
        $acteur->film_id = $request->film_id;

        $acteur->save();

    // On retourne les informations du nouveau film en JSON
    return response()->json($acteur);
    }

    /**
     * Display the specified resource.
     */
    public function show(Acteur $acteur)
    {
        // On retourne les informations du film en JSON
    return response()->json($acteur);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    $acteurs = Acteur::find($id);
            // La validation de données
    $this->validate($request, [
        'nom' => 'required|max:100',
        'prenom' => 'required|max:100',
    ]);

    // On modifie les informations du film
    $acteurs->update([
        "nom" => $request->nom,
        "prenom" => $request->prenom,

    ]);

    // On retourne la réponse JSON
    return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    $acteurs = Acteur::find($id);
            // On supprime le film
    $acteurs->delete();

    // On retourne la réponse JSON
    return response()->json();
    }

    function liste () 
    {
        return response ()->json(Acteur::all());
    }

    function detail ($id) 
    {
            return response()->json(Acteur::find($id));
    }

}