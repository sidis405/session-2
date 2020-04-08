<?php

return [
    'local' => [
        'users' => Acme\Domain\Repositories\Eloquent\UsersRepository::class,
        'offers' => Acme\Domain\Repositories\Eloquent\OffersRepository::class,
    ],

    'production' => [
        'users' => Acme\Domain\Repositories\Mongo\UsersMongoRepository::class,
        'offers' => Acme\Domain\Repositories\Mongo\OffersMongoRepository::class,
    ],

    'fallback' => [
        'users' => Acme\Domain\Repositories\Eloquent\UsersRepository::class,
        'offers' => Acme\Domain\Repositories\Eloquent\OffersRepository::class,
    ],
];
