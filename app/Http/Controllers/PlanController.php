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
        $plan = new PlanResource(Plan::create($request->all()));
        return response()->json(['success'=>true, 'data' => $plan, 'message'=>"You have created a new plan"]);
        
    }
    
    /**
     * Display the specified resource.
     */
    public function show($planName)
    {
        //
        $plan = Plan::where('name', $planName)->first();
        return response()->json(['success'=>true, 'data' => new PlanResource($plan), 'message'=>"Here is a plan with name $planName"]);
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
