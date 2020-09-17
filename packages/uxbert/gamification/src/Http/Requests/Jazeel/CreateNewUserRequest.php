<?php

namespace Uxbert\Gamification\Http\Requests\Jazeel;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewUserRequest extends FormRequest
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
            'first_name' => 'required|max:245',
            'last_name' => 'required|max:245',
            'email' => 'required|unique:users,email,',
            'password' => 'required',
            'city' => 'required|max:245',
            'country' => 'required|max:245',
            'gender' => 'required|in:male,female',
            'phone' => ['required'],
        ];
    }
}
