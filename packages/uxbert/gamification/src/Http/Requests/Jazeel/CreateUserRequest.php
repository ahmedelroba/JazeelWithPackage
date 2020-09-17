<?php

namespace Uxbert\Gamification\Http\Requests\Jazeel;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'client_id' => 'required',
            'client_secret' => 'required',
            'first_name' => 'required|max:245',
            'email' => 'required|email',
            'password' => 'required',
            'city' => 'required|max:245',
            'country' => 'required|max:245',
            'phone' => ['required'],
        ];
    }
}
