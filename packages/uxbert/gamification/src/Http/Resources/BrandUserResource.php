<?php

namespace Uxbert\Gamification\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BrandUserResource extends JsonResource
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
            // 'user_id' => $this->user_id,
            // 'full_name' => substr($this->user->first_name . ' ' . $this->user->last_name, 0, 40),
            // 'status' => $this->user->active,
            'transactions' => $this,
            // 'date' => $this->created_at,
        ];
    }
}
