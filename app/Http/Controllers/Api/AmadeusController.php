<?php

namespace App\Http\Controllers\Api;

use Amadeus\Amadeus;
use Amadeus\Exceptions\ResponseException;
use Amadeus\Resources\Destination;
use App\Http\Resources\AmadeusResource;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AmadeusController extends Controller
{
    protected Amadeus $amadeus;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->amadeus =  Amadeus::builder(env('AMADEUS_CLIENT_ID'),env('AMADEUS_CLIENT_SECRET'))->build();
    }

    /**
     * @throws ResponseException
     */
    public function getDirectDestinations(Request $request): AnonymousResourceCollection
    {
        $destinations = $this->amadeus->getAirport()->getDirectDestinations()->get(
            array(
                "departureAirportCode" => $request->{'departureAirportCode'},
                "max" => $request->{'max'}
            )
        );

        //return $destinations[0];
        //return AmadeusResource::collection($destinations);
        return AmadeusResource::collection($destinations);
    }

    /**
     * @throws ResponseException
     */
    public function getFlightOffers(Request $request): AnonymousResourceCollection
    {
        $flightOffers = $this->amadeus->getShopping()->getFlightOffers()->get(
            array(
                "originLocationCode" => $request->{'originLocationCode'},
                "destinationLocationCode" => $request->{'destinationLocationCode'},
                "departureDate" => $request->{'departureDate'},
                "returnDate" => $request->{'returnDate'},
                "adults" => "1"
            )
        );

        //return $flightOffers[0];
        return AmadeusResource::collection($flightOffers);
    }
}
