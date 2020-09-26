<?php

namespace Uxbert\Gamification\Http\Resources\Leaderboard;

use Illuminate\Http\Resources\Json\JsonResource;
use Uxbert\Gamification\Models\Client_User;
use Uxbert\Gamification\Models\LeaderBoard;

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
        $leaderboard = LeaderBoard::find($this->leaderboard_id);
        $user = Client_User::find($this->user_id);
        return [
            'user_name' => $this->user_name,
            'points' =>  $this->points,
            'rank' => $this->rank,
            'user_key' => isset($user) ? $user->referral_key : null,
            'user_md5_hash' => isset($user) ? md5($user->email) : null,
            'leaderboard_key' => isset($leaderboard) ? $leaderboard->key : null,
        ];
    }
}
