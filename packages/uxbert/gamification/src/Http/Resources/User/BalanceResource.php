<?php

namespace Uxbert\Gamification\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Uxbert\Gamification\Helpers\Helper;
use Uxbert\Gamification\Models\LeaderBoardRecord;
use Uxbert\Gamification\Models\LeaderBoard;

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
        // $leaderboard = LeaderBoard::where('key', 'all')->first();
        // $rankOfAllTimeLeaderboard = LeaderBoardRecord::
        return [
            "points" => $this->total_earned_points,
            "rank" => 1,
        ];
    }
}
