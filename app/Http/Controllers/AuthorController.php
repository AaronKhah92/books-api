<?php

namespace App\Http\Controllers;

use App\Models\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAllAuthors()
    {
        $authors = Author::get()->toJson(JSON_PRETTY_PRINT);
        return response($authors, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function showOneAuthor($id)
    {
        if (Author::where('id', $id)->exists()) {
            $author = Author::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($author, 200);
        } else {
            return response()->json([
                "message" => "Author not found",
            ], 404);
        }
    }

}
