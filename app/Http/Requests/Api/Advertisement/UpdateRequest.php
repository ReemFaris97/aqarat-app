<?php

namespace App\Http\Requests\Api\Advertisement;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->id==$this->route('advertisement')->user_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'sometimes|string',
            'description'=>'sometimes|string',
            'image'=>'sometimes|image',
            'neighborhood_id'=>'sometimes|string|exists:neighborhoods,id',
            'lat'=>'sometimes|numeric|min:-90|max:90',
            'lng'=>'sometimes|numeric|min:180-|max:190',
            'images'=>'sometimes|array',
            'images.*'=>'sometimes|image',
            'address'=>'sometimes|string',
            'is_active'=>'sometimes|boolean'
        ];
    }
}
