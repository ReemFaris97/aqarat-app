<?php

namespace App\Http\Requests\Api\Advertisement;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name'=>'required|string',
            'description'=>'required|string',
            'image'=>'required|image',
            'neighborhood_id'=>'required|string|exists:neighborhoods,id',
            'lat'=>'required|numeric|min:-90|max:90',
            'lng'=>'required|numeric|min:180-|max:190',
            'images'=>'sometimes|array',
            'images.*'=>'required|image',
            'address'=>'required|string',
            'advertisement_type_id'=>'required|exists:advertisement_types,id'
        ];
    }

}
