<?php

namespace Uxbert\Gamification\Http\Requests\API\RewardHistory;

use Illuminate\Foundation\Http\FormRequest;

class CreateRewardHistoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'client_id'     => 'required',
            'client_secret' => 'required',
            'reward_key'    => 'required|max:254',
            'user_key'      => 'required',
            'quantity'      => 'required',
        ];
    }
}
