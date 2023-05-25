<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RequisitionResource extends JsonResource
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
            'requisition_no' => $this->requisition_no,
            'title' => $this->requisition_title,
            'description' => $this->requisition_description,
            'project' => $this->project_id,
            'author' => $this->author_id,
            
        ];
    }
}
