<?php

namespace Uxbert\Gamification\Http\Resources\Jazeel;

use App\Http\Resources\Jazeel\UserPointsHistoryWithBrandResource;
use App\Http\Resources\ShareAndEarnResource;
use App\Models\IntegrationSystem\Integ_Brand;
use App\Models\IntegrationSystem\IntegBrandActionUserRel;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserDashboardResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $user_points_history = [];
        $rels = IntegBrandActionUserRel::where('user_id', $this->id)->orderByDesc('created_at')->get()
        ->groupBy(function ($val) {
            return Carbon::parse($val->created_at)->format('Y-m-d');
        });

        foreach ($rels as $day => $user_activities_list) {
            $user_points_history[$day] =  UserPointsHistoryWithBrandResource::collection($user_activities_list);
        }

        return [
            'id'                => $this->id,
            'referral'          => $this->referral_key,
            "first_name"        => $this->first_name,
            "last_name"         => $this->last_name,
            "city"              => $this->city,
            "country"           => $this->country,
            "phone"             => $this->phone,
            "email"             => $this->email,
            'current_point'     => $this->total_current_points,
            'earned_point'      => $this->total_earned_points,
            'withdrawn_point'   => $this->total_withdrawn_points,
            'token'             => $this->token,
            'gender'            => $this->user->gender,
            'activities'        => $user_points_history,
            'all_brands'        => UserBrandsHeJoinedResource::collection($this->brands),
            'share_and_earn'    => ShareAndEarnResource::collection(Integ_Brand::all())
        ];
    }
}
