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
            'image' => 'required|image',
            'images' => 'sometimes|array',
            'neighborhood_id'=>'required|exists:neighborhoods,id',
            'category_id' => 'required|exists:categories,id',
            'contract' => 'required|in:buy,sell',
            'advertiser' => 'required|in:owner,agent,marketer',
            'lat' => 'required|numeric|min:-90|max:90',
            'lng' => 'required|numeric|min:180-|max:190',
            'address' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'attributes'=>'sometimes|array',
            'attributes.*.value'=>'required|string',
            'utilities'=>'sometimes|array',
            'utilities.*'=>'required'

        ];
    }
}
