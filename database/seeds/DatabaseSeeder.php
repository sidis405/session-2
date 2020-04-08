<?php

use Acme\Domain\Models\User;
use Acme\Domain\Models\Offer;
use Illuminate\Database\Seeder;
use Acme\Domain\Models\Contract;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $userCount = 9;

        $first = User::create([
            'name' => 'Sid',
            'email' => 'forge405@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);

        factory(User::class, $userCount)->create();

        foreach (User::all() as $user) {
            factory(Offer::class, 5)->create([
                'user_id' => $user->id,
            ])->each(function ($offer) {
                factory(Contract::class, 3)->create([
                    'offer_id' => $offer->id,
                ]);
            });
        }
    }
}
