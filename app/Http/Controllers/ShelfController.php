<?php

namespace App\Http\Controllers;

use App\Models\Shelf;
use Illuminate\Http\Request;

class ShelfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shelves = Shelf::all();

        return $this->sendResponse(AuthorResource::collection($shelves), 'Shelves retrieved successfully.');
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

        $shelf = new Shelf();
        $shelf->name = $request->name;
        $shelf->description = $request->description;
        $shelf->save();

        return $this->sendResponse(AuthorResource::collection($shelf),  'Shelf created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shelf  $shelf
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shelf = Shelf::find($id);

        if (!$shelf) {
            return response()->json([
                'message' =>  'Shelf not found'
            ], 404);
        }

        return $this->sendResponse(AuthorResource::collection($shelf),  'Shelf retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shelf  $shelf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $shelf = Shelf::find($id);

        if (!$shelf) {
            return response()->json([
                'message' =>  'Shelf not found'
            ], 404);
        }

        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $shelf->name = $request->name;
        $shelf->description = $request->description;
        $shelf->save();

        return $this->sendResponse(AuthorResource::collection($shelf),  'Shelf updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shelf  $shelf
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shelf = Shelf::find($id);

        if (!$shelf) {
            return response()->json([
                'message' =>  'Shelf not found'
            ], 404);
        }

        $shelf->delete();

        return $this->sendResponse(AuthorResource::collection($shelf),  'Shelf deleted successfully.');
    }
}
