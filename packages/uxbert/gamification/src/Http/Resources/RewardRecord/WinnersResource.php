<?php

namespace Uxbert\Gamification\Http\Resources\RewardRecord;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Uxbert\Gamification\Http\Resources\User\UserResource;
use Uxbert\Gamification\Models\Client_User;

class WinnersResource extends JsonResource
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
        $userObject = Client_User::find($this->user_id);
        $user = new UserResource($userObject);
        return [
            'user'                  => 'ss',
            'given_to'              => $this->given_to,
            'leaderboard_rank'      => $this->leaderboard_rank,
            'status'                => $this->status,
            'given_at'              => $this->given_at,
        ];
    }
}
