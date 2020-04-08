<?php

namespace Acme\Api\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OfferResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'uuid' => $this->uuid,
            'name' => $this->name,
            'contracts' => ContractResource::collection($this->whenLoaded('contracts')),
            'user' => new UserMiniResource($this->whenLoaded('user')),
        ];
    }
}
