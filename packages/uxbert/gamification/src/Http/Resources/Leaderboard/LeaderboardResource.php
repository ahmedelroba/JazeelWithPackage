<?php

namespace Uxbert\Gamification\Http\Resources\Leaderboard;

use Illuminate\Http\Resources\Json\JsonResource;
use Uxbert\Gamification\Http\Resources\Jazeel\BrandActionResource;
use Uxbert\Gamification\Models\Action;

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
        if (!empty($request->action_key)) {
            $action = Action::where('key', $request->action_key)->first();
            if (!empty($action))
                $actionDetails = new BrandActionResource($action);
        } else
            $actionDetails = null;
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
            'action'        => $actionDetails,
            'key'           => 'testkey6635',
        ];
    }
}
