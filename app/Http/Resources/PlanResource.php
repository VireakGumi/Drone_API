<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlanResource extends JsonResource
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
            'type'=>$this->type,
            'dateTime'=>$this->dateTime,
            'area'=>$this->area,
            'spray_density'=>$this->spray_density,
            'farm'=> new FarmResource($this->farm)
        ];
    }
}
