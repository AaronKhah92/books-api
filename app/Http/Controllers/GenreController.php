<?php

namespace App\Http\Controllers;

use App\Models\Genre;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAllGenres()
    {
        $genres = Genre::get()->toJson(JSON_PRETTY_PRINT);
        return response($genres, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function showOneGenre($id)
    {
        if (Genre::where('id', $id)->exists()) {
            $genre = Genre::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($genre, 200);
        } else {
            return response()->json([
                "message" => "Genre not found",
            ], 404);
        }
    }
}
