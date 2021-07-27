<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
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
            'title'=> $this->id,
            'type'=>$this->type,
            'extra'=>$this->data,
            'created_at'=> $this->created_at->format('Y-m-d'),
        ];
    }
}
