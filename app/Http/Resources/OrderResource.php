<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'user_id' => new UserResource($this->whenLoaded('user_id')),
            'date' => $this->date,
            'payment_method_id' => $this->payment_method_id,
            'payment_method_id' => new PaymentMethodResource($this->whenLoaded('payment_method_id')),
            'total' => $this->total,
            'order_number' => $this->order_number,
        ];
    }
}
