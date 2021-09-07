<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChatResource extends JsonResource
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
            'name'=>$this->mode->name,
            'messages'=>new BaseCollection($this->messages()->with('user')->latest('created_at')->paginate(15),MessagesResource::class)
        ];
    }
}
