<?php

namespace Uxbert\Gamification\Http\Requests\API\Reward;

use Illuminate\Foundation\Http\FormRequest;

class CreateRewardRequest extends FormRequest
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
            'name'          => 'required|max:254',
            'description'   => 'required',
            'sponsor_key'   => '',
            'image'         => 'required|image',
            'amount'        => 'required|numeric|min:0|max:99999999',
            'leaderboard_key'   => '',
        ];
    }
}
