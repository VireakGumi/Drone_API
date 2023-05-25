<?php

namespace App\Http\Controllers;

use App\Http\Resources\DroneResource;
use App\Http\Resources\LocationResource;
use App\Models\Drone;
use Illuminate\Http\Request;

class DroneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drones = Drone::all();
        $drones = DroneResource::collection($drones);
        return response()->json(["success"=>true, "data"=>$drones],200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $drone = Drone::create($request->all());
        return response()->json(['success'=>true,'message'=>"You have create drone"]);
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Drone $drone,$id)
    {
        $drone = Drone::find($id);
        $drone = new DroneResource($drone);
        return response()->json(['success'=>true,'data'=>$drone]);
    }

    public function showLocation(Drone $drone,$id)
    {
        $drone = Drone::find($id);
        $droneLocation = new LocationResource($drone->location);
        return response()->json(['success'=>true,'data'=>$droneLocation]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Drone $drone, $id)
    {
        $drone = Drone::find($id);
        $drone->update($request->all());
        return response()->json(['success'=>true,'data'=>$drone]);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Drone $drone)
    {
        //
    }
}
