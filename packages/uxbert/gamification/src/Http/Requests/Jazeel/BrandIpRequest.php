<?php

namespace Uxbert\Gamification\Http\Requests\Jazeel;

use Illuminate\Foundation\Http\FormRequest;

class BrandIpRequest extends FormRequest
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
            'name' => 'required|max:245',
            'ip' => 'max:15',
        ];
    }
}
