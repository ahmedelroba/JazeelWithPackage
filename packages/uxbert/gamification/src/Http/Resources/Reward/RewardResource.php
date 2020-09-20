<?php

namespace Uxbert\Gamification\Http\Resources\Reward;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Uxbert\Gamification\Http\Resources\Leaderboard\LeaderboardResource;
use Uxbert\Gamification\Http\Resources\Sponsor\SponsorResource;
use Uxbert\Gamification\Models\Sponsor;
use Uxbert\Gamification\Helpers\Helper;

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
        $sponsor = Sponsor::find($this->sponsor_id);
        return [
            'name'          => $this->name,
            'description'   => $this->description,
            'quantity'      => $this->quantity,
            "image"         => Helper::GetURL($this->image),
            'sponsor'       => new SponsorResource($sponsor),
            'key'           => $this->key,
        ];
    }
}
