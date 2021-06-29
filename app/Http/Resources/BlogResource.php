<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
            'description' => $this->description,
            'image' => $this->image ?? '',
            'created_at' => $this->created_at->format('Y-m-d'),

            'comments' => $this->comments()->get()->transform(function ($comment) {
                return [
                    'id' => $comment->id,
                    'user' => [
                        'id' => $comment->user_id ?? 0,
                        'name' => $comment->user->name ?? '',
                        'phone' => $comment->user->phone ?? '',
                        'email' => $comment->user->email ?? '',
                        'image' => $comment->user()->exists() ? $comment->user->image : '',
                    ],
                    'comment' => $comment->text,
                    'created' => $comment->created_at->format('Y-m-d'),
                ];
            }),
        ];
    }
}
