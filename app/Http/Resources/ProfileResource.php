<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' =>$this->id,
            //'user_id' =>$this->user_id,
            'user' => new UserResource($this->whenLoaded('user')),
            'name' =>$this->name,
            'last_name' =>$this->last_name,
            'name_user' =>$this->name_user,
            'dni' =>$this->dni,
            'role' =>new RoleResource($this->whenLoaded('role')),
        ];
    }
}
