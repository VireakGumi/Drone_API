<?php

namespace App\Http\Controllers;

use App\Http\Requests\MapRequset;
use App\Http\Resources\MapResource;
use App\Models\Map;
use App\Models\Province;
use Illuminate\Http\Request;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $maps = Map::all();
        $maps = MapResource::collection($maps);
        return response()->json(['message' => 'Here are the images that drone camera have made.', 'data' => $maps , 'status' => 200]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MapRequset $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($provinceName, $farmId)
    {
        //

    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Map $map)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($provinceName, $farmId)
    {
        //
    }
}
