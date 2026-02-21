<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id ,
            'name' => ucwords(strtolower($this->name)),
            'type' => $this->type,
            'price' => number_format($this->price, 2, ',', ' ') . ' MAD',
            'status' => $this->is_available ? 'Disponible' : 'Occupé',
        ] ;
    }
}
