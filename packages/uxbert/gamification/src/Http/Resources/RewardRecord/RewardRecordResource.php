<?php

namespace Uxbert\Gamification\Http\Resources\RewardRecordResource;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RewardRecordResource extends JsonResource
{
    // /**
    //  * @var
    //  */
    // private $leaderboard_id;

    // /**
    //  * Create a new resource instance.
    //  *
    //  * @param  mixed  $resource
    //  * @return void
    //  */
    // public function __construct($resource, $leaderboard_id)
    // {
    //     // Ensure you call the parent constructor
    //     parent::__construct($resource);
    //     $this->resource = $resource;
        
    //     $this->leaderboard_id = $leaderboard_id;
    // }

    /**
     * Transform the resource collection into an array.
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // 'user_id', // We will fill it only when we send gift to winner
        // 'reward_id', // Reward
        // 'given_to', // (leaderboard/campaign/goals/missions/achievement)
        // 'leaderboard_rank', // optional
        // 'leaderboard_id', // optional
        // 'status', // awarded/pending/cacnelled/etc
        // 'given_at', // date of given reward to user
        return [
            'reward'        => new RewardResource(["1"]),
            'quantity'      => 10,
            'user'          => null,
        ];
    }
}
