<?php

namespace Uxbert\Gamification\Http\Requests\API\Sponsor;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSponsorRequest extends FormRequest
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
            // 'logo'          => 'required|file',
            'description'   => 'required',
            'status'        => 'boolean',
        ];
    }
}
