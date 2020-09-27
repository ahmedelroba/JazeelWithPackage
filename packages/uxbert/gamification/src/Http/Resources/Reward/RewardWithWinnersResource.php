<?php

namespace Uxbert\Gamification\Http\Resources\Reward;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Uxbert\Gamification\Http\Resources\Leaderboard\LeaderboardResource;
use Uxbert\Gamification\Http\Resources\Sponsor\SponsorResource;
use Uxbert\Gamification\Http\Resources\RewardRecord\WinnersResource;
use Uxbert\Gamification\Models\Sponsor;
use Uxbert\Gamification\Models\RewardsRecord;
use Uxbert\Gamification\Helpers\Helper;

class RewardWithWinnersResource extends JsonResource
{
     /**
     * @var
     */
    private $leaderboard_id;

    /**
     * Create a new resource instance.
     *
     * @param  mixed  $resource
     * @return void
     */
    public function __construct($resource, $leaderboard_id)
    {
        // Ensure you call the parent constructor
        parent::__construct($resource);
        $this->resource = $resource;
        
        $this->leaderboard_id = $leaderboard_id;
    }

    /**
     * Transform the resource collection into an array.
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $winners = RewardsRecord::where('leaderboard_id', $this->leaderboard_id)->where('reward_id', $this->id)->get();
        $sponsor = Sponsor::find($this->sponsor_id);
        return [
            'leaderboard_id'          => $this->leaderboard_id,
            'name'          => $this->name,
            'short_description'   => $this->short_description,
            'description'   => $this->description,
            'quantity'      => $this->quantity,
            "image"         => Helper::GetURL($this->image),
            'sponsor'       => new SponsorResource($sponsor),
            'key'           => $this->key,
            'winners'       => WinnersResource::collection($winners),
        ];
    }
}
