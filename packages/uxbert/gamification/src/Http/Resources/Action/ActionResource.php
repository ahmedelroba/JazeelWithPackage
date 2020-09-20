<?php

namespace Uxbert\Gamification\Http\Resources\Action;

use Illuminate\Http\Resources\Json\JsonResource;

class ActionResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'key' => $this->key,
            'type' => $this->type,
            'status' => true,
            'points' => $this->points,
        ];
    }
}
