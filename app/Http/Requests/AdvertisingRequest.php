<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvertisingRequest extends FormRequest
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
            'name' => 'required',
            'user_id' => 'nullable',
            'neighborhood_id' => 'required',
            'views' => 'nullable',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//            'lat' => 'required',
//            'lng' => 'required',
            'description' => 'required|string',
            'photos' => 'sometimes',
            'photos.*' => 'image',
        ];
    }
}
