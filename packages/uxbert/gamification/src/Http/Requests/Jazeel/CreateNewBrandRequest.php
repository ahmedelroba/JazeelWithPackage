<?php

namespace Uxbert\Gamification\Http\Requests\Jazeel;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewBrandRequest extends FormRequest
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
            'description' => 'min:20',
            'url' => 'url',
            'username' => 'required|max:245',
            'job_title' => 'required|max:245',
            'email' => 'required|email|unique:clients,email',
            'password' => 'required',
            'phone' => ['required', 'regex:/^(05)(5|0|3|6|4|9|1|8|7)([0-9]{7})$/'],
            'industry' => 'max:245',
            'city' => 'required|max:245',
            'country' => 'required|max:245',
        ];
    }
}
