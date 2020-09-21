<?php

namespace Uxbert\Gamification\Http\Resources\RewardHistory;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RewardHistoryResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'reward'        => new RewardResource(["1"]),
            'quantity'      => 10,
            'user'          => null,
        ];
    }
}
