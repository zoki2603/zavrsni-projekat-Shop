<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PurchaseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => (string) $this->id,
            'attributes' => [
                'id_product' => $this->id_product,
                'id_user' => $this->id_user,
                'id_order' => $this->id_order,
                'price' => $this->price,
                'quantity' => $this->quantity,
                'total_price' => $this->quantity * $this->price,
                'date' => $this->date,
                'status' => $this->status,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ],
            'relationships' => [
                'product' => [
                    'id' =>  $this->product->id,
                    'name' => $this->product->name,
                    'price' => $this->product->price,
                    'description' => $this->product->description,
                    'category' => [
                        'id' => (string) $this->product->category->id,
                        'name' => $this->product->category->name,
                    ],
                ],
                'user' => [
                    'id' => (string) $this->user->id,
                    'first_name' => $this->user->first_name,
                    'last_name' => $this->user->last_name,
                    'email' => $this->user->email,
                    'address' => $this->user->address,
                    'city' => $this->user->city,
                ],
                'order' => [
                    'id' => (string) $this->order->id,
                    'date' => $this->order->date,
                ],
            ],
        ];
    }
}
