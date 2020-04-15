<?php

namespace Acme\Domain\Models;

use Acme\Domain\Scopes\UserScope;
use Acme\Domain\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Offer extends Model
{
    use HasUuid;

    protected $guarded = [];

    // protected function boot()
    // {
    //     parent::boot();

    //     self::addGlobalScope(UserScope::class);
    // }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function contracts(): HasMany
    {
        return $this->hasMany(Contract::class);
    }
}
