<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Acteur;
use App\Models\Film;
use Illuminate\Http\Request;

class ActeurController extends Controller
{

    public function index()
    {
        $acteurs = Acteur::all();
        return response()->json($acteurs);
    }

    public function store(Request $request)
    {
        $acteur = new Acteur();
        $acteur->nom = $request->Nom;
        $acteur->prenom = $request->Prenom;
        $acteur->film_id = $request->film_id;
        $acteur->save();
        return response()->json($acteur);
    }

    public function show(Acteur $acteur)
    {
        return response()->json($acteur);
    }

    public function update(Request $request, $id)
    {
        $acteurs = Acteur::find($id);
        $this->validate($request, [
            'nom' => 'required|max:100',
            'prenom' => 'required|max:100',
        ]);
        $acteurs->update([
            "nom" => $request->nom,
            "prenom" => $request->prenom,
        ]);
        return response()->json();
    }

    public function destroy($id)
    {
        $acteurs = Acteur::find($id);
        $acteurs->delete();
        return response()->json();
    }

    function liste()
    {
        return response()->json(Acteur::all());
    }

    function detail($id)
    {
        return response()->json(Acteur::find($id));
    }
}
