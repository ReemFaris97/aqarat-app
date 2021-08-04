<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminsRequest extends FormRequest
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
            'name' => 'required|string|max:191|unique:admins',
            'email' => 'required|email|max:255|unique:admins',
            'password' => 'required|min:6|confirmed',
            'phone'=>'required|phone:sa,eg|unique:admins,phone',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        if ($this->getMethod() == 'PATCH') {
            $rules = [
                'name' => 'required|string|max:191|unique:admins,name,' . $this->user()->id,
                'email' => 'required|email|max:255|unique:admins,email,' . $this->user()->id,
                'password' => 'nullable|min:6|confirmed',
                'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:admins,phone,' . $this->user()->id,
                'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ];
        }
        return $rules;
    }
}
