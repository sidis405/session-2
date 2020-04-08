<?php

namespace Acme\Api\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OfferResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'user_id' => $this->user_id,
            'contracts' => ContractResource::collection($this->whenLoaded('contracts')),
        ];
    }
}
