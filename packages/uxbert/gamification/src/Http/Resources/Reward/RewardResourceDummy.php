<?php

namespace Uxbert\Gamification\Http\Resources\Reward;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Uxbert\Gamification\Http\Resources\Leaderboard\LeaderboardResource;
use Uxbert\Gamification\Http\Resources\Sponsor\SponsorResourceDummy;
use Uxbert\Gamification\Models\Sponsor;
use Uxbert\Gamification\Helpers\Helper;

class RewardResourceDummy extends JsonResource
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
            'name'          => 'apple watch',
            'rank'          => 1,
            'description'   => 'Apple watch using ios oprationg system',
            "image"         => "https://m.xcite.com/media/catalog/product/cache/4/thumbnail/700x700/9df78eab33525d08d6e5fb8d27136e95/n/e/new_apple_watch_series_5_gps_44mm_grey_aluminium_case_with_black_sport_band_lowest_price_in_ksa.jpg",
            'sponsor'       => new SponsorResourceDummy(["1"]),
            'key'           => 'testkey123',
        ];
    }
}
