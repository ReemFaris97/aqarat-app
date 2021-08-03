<?php

namespace App\Http\Resources;

use App\Models\Utility;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class UtilityResource
 * @package App\Http\Resources
 * @mixin Utility
 */
class UtilityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'image'=>$this->image
        ];
    }
}
