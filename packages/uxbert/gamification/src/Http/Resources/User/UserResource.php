<?php

namespace Uxbert\Gamification\Http\Resources\User;

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
            'referral' => $this->referral_key,
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            "city" => $this->city,
            "country" => $this->country,
            "phone" => $this->phone,
            'user_md5_hash' => md5($this->email),
            "email" => $this->email,
            "join_date" => $this->created_at->timestamp,
        ];
    }
}
