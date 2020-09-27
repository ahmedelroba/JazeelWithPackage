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
     * @var
     */
    private $client_id, $user_id;

    /**
     * Create a new resource instance.
     *
     * @param  mixed  $resource
     * @return void
     */
    public function __construct($resource, $client_id, $user_id)
    {
        // Ensure you call the parent constructor
        parent::__construct($resource);
        $this->resource = $resource;
        
        $this->client_id = $client_id;
        $this->user_id = $user_id;
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
        $leaderboard = LeaderBoard::where('key', 'all')->where('client_id', $this->client_id)->first();
        if ($leaderboard)
            $rankOfAllTimeLeaderboard = LeaderBoardRecord::where('client_id', $this->client_id)->where('leaderboard_id', $leaderboard->id)->where('user_id', $this->user_id)->first();
        return [
            "points" => $this->total_earned_points,
            "rank" => isset($rankOfAllTimeLeaderboard) ? optional($rankOfAllTimeLeaderboard)->rank : 999999,
        ];
    }
}
