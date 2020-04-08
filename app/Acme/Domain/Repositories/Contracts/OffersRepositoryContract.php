<?php

namespace Acme\Domain\Repositories\Contracts;

use Acme\Domain\Models\Offer;
use Illuminate\Database\Eloquent\Collection;

interface OffersRepositoryContract
{
    public function getAll(...$relations) : Collection;

    public function getOne(Offer $user, ...$relations) : Offer;
}
