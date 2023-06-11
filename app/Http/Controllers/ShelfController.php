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

        return response()->json([
            'data' => $shelves
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shelf = Shelf::find($id);

        if (!$shelf) {
            return response()->json([
                'message' => 'Shelf not found'
            ], 404);
        }
        return response()->json([
            'data' => $shelf
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shelf  $shelf
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $request->validate([
            'number' => 'required',
            'location' => 'required',
        ]);

        $shelf = new Shelf();
        $shelf->number = $request->number;
        $shelf->location = $request->location;
        $shelf->save();

        return response()->json([
            'message' => 'Shelf created successfully',
            'data' => $shelf
        ], 201);
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
                'message' => 'Shelf not found'
            ], 404);
        }

        $request->validate([
            'number' => 'required',
            'location' => 'required',
        ]);

        $shelf->number = $request->number;
        $shelf->location = $request->location;
        $shelf->save();

        return response()->json([
            'message' => 'Shelf updated successfully',
            'data' => $shelf
        ]);
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
                'message' => 'Shelf not found'
            ], 404);
        }

        $shelf->delete();

        return response()->json([
            'message' => 'Shelf deleted successfully'
        ]);
    }
}
