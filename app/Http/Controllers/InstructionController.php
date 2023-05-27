<?php

namespace App\Http\Controllers;

use App\Http\Resources\InstructionResource;
use App\Models\Drone;
use App\Models\Instruction;
use Illuminate\Http\Request;

class InstructionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($drone_id)
    {
        //
        $drone = Drone::find($drone_id);
        $instruct = $drone->instruction;
        if($instruct != null) {
            return response()->json(['message' => 'Here are the images that drone camera have made.', 'data' => new InstructionResource($instruct), 'status' => 200]);
        }
        return response()->json(['message' => "Your drone don't have an instruction!",'status' => 200]);

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
