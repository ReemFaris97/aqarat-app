<?php

namespace App\Http\Requests\Api\Order;

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
            'name' => 'required|string',
            'type' => 'required|in:request,offer',
            'image' => 'required_if:type,offer|image',
            'images' => 'sometimes|array',
            'neighborhood_id'=>'required_if:type,offer|exists:neighborhoods,id',
            'category_id' => 'required|exists:categories,id',
            'contract' => 'required|in:buy,sell,rent',
            'advertiser' => 'required|in:owner,agent,marketer',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'address' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'attributes'=>'sometimes|array',
            'attributes.*.value'=>'sometimes|nullable|string',
            'utilities'=>'sometimes|array',
            'utilities.*'=>'required',
            'neighborhoods'=>'required_if:type,request|array',
            'neighborhoods.*'=>'exists:neighborhoods,id'

        ];
    }
}
