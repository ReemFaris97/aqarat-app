<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->description,
            'description' =>Str::limit(strip_tags( $this->description),200),
            'image' => $this->image ?? '',
            'created_at' => $this->created_at->format('Y/m/d'),
            'comments_count'=> count($this->comments),
            'comments' => CommentResource::collection($this->comments),
            'url'=>route('web.blog',['blog'=>$this->id,'locale'=>app()->getLocale()])
        ];
    }
}
