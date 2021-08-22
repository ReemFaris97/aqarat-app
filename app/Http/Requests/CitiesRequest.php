<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CitiesRequest extends FormRequest
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
//        dd(request()->all());
        $rules =  [
            'name.ar' => 'required|unique_translation:cities',
            'name.en' => 'required|unique_translation:cities',
        ];
        if ($this->getMethod() == 'PATCH') {
            $rules = [
                'name.ar' => 'required|unique_translation:cities,name,' . request()->id,
                'name.en' => 'required|unique_translation:cities,name,' . request()->id,
            ];
                }
        return $rules;
    }
}
