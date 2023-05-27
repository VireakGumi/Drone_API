<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstructionRequest;
use App\Http\Resources\DroneResource;
use App\Http\Resources\InstructionResource;
use App\Http\Resources\LocationResource;
use App\Models\Drone;
use App\Models\Instruction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DroneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drones = Auth::user()->drones;
        $drones = DroneResource::collection($drones);
        return response()->json(["success"=>true, "data"=>$drones],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $drone = Drone::create($request->all());
        return response()->json(['success'=>true, 'data' => $drone, 'message'=>"You have create drone"]);
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
        return response()->json(['success'=>true,'data'=>new DroneResource($drone)]);
        
    }
    public function updateInstruct(InstructionRequest $request , $id)
    {
        $drone = Drone::find($id);
        $instruct = $drone->instruction;            
        $instruct->update($request->all());
        return response()->json(['success'=>true,'data'=>new InstructionResource($instruct)]);
        
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Drone $drone)
    {
        //
    }
}
