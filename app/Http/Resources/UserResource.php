<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'phone' => $this->profile->phone,
            'gender' => $this->profile->gender,
            'category_id' => $this->profile->category_id,
            'bio' => $this->profile->bio,
            'job_title' => $this->profile->job_title,
        ];
    }
}
