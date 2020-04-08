<?php

namespace Acme\Api\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContractResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'user_id' => $this->user_id,
        ];
    }
}
