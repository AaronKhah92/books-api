<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAllBooks()
    {
        $books = Book::get()->toJson(JSON_PRETTY_PRINT);
        return response($books, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showOneBook($id)
    {
        if (Book::where('id', $id)->exists()) {
            $book = Book::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($book, 200);
        } else {
            return response()->json([
                "message" => "Book not found",
            ], 404);
        }
    }

    public function showAllAuthorsFromBook($id)
    {
        if (Book::where('id', $id)->exists()) {
            $authors = Book::find($id)->authors()->orderBy('name')->get()->toJson(JSON_PRETTY_PRINT);
            return response($authors, 200);
        } else {
            return response()->json([
                "message" => "Author not found",
            ], 404);
        }
    }

    public function showOneAuthorFromBook($id, $author_id)
    {
        if (Book::where('id', $id)->exists() && Author::where('id', $author_id)->exists()) {
            $author = Book::find($id)->authors()->where('author_id', $author_id)->orderBy('name')->get()->toJson(JSON_PRETTY_PRINT);
            return response($author, 200);
        } else {
            return response()->json([
                "message" => "Author not found",
            ], 404);
        }
    }
}
