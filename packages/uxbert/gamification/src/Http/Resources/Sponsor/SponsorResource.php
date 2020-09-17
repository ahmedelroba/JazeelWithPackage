<?php

namespace Uxbert\Gamification\Http\Resources\Sponsor;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SponsorResource extends JsonResource
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
        return [
            "name" => "Halayalla",
            "description" => "it's one product of Uxbert.",
            "logo" => "https://i.pinimg.com/originals/3f/fc/52/3ffc52eb85fc402387c766cde53983af.png",
            "key" => 'jasd6sd721sas',
            "status" => true,
        ];
    }
}
