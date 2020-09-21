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
        return [
            'user_name' => 'ahmed',
            'points' => 1000,
            'rank' => 2,
            'user_key' => 'adssdh88',
            'user_md5_hash' => md5("test@test.com"),
            'leaderboard_key' => 'yt54dggss',
        ];
    }
}
