<?php

namespace Acme\Domain\Repositories;

use Acme\Domain\Models\User;

class UsersRepository
{
    public function getAll(...$relations)
    {
        $relations = count($relations) ? $relations : 'offers';

        return User::with($relations)->get();
    }
}
