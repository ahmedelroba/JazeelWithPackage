<?php

namespace Uxbert\Gamification\Http\Resources\RewardHistory;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Uxbert\Gamification\Http\Resources\User\UserResource;

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
        $user = UserResource::find($this->user_id);
        return [
            'user'                  => isset($user) ? $user : null,
            'given_to'              => $this->given_to,
            'leaderboard_rank'      => $this->leaderboard_rank,
            'status'                => $this->status,
            'given_at'              => $this->given_at,
        ];
    }
}
