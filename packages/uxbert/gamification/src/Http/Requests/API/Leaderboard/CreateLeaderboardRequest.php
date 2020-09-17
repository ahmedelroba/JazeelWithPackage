<?php

namespace Uxbert\Gamification\Http\Requests\API\Leaderboard;

use Illuminate\Foundation\Http\FormRequest;

class CreateLeaderboardRequest extends FormRequest
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
            'date_from'     => 'required',
            'date_to'       => 'required',
            'action_key'    => '',
            'terms'         => 'required',
        ];
    }
}
