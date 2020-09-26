<?php

namespace Uxbert\Gamification\Http\Resources\Leaderboard;

use Illuminate\Http\Resources\Json\JsonResource;

class LeaderboardRecordsResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
                // 'user_name', 'points', 'rank', 'user_id', 'leaderboard_id', 'client_id'

        return [
            'user_name' => $this->user_name,
            'points' =>  $this->points,
            'rank' => $this->rank,
            'user_key' => 'adssdh88',
            'user_md5_hash' => md5("test@test.com"),
            'leaderboard_key' => 'all',
        ];
    }
}
