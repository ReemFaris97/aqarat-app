<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'name' => 'required|string|max:191|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'phone'=>'required|phone:sa,eg|unique:users,phone',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ];

        if ($this->getMethod() == 'PATCH') {
            $rules = [
                'name' => 'required|string|max:191|unique:users,name,' . request()->id,
                'email' => 'required|email|max:255|unique:users,email,' . request()->id,
                'phone' => 'required|phone:sa,eg|unique:users,phone,' . request()->id,
                'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];
        }
        return $rules;
    }
}
