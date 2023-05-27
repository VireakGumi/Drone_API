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
        return response()->json(['message' => 'Here are the images that drone camera have made.', 'data' => $maps, 'status' => 200]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MapRequset $request)
    {
        //
        $map = Map::create($request->all());
        $map = new MapResource($map);
        return response()->json(['message' => 'Drone have capture a photo.', 'data' => $map, 'status' => 200]);
    }

    /**
     * Display the specified resource.
     */
    public function show($provinceName, $farmId)
    {
        //
        $province = Province::where('name', $provinceName)->first();
        if ($province == null) {
            return response()->json(['Access' => false, 'message' => 'Undefine province name ' . $provinceName . ' in our data', 'status' => 404]);
        }
        $farms = $province->farms->where('id', $farmId)->first();
        if ($farms == null) {
            return response()->json(['Access' => false, 'message' => 'Undefine farm number ' . $farmId . ' in our data', 'status' => 404]);
        }
        $maps = MapResource::collection($farms->maps);
        return response()->json(['message' => 'There are all the photos of ' . $provinceName . ' in farm number ' . $farmId, 'data' => $maps, 'status' => 200]);
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
        $province = Province::where('name', $provinceName)->first();
        $farms = $province->farms->where('id', $farmId)->first();
        if ($farms->maps == null) {
            return response()->json(['Message' => 'Farm number ' . $farmId . ' in ' . $provinceName . " don't have any data to delete", 'status' => 200]);
        }
        foreach ($farms->maps as $map) {
            $map->delete();
        }
        return response()->json(['message' => 'Completely delete the images from' . $provinceName . ' in farm number ' . $farmId, 'status' => 200]);
    }
}
