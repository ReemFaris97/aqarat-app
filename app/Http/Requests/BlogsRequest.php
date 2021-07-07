<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogsRequest extends FormRequest
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
        $rules= [
            'title.ar'=>'required',
            'title.en'=>'required',
            'description.ar'=>'required',
            'description.en'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
        ];

        if ($this->getMethod() == 'PATCH') {
            $rules = [
                'title'=>'nullable',
                'description'=>'nullable',
                'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg',
            ];
        }
        // dd('hi');
        return $rules;
    }

}
