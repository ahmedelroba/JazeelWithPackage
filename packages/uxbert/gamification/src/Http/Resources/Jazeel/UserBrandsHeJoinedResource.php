<?php

namespace Uxbert\Gamification\Http\Resources\Jazeel;

use App\Models\IntegrationSystem\IntegBrandActionUserRel;
use Illuminate\Http\Resources\Json\JsonResource;

class UserBrandsHeJoinedResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'earned_points' => IntegBrandActionUserRel::where('brand_id', $this->id)->where('user_id', auth()->user()->user->id)->where('type', 'plus')->get()->sum('current_points')
        ];
    }
}
