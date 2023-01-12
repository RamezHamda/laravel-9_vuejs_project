<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'title' => $this->title,
            'desc' => $this->desc,
            'price' => $this->price,
            'duration' => $this->duration,
            'category' => $this->category->name,
            'type' => $this->type,
            'client' => $this->client->name,
            'status' => $this->status,
            'image_url' => $this->image_url,
            'track_project' => $this->track_project,
            'created' => $this->created_at->diffForHumans(),
        ];
    }
}
