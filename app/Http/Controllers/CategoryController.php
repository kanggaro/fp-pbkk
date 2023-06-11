<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return $this->sendResponse(AuthorResource::collection($categories), 'Categories retrieved successfully.');
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

        $author = new Category();
        $author->name = $request->name;
        $author->description = $request->description;
        $author->save();

        return $this->sendResponse(AuthorResource::collection($author),  'Category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $author = Category::find($id);

        if (!$author) {
            return response()->json([
                'message' =>  'Category not found'
            ], 404);
        }

        return $this->sendResponse(AuthorResource::collection($author),  'Category retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $author = Category::find($id);

        if (!$author) {
            return response()->json([
                'message' =>  'Category not found'
            ], 404);
        }

        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $author->name = $request->name;
        $author->description = $request->description;
        $author->save();

        return $this->sendResponse(AuthorResource::collection($author),  'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Category::find($id);

        if (!$author) {
            return response()->json([
                'message' =>  'Category not found'
            ], 404);
        }

        $author->delete();

        return $this->sendResponse(AuthorResource::collection($author),  'Category deleted successfully.');
    }
}
