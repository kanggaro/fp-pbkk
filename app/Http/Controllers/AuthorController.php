<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

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

        return $this->sendResponse(AuthorResource::collection($authors), 'Authors retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $author = new Author();
        $author->name = $request->name;
        $author->description = $request->description;
        $author->save();

        return $this->sendResponse(AuthorResource::collection($author), 'Author created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'message' => 'Author not found'
            ], 404);
        }

        return $this->sendResponse(AuthorResource::collection($author), 'Author retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'message' => 'Author not found'
            ], 404);
        }

        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $author->name = $request->name;
        $author->description = $request->description;
        $author->save();

        return $this->sendResponse(AuthorResource::collection($author), 'Author updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'message' => 'Author not found'
            ], 404);
        }

        $author->delete();

        return $this->sendResponse(AuthorResource::collection($author), 'Author deleted successfully.');
    }
}
