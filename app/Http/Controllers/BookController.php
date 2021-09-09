<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MOdels\Book;
use Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($author)
    {
        $validator = Validator::make(['author' => $author], [
            'author' => 'required|numeric|exists:authors,id'
        ]);
        if($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->messages()], 422);
        }
        $books = Book::where('author_id', $author)->get();
        return response()->json($books, 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $author)
    {
        $validator = Validator::make(['author' => $author, 'name' => $request->name], [
            'author' => 'required|numeric|exists:authors,id',
            'name' => 'required|string'
        ]);
        if($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->messages()], 422);
        }
        $book = new Book;
        $book->author_id = $author;
        $book->name = $request->name;
        $saved = $book->save();
        if($saved){
            return response()->json(['success' => true, 'book_saved' => $book->id], 200);
        }else{
            return response()->json(['success' => false, 'errors' => 'Book not saved'], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($author, $id)
    {
        $validator = Validator::make(['author' => $author, 'id' => $id], [
            'author' => 'required|numeric|exists:authors,id',
            'id' => 'required|numeric|exists:books,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->messages()], 422);
        }
        $book = Book::where('author_id', $author)
            ->where('id', $id)
            ->first();
        return response()->json($book, 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $author, $id)
    {
        $validator = Validator::make(['author' => $author, 'id' => $id, 'new_author' => $request->new_author, 'name' => $request->name], [
            'author' => 'required|numeric|exists:authors,id',
            'new_author' => 'numeric|exists:authors,id',
            'id' => 'required|numeric|exists:books,id',
            'name' => 'string'
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->messages()], 422);
        }
        $book = Book::find($id);
        $book->author_id = $request->new_author;
        $book->name = $request->name;
        $updated = $author->save();
        if($updated){
            return response()->json(['success' => true, 'book_updated' => $id], 200);
        }else{
            return response()->json(['success' => false, 'errors' => 'Book not updated'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($author, $id)
    {
        $validator = Validator::make(['author' => $author, 'id' => $id], [
            'author' => 'required|numeric|exists:authors,id',
            'id' => 'required|numeric'
        ]);
        if($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->messages()], 422);
        }
        $deleted_book = Book::where('author_id', $author)
        ->where('id', $id)
        ->destroy();
        if($deleted_book){
            return response()->json(['success' => true, 'book_deleted' => $id], 200);
        }else{
            return response()->json(['success' => false, 'errors' => 'Book not deleted'], 404);
        }
    }
}
