<?php

namespace Acme\Domain\Repositories\Contracts;

use Acme\Domain\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UsersRepositoryContract
{
    public function getAll(...$relations) : Collection;

    public function getOne(User $user, ...$relations) : User;
}
