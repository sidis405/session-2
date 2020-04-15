<?php

namespace Acme\Domain\Models;

use Acme\Domain\Models\Traits\HasUuid;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class User extends Authenticatable
{
    use Notifiable;
    use HasUuid;

    protected $guarded = [];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function offers(): HasMany
    {
        return $this->hasMany(Offer::class);
    }

    public function contracts(): HasManyThrough
    {
        return $this->hasManyThrough(Contract::class, Offer::class);
    }

    public function getOtherUser()
    {
        return app()->make(User::class);
    }

    public function getName()
    {
        return $this->name;
    }
}
