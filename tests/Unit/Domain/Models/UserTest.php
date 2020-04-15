<?php

namespace Tests\Unit\Domain\Models;

use Tests\TestCase;
use Acme\Domain\Models\User;
use Acme\Domain\Models\Offer;
use Acme\Domain\Models\Contract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function user_has_many_offers()
    {
        // arrange
        $user = create(User::class);
        create(Offer::class, [
            'user_id' => $user->id,
        ], 3);

        // act
        $offers = $user->offers;

        // assert
        $this->assertInstanceOf(Collection::class, $offers);
        $this->assertInstanceOf(Offer::class, $offers->first());
    }

    /** @test */
    public function user_has_many_contracts_through_offers()
    {
        // arrange
        $user = create(User::class);
        $offer = create(Offer::class, [
            'user_id' => $user->id,
        ]);
        create(Contract::class, [
            'offer_id' => $offer->id,
        ], 2);

        // act
        $contracts = $user->contracts;

        // assert
        $this->assertInstanceOf(Collection::class, $contracts);
        $this->assertInstanceOf(Contract::class, $contracts->first());
    }
}
