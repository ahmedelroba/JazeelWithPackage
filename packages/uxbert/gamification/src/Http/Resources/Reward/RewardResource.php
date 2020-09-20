<?php

namespace Uxbert\Gamification\Http\Resources\Sponsor;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Uxbert\Gamification\Http\Resources\Leaderboard\LeaderboardResource;

class RewardResource extends JsonResource
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
            'name'          => 'Test Leader board',
            'description'   => 'Test Leaderboard description',
            'quantity'      => 10,
            "image"         => "https://i.pinimg.com/originals/3f/fc/52/3ffc52eb85fc402387c766cde53983af.png",
            'sponsor'       => new SponsorResource(["1"]),
            'key'           => 'testkey6635',
        ];
    }
}
