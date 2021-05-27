<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NeighborhoodsRequest extends FormRequest
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
        $rules = [
            'name' => 'required',
            'city_id'=>'required|exists:cities,id'
        ];

        if ($this->getMethod() == 'PATCH') {
            $rules = [
                'name' => 'required',
                'city_id'=>'required|exists:cities,id'
            ];
        }
        return $rules;
    }
}
