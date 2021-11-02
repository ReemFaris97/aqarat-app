<?php

namespace App\Http\Requests\Api\Order;

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
        return $this->route('order')->user_id==$this->user()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'sometimes|string',
            'type' => 'sometimes|in:request,offer',
            'image' => 'sometimes|image',
            'images' => 'sometimes|array',
            'neighborhood_id'=>'sometimes|exists:neighborhoods,id',
            'category_id' => 'sometimes|exists:categories,id',
            'contract' => 'sometimes|in:buy,sell,rent',
            'advertiser' => 'sometimes|in:owner,agent,marketer',
            'lat' => 'sometimes|numeric|min:-90|max:90',
            'lng' => 'sometimes|numeric|min:180-|max:190',
            'address' => 'sometimes|string',
            'price' => 'sometimes|numeric',
            'description' => 'sometimes|string',
            'attributes'=>'sometimes|array',
            'attributes.*.value'=>'required|string',
            'utilities'=>'sometimes|array',
            'utilities.*'=>'required',
            'neighborhoods'=>'sometimes|array',
            'neighborhoods.*'=>'required|exists:neighborhoods,id'
        ];
    }
}
