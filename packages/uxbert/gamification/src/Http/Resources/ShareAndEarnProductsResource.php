<?php

namespace Uxbert\Gamification\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ShareAndEarnProductsResource extends JsonResource
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
            'points' => $this->points,
            'image' => url($this->files->url),
            'referral_url' => $this->url . '?referral=' . auth()->user()->user->referral_key
        ];
    }
}
