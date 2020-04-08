<?php

namespace Acme\Web\Http\Controllers;

use Acme\Domain\Models\Offer;
use App\Http\Controllers\Controller;
use Acme\Api\Http\Resources\OfferResource;

class OffersController extends Controller
{
    public function index()
    {
        return OfferResource::collection(Offer::with('user', 'contracts')->get());
    }

    public function show(Offer $offer)
    {
        return new OfferResource($offer->load('user', 'contracts'));
    }
}
