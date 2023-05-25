<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DroneResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    { 
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'type'=>$this->type,
            'payload'=>$this->payload,
            'battery'=>$this->battery,
            'fligth_range'=>$this->fligth_range,
            'weight'=>$this->weight,
            'user'=>new UserResource($this->user),
            'plan'=>new PlanResource($this->plan),
            'instruction'=>new InstructionResource($this->instruction),
            'location'=>new LocationResource($this->location),
        ];
    }
}
