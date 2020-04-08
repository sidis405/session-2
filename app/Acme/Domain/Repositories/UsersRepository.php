<?php

namespace Acme\Domain\Repositories;

use Acme\Domain\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UsersRepository
{
    public function getAll(...$relations): Collection
    {
        $relations = count($relations) ? $relations : 'offers';

        return User::with($relations)->get();
    }

    public function getOne(User $user, ...$relations): User
    {
        $relations = count($relations) ? $relations : 'offers';

        return $user->load($relations);
    }
}
