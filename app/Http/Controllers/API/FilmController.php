<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index()
    {
        $film = Film::with('acteurs')->get();
        return response()->json($film);
    }

    public function store(Request $request)
    {
        $film = new Film();
        $film->title = $request->title;
        $film->content = $request->content;
        $film->release_date = $request->release_date;
        $film->save();
        return response()->json($film);
    }

    public function detail($id)
    {
        return response()->json(Film::with('acteurs')->where('id', '=', $id)->get());
    }

    public function update(Request $request, $id)
    {
        $film = Film::find($id);
        $this->validate($request, [
            'title' => 'required|max:100',
            'content' => 'required|max:100',
            'release_date' => 'date_format:Y-m-d'
        ]);
        $film->update([
            "title" => $request->title,
            "content" => $request->content,
            "release_date" => $request->release_date
        ]);
        $film->save();
        return response()->json($film, 201);
    }

    public function destroy($id)
    {
        $film = Film::find($id);
        $film->delete();

        return response()->json(null, 204);
    }
}

