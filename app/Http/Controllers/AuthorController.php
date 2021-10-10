<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;

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

    public function showAllBooksFromAuthor($id)
    {
        if (Author::where('id', $id)->exists()) {
            $books = Author::find($id)->books()->orderBy('title')->get()->toJson(JSON_PRETTY_PRINT);
            return response($books, 200);
        } else {
            return response()->json([
                "message" => "Book not found",
            ], 404);
        }
    }

    public function showOneBookFromAuthor($id, $book_id)
    {
        if (Author::where('id', $id)->exists() && Book::where('id', $book_id)->exists()) {
            $book = Author::find($id)->books()->where('book_id', $book_id)->orderBy('title')->get()->toJson(JSON_PRETTY_PRINT);
            return response($book, 200);
        } else {
            return response()->json([
                "message" => "Book not found",
            ], 404);
        }
    }

}
