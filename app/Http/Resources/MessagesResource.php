<?php

namespace App\Http\Resources;

use App\Models\ChatMessage;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class MessagesResource
 * @package App\Http\Resources
 * @mixin ChatMessage
 */
class MessagesResource extends JsonResource
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
            'chat_id'=>$this->chat_id,
            'text'=>$this->message,
            'created_at'=>$this->created_at->toDateTimeString(),
            'user'=>new UserResource($this->user)
        ];
    }
}
