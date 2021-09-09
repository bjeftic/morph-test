<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\MOdels\Book;
use Validator;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();
        return response()->json($authors, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(['first_name' => $request->first_name, 'last_name' => $request->last_name], [
            'first_name' => 'required|string',
            'last_name' => 'required|string'
        ]);
        if($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->messages()], 422);
        }
        $author = new Author;
        $author->first_name = $request->first_name;
        $author->last_name = $request->last_name;
        $saved = $author->save();
        if($saved){
            return response()->json(['success' => true, 'author_saved' => $id], 200);
        }else{
            return response()->json(['success' => false, 'errors' => 'Author not found'], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->messages()], 422);
        }
        $author = Author::where('id', $id)->first();
        return response()->json($author, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(['id' => $id, 'first_name' => $request->first_name, 'last_name' => $request->last_name], [
            'id' => 'required|numeric',
            'first_name' => 'string',
            'last_name' => 'string'
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->messages()], 422);
        }
        $author = Author::find($id);
        $author->first_name = $request->first_name;
        $author->last_name = $request->last_name;
        $updated = $author->save();
        if($updated){
            return response()->json(['success' => true, 'author_updated' => $id], 200);
        }else{
            return response()->json(['success' => false, 'errors' => 'Author not updated'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->messages()], 422);
        }
        $deleted_books = Book::where('author_id', $id)->delete();
        $deleted_author = Author::destroy($id);
        if($deleted_author){
            return response()->json(['success' => true, 'author_deleted' => $id], 200);
        }else{
            return response()->json(['success' => false, 'errors' => 'Author not found'], 404);
        }
    }
}
