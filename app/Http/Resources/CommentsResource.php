<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

final class CommentsResource extends JsonResource
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
            'owner_name' => $this->user->name,
            'profile_image' => $this->user->profile_image,
            'post_id' => $this->post_id,
            'content' => $this->content,
            'created_at' => $this->created_at,
        ];
    }
}
