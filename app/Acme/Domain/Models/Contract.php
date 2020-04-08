<?php

namespace Acme\Domain\Models;

use Acme\Domain\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contract extends Model
{
    use HasUuid;

    protected $guarded = [];

    public function offer(): BelongsTo
    {
        return $this->belongsTo(Offer::class);
    }

    public function user(): HasOneThrough
    {
        return $this->hasOneThrough(User::class, Offer::class);
    }
}
