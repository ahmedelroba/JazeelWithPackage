<?php

namespace Uxbert\Gamification\Http\Resources\Leaderboard;

use Illuminate\Http\Resources\Json\JsonResource;
use Uxbert\Gamification\Http\Resources\Jazeel\BrandActionResource;
use Uxbert\Gamification\Models\Action;
use Uxbert\Gamification\Models\LeaderBoardRecord;
use Uxbert\Gamification\Http\Resources\Reward\RewardResourceDummy;

class LeaderboardResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $allRecords = LeaderBoardRecord::where('leaderboard_id', $this->id)->orderBy('rank')->limit(10)->get();
        if ($request->user_referral_key != "");
            $currentUserRecord = LeaderBoardRecord::where('user_id', $request->user_referral_key)->where('leaderboard_id', $this->id)->first();
        return [
            'name'          => $this->name,
            'description'   => $this->description,
            'date_from'     => $this->date_from,
            'date_to'       => $this->date_to,
            'terms'         => $this->terms,
            'key'           => $this->key,
            'records'       => LeaderboardRecordsResource::collection($allRecords), // top 10 ranking
            'rewards'       => json_decode ($this->rewards), 
            'current_user'  => ($request->user_referral_key != "") ? new LeaderboardRecordsResource($currentUserRecord) : null, // 
        ];
    }
}
