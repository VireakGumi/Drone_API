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
        if($drones != null) {
            return response()->json(["success"=>true, "data"=>$drones],200);
        }
        return response()->json(["success"=>false, "message" => "You don't any drone"],401);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $drone = Drone::create($request->all());
        $drone = new DroneResource($drone);
        return response()->json(['success'=>true, 'data' => $drone, 'message'=>"You have create drone", 'status' => 200]);
    }
    
    
    /**
     * Display the specified resource.
     */
    public function show(Drone $drone,$id)
    {
        $drone = Auth::user()->drones->find($id);
        $drone = new DroneResource($drone);
        if ($drone != null){
            return response()->json(['success'=>true,'data'=>$drone]);
        }
        return response()->json(["success"=>false, "message" => "You don't any drone with an id $id"],401);

    }

    public function showLocation(Drone $drone,$id)
    {
        $drone = Auth::user()->drones->find($id);
        if ($drone != null){
            $droneLocation = new LocationResource($drone->location);
            return response()->json(['success'=>true,'data'=>$droneLocation, 'status' => 200]);
        }
        return response()->json(["success"=>false, "message" => "You don't any drone with an id $id"],401);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Drone $drone, $id)
    {
        $drone = Auth::user()->drones->find($id);
        
        if ($drone != null){
            $drone->update($request->all());
            return response()->json(['success'=>true,'data'=>new DroneResource($drone), 'status' => 200]);  
        }
        return response()->json(["success"=>false, "message" => "You don't any drone with an id $id"],401);
        
    }
    public function updateInstruct(InstructionRequest $request , $id)
    {
        $drone = Auth::user()->drones->find($id);
        if ($drone != null){
            $instruct = $drone->instruction;   
            if($instruct != null){
                $instruct->update($request->all());
                return response()->json(['success'=>true,'data'=>new InstructionResource($instruct), 'status' => 200]);
            }         
            return response()->json(['success'=>false, 'status' => 401]);
        }
        return response()->json(["success"=>false, "message" => "You don't any drone with an id $id"],401);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Drone $drone, $id)
    {
        $drone = Auth::user()->drones->find($id);
        if ($drone != null){
            $drone->delete();
            return response()->json(['success'=>true,'message'=>'You have deleted drone id: '.$id, 'status' => 200]);
        }
        return response()->json(["success"=>false, "message" => "You don't any drone with an id $id"],401);
    }
}
