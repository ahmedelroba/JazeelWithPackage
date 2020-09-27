<?php

namespace Uxbert\Gamification\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserPointsRecordsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->action->name,
            'description' => $this->description,
            'key' => $this->action->key,
            'points' => $this->current_points,
            'created_at' => $this->created_at->timestamp,
        ];
    }
}
