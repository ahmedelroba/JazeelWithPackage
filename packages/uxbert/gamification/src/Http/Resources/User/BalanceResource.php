<?php

namespace Uxbert\Gamification\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Uxbert\Gamification\Helpers\Helper;

class BalanceResource extends JsonResource
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
            "points" => 1000,
            "rank" => 1,
        ];
    }
}
