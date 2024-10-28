<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);

        return[
            'id'=> $this->id,
            'user_id'=>$this->user->id,
            'user'=>$this->user->name,
            'user_email'=>$this->user->email,
            'title'=> $this->title,
            'description'=> $this->description,
            'created_at'=> $this->created_at->diffForHumans(),
        ];
    }
}
