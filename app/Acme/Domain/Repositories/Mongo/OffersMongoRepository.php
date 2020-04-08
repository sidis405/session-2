<?php

namespace Acme\Domain\Repositories\Mongo;

use Acme\Domain\Models\Offer;
use Illuminate\Database\Eloquent\Collection;
use Acme\Domain\Repositories\Contracts\OffersRepositoryContract;

class OffersMongoRepository implements OffersRepositoryContract
{
    public function getAll(...$relations): Collection
    {
        dd('MONGO');
        $relations = count($relations) ? $relations : 'contracts';

        return Offer::with($relations)->get();
    }

    public function getOne(Offer $offer, ...$relations): Offer
    {
        $relations = count($relations) ? $relations : 'contracts';

        return $offer->load($relations);
    }
}
