<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'category'=>new CategoryResource($this->category),
            'neighborhood'=>new NeighborhoodResource($this->neighborhood),
            'user'=>new UserResource($this->user),
            'price'=>$this->price,
            'type'=>$this->type,
            'contract'=>$this->contract,
            'advertiser'=>$this->advertiser,
            'image'=>$this->image,
            'images'=>ImageResource::collection($this->getMedia()),
            'lat'=>$this->lat,
            'lng'=>$this->lng,
            'address'=>$this->address,
            'description'=>$this->description,
            'attributes'=>AttributeResource::collection($this->attributes),
            'utilities'=>UtilityResource::collection($this->utilities),
            'views'=>(int)$this->views()->count()

        ];
    }
}
