<?php

namespace App\Http\Controllers;

use App\Http\Resources\InstructionResource;
use App\Http\Resources\DroneResource;
use App\Models\Drone;
use App\Models\Instruction;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class InstructionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drones = Auth::user()->drones;
        if ($drones != null){
            $instructs=[];
            foreach($drones as $drone){
                $instruct = $drone->instruction;
                $instruct->drone_id = $drone->id;
                array_push($instructs, $instruct);
            }
            
            if($instruct != null) {
                return response()->json(['message' => 'Here is an instruction.', 'data' => $instructs, 'status' => 200]);
            }
            return response()->json(['message' => "Your drone don't have an instruction!",'status' => 401]);
        }
        return response()->json(["success"=>false, "message" => "You don't any drone"],401);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $drone = Auth::user()->drones->find($id);
        if ($drone != null){
            $instruct = $drone->instruction;
            $instruct->drone_id = $drone->id;
            if($instruct != null) {
                return response()->json(['message' => 'Here is an instruction.', 'data' => $instruct, 'status' => 200]);
            }
            return response()->json(['message' => "Your drone don't have an instruction!",'status' => 401]);

        }
        return response()->json(["success"=>false, "message" => "You don't any drone"],401);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instruction $instruction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instruction $instruction)
    {
        //
    }
}
