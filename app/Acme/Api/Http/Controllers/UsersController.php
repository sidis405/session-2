<?php

namespace Acme\Api\Http\Controllers;

use Acme\Domain\Models\User;
use App\Http\Controllers\Controller;
use Acme\Api\Http\Resources\UserResource;

class UsersController extends Controller
{
    public function index()
    {
        return UserResource::collection(User::with('offers')->get());
    }

    public function show(User $user)
    {
        return new UserResource($user->load('offers.contracts'));
    }
}
