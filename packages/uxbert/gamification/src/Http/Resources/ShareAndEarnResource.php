<?php

namespace Uxbert\Gamification\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ShareAndEarnResource extends JsonResource
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
            'profile_photo' => 'https://kafugames.com/images/halayalla_footer_new.svg',
            'description' => $this->description,
            'url' => $this->url,
            'products' => ShareAndEarnProductsResource::collection($this->products),
            'products_count' => $this->products->count()
        ];
    }
}
