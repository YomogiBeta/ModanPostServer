<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

final class PostsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'owner_id' => $this->user_id,
            'profile_image' => $this->user->profile_image,
            'owner_name' => $this->user->name,
            'title' => $this->title,
            'content' => $this->content,
            'created_at' => $this->created_at,
        ];
    }
}
