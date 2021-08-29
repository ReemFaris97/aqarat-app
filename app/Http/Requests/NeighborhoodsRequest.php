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
            'name.ar' => 'required|unique_translation:neighborhoods',
            'name.en' => 'required|unique_translation:neighborhoods',
            'city_id'=>'required|exists:cities,id'
        ];

        if ($this->getMethod() == 'PATCH') {
            $rules = [
                'name.ar' => 'required|unique_translation:neighborhoods,name,' . request()->id,
                'name.en' => 'required|unique_translation:neighborhoods,name,' . request()->id,
                'city_id'=>'required|exists:cities,id'
            ];
        }
        return $rules;
    }
}
