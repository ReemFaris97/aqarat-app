<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommonQuestionsRequest extends FormRequest
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
            'question.ar'=>'required',
            'question.en'=>'required',
            'answer.ar'=>'required',
            'answer.en'=>'required',
        ];
    }
}
