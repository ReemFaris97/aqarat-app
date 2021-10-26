<?php

namespace App\Http\Requests\Api\Order;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
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
            'lat'=>'required|min:-90|max:90|numeric',
            'lng'=>'required|min:-180|max:180|numeric',
            'type'=>'sometimes',
            'advertiser'=>'sometimes|in:owner,agent,marketer',
            'price_from'=>'sometimes|numeric',
            'price_to'=>'sometimes|numeric',
            'contract'=>'sometimes|in:buy,sell',
            'utilities'=>'sometimes|array',
            'is_special'=>'sometimes|boolean',
            'category_id'=>'sometimes|exists:categories,id',
            'attributes'=>'sometimes|array',
            'attributes.*.id'=>'sometimes|integer',
            'attributes.*.value'=>'sometimes',
            'sort'=>'sometimes|string|in:price_a,price_d,latest,today,views',
            'name'=>'sometimes',
            'device_id'=>'sometimes'
        ];
    }
}
