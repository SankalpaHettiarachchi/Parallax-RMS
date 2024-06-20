<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RequestResource extends JsonResource
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
            'location' => $this->location,
            'service' => $this->service,
            'status' => $this->status,
            'priority' => $this->priority,
            'department' => $this->department,
            'requested_by' => $this->requested_by,
            'assigned_by' => $this->assigned_by,
            'created_on' => $this->created_on,
        ];
    }
}
