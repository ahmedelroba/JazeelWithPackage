<?php

namespace Uxbert\Gamification\Http\Resources\Jazeel;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserPointsHistoryWithBrandResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->action->name,
            'description' => $this->action->description,
            'key' => $this->action->key,
            'points' => $this->current_points,
            'type' => $this->type,
            'brand' => new BrandSummaryResource($this->brand),
            'created_at' => $this->created_at->timestamp
        ];
    }
}
