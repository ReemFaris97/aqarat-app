<?php

namespace App\Http\Resources;

use App\Models\Advertisement;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class AdvertisementResource
 * @package App\Http\Resources
 * @mixin Advertisement
 */
class AdvertisementResource extends JsonResource
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
            'image'=>$this->image,
            'images'=>ImageResource::collection($this->getMedia()),
            'location'=>[
                'lat'=>$this->lat,
                'lng'=>$this->lng
            ],
            'views_counter'=>0,
            'description'=>$this->description,
            'user'=>new UserResource($this->user),
            'Neighborhood'=>new NeighborhoodResource($this->neighborhood)
        ];
    }
}
