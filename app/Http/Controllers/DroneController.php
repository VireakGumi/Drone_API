<?php

namespace App\Http\Controllers;

use App\Http\Resources\DroneResource;
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
        $drone = Drone::store($request);
        return response()->json(['success'=>true,'message'=>"You have create drone"]);
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Drone $drone,$id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Drone $drone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Drone $drone)
    {
        //
    }
}
