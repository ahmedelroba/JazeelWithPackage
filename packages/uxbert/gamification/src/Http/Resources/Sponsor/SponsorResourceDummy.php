<?php

namespace Uxbert\Gamification\Http\Resources\Sponsor;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Uxbert\Gamification\Helpers\Helper;

class SponsorResourceDummy extends JsonResource
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
            "name" => 'Halayalla',
            "description" => "Halayalla is important product of uxbert.",
            "logo" => "https://halayalla.com/web-images/logos/sfa-logo-2020.png",
            "key" => "testkeyforsponsor",
            "status" => true,
        ];
    }
}
