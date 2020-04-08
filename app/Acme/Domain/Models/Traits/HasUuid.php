<?php

namespace Acme\Domain\Models\Traits;

use Illuminate\Support\Str;

trait HasUuid
{
    public static function bootHasUuid()
    {
        self::creating(function ($user) {
            $user->uuid = Str::uuid();
        });
    }

    protected function getArrayableItems(array $values)
    {
        if (! in_array('id', $this->hidden)) {
            $this->hidden[] = 'id';
        }

        return parent::getArrayableItems($values);
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
