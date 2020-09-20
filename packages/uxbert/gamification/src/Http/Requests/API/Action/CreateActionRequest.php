<?php

namespace Uxbert\Gamification\Http\Requests\Action;

use Uxbert\Gamification\Models\Client;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CreateActionRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $brand =  Client::where('client_id', $request->client_id)->where('client_secret', $request->client_secret)->first();

        return [
            'client_id' => 'required',
            'client_secret' => 'required',
            'name' => 'required|max:245',
            'description' => 'min:20',
            // 'key' => ['unique_custom:actions,key,client_id,' . optional($brand)->id, 'required'],
            'points' => 'required',

        ];
    }
}
