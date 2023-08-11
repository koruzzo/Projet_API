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
        $acteur = Acteur::all();
        return response()->json($acteur);
    }

    public function store(Request $request)
    {
        $acteur = new Acteur();
        $acteur->Nom = $request->Nom;
        $acteur->Prenom = $request->Prenom;
        $acteur->film_id = $request->film_id;
        $acteur->save();
        return response()->json($acteur);
    }

    public function detail($id)
    {
        $acteur = Acteur::find($id);
        return response()->json($acteur);
    }

    public function update(Request $request, $id)
    {
        $acteur = Acteur::find($id);
        $this->validate($request, [
            'Nom' => 'required|max:100',
            'Prenom' => 'required|max:100',
        ]);
        $acteur->update([
            "Nom" => $request->Nom,
            "Prenom" => $request->Prenom,
        ]);
        $acteur->save();
        return response()->json($acteur, 201);
    }

    public function destroy($id)
    {
        $acteur = Acteur::find($id);
        $acteur->delete();
        return response()->json(null, 204);
    }
}
