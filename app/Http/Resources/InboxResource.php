<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InboxResource extends JsonResource
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
            'model'=>[
                'id'=>$this->model->id,
                'model_type'=>class_basename($this->model->getMorphClass()),
                'name'=>$this->mode->name,
                'type'=>object_get($this->model,'type','')
            ],
            'lat_message'=>new MessagesResource($this->messages()->latest()->first())
        ];
    }
}
