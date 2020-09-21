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
        // return [
        //     'name'          => $this->name,
        //     'description'   => $this->description,
        //     'date_from'     => $this->date_from,
        //     'date_to'       => $this->date_to,
        //     'terms'         => $this->terms,
        //     'action'        => $actionDetails,
        //     'key'           => $this->key,
        // ];

        return [
            'name'          => 'Test Leader board',
            'description'   => 'Test Leaderboard description',
            'date_from'     => "",
            'date_to'       => "",
            'terms'         => "tesst terms anc condetions ",
            // 'action'        => $actionDetails, Leaderboard Records
            'records'       => LeaderboardRecordsResource::collection(["1", '2', '3']), // top 10 ranking
            'rewards'       => RewardResourceDummy::collection(["1", '2', '3']), // top 10 ranking
            'current_user'  => new LeaderboardRecordsResource(["1"]), // 
            'key'           => 'testkey6635',
        ];
    }
}
