<?php

namespace Acme\Api\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContractResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'offer' => new OfferResource($this->whenLoaded('offer')),
        ];
    }
}
