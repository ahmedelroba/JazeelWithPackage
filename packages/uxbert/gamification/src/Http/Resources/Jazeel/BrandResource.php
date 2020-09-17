<?php

namespace Uxbert\Gamification\Http\Resources\Jazeel;

use Illuminate\Http\Resources\Json\JsonResource;

class BrandResource extends JsonResource
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
            'Name' => $this->name,
            'Description' => $this->description,
            'Url' => $this->url,
            'Phone' => $this->phone,
            'Username' => $this->username,
            'Job_title' => $this->job_title,
            'Email' => $this->email,
            'Industry' => $this->industry,
            'Country' => $this->country,
            'City' => $this->city,
            'Status' => $this->status, // Active - Not_active - Pending
            'Client_id' => $this->client_id,
            'Client_secret' => $this->client_secret,
        ];
    }
}
