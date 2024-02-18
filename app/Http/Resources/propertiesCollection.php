<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class propertiesCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "address" => $this->address,
            "price" => $this->price,
            "bedrooms" => $this->bedrooms,
            "bathrooms" => $this->bathrooms,
            "type" => $this->type,
            "status" => $this->status,
            "created_at" => Carbon::parse($this->created_at)->format("Y-m-d h:i:s"),
            "updated_at" => Carbon::parse($this->created_at)->format("Y-m-d h:i:s"),
        ];
    }
}
