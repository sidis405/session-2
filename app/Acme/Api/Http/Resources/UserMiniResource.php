<?php

namespace Acme\Api\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserMiniResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'uuid' => $this->uuid,
            'name' => $this->name,
        ];
    }
}
