<?php

namespace Uxbert\Gamification\Http\Resources\Jazeel;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id' => $this->id,
            'referral' => $this->referral_key,
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            "city" => $this->city,
            "country" => $this->country,
            "phone" => $this->phone,
            // "gender" => $this->user->gender,
            "email" => $this->email,
            'current_point' => $this->total_current_points,
            'earned_point' => $this->total_earned_points,
            'withdrawn_point' => $this->total_withdrawn_points,
            "join_date" => $this->created_at->timestamp,
        ];
    }
}
