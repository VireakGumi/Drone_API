<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlanRequest;
use App\Http\Resources\PlanResource;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
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
    public function store(PlanRequest $request)
    {
        //
        $plan = Plan::create($request->all());
        $plan = new PlanResource($plan);
        return response()->json(['success'=>true, 'data' => $plan, 'message'=>"You have created a new plan", 'status' => 200]);
        
    }
    /**
     * Display the specified resource.
     */
    public function show($planName)
    {
        //
        $plan = Plan::where('name', $planName)->first();
        if($plan != null) {
            return response()->json(['success'=>true, 'data' => new PlanResource($plan), 'message'=>"Here is a plan with name $planName", 'status' => 200]);
        }
        return response()->json(['success'=> false, 'message'=>"Not found plan name $planName", 'status' => 401]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plan $plan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plan $plan)
    {
        //
    }
}
