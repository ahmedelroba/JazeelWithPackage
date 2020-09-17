<?php

namespace Uxbert\Gamification\Http\Resources\Jazeel;

use App\Models\IntegrationSystem\Integ_User;
use App\Models\IntegrationSystem\IntegBrandActionUserRel;
use Illuminate\Http\Resources\Json\JsonResource;

class UserPointsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'all_points_earned'     => $this->total_earned_points,
            'current_points'        => $this->total_current_points,
            'withdrawn_points'      => $this->total_withdrawn_points,
        ];
    }
}
