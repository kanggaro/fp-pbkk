<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publishers = Publisher::all();

        return $this->sendResponse(AuthorResource::collection($publishers), 'Products retrieved successfully.');
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

        $publisher = new Publisher();
        $publisher->name = $request->name;
        $publisher->description = $request->description;
        $publisher->save();

        return $this->sendResponse(AuthorResource::collection($publisher), 'Publisher created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $publisher = Publisher::find($id);

        if (!$publisher) {
            return response()->json([
                'message' => 'Publisher not found'
            ], 404);
        }

        return $this->sendResponse(AuthorResource::collection($publisher), 'Publisher retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $publisher = Publisher::find($id);

        if (!$publisher) {
            return response()->json([
                'message' => 'Publisher not found'
            ], 404);
        }

        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $publisher->name = $request->name;
        $publisher->description = $request->description;
        $publisher->save();

        return $this->sendResponse(AuthorResource::collection($publisher), 'Publisher updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publisher = Publisher::find($id);

        if (!$publisher) {
            return response()->json([
                'message' => 'Publisher not found'
            ], 404);
        }

        $publisher->delete();

        return $this->sendResponse(AuthorResource::collection($publisher), 'Publisher deleted successfully.');
    }
}
