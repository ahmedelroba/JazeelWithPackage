<?php

namespace Uxbert\Gamification\Http\Resources\Sponsor;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Uxbert\Gamification\Helpers\Helper;

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
            "name" => $this->name,
            "description" => $this->description,
            "logo" => Helper::GetURL($this->logo),
            "key" => $this->key,
            "status" => $this->status,
        ];
    }
}
