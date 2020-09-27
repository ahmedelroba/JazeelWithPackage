<?php

namespace Uxbert\Gamification\Http\Resources\Leaderboard;

use Illuminate\Http\Resources\Json\JsonResource;
use Uxbert\Gamification\Http\Resources\Jazeel\BrandActionResource;
use Uxbert\Gamification\Models\Action;
use Uxbert\Gamification\Models\LeaderBoardRecord;
use Uxbert\Gamification\Http\Resources\Reward\RewardResourceDummy;
use Uxbert\Gamification\Http\Resources\Reward\RewardResource;
use Uxbert\Gamification\Models\Reward;
use Uxbert\Gamification\Models\Client_User;


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
        $allRecords = LeaderBoardRecord::where('leaderboard_id', $this->id)->orderBy('rank')->limit(5)->get();
        $returnArray = [
            'name'          => $this->name,
            'description'   => $this->description,
            'date_from'     => $this->date_from,
            'date_to'       => $this->date_to,
            'terms'         => $this->terms,
            'key'           => $this->key,
            'records'       => LeaderboardRecordsResource::collection($allRecords), // top 5 ranking
        ];
        if ($request->user_referral_key != ""){
            $user = Client_User::where('referral_key', $request->user_referral_key)->first();
            if (!$user)
                return [];
            $currentUserRecord = LeaderBoardRecord::where('user_id', $user->id)->where('leaderboard_id', $this->id)->first();
            if ($currentUserRecord->rank >= 5 )
                $last5Records = LeaderBoardRecord::where('leaderboard_id', $this->id)->where('rank', '>', $currentUserRecord->rank)->orderBy('rank')->limit(5)->get();
            else
                $last5Records = LeaderBoardRecord::where('leaderboard_id', $this->id)->where('rank', '>', 5)->orderBy('rank')->limit(5)->get();
            $returnArray['current_user'] = $currentUserRecord;
            $returnArray['last_5_records'] = $last5Records;
        }
        $rewardsJsonArray = array();
        if(!empty($this->rewards)) {
            $rewards = json_decode($this->rewards);
            foreach($rewards as $value){
                $reward = Reward::where("key", '=', $value->reward_key)->first();
                $rewardsJsonArray[] = array('reward' => new RewardResource($reward), 'rank' => $value->rank);
            }
            $returnArray['rewards'] = $rewardsJsonArray;
        } 

        return $returnArray;
    }
}
