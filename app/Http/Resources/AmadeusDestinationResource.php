<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;

class AmadeusDestinationResource extends AmadeusResource
{
    // A customized resource only for a specific API
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
       return [
           'type' => $this->getType(),
           'subtype' => $this->getSubtype(),
           'name' => $this->getName(),
           'iataCode' => $this->getIataCode(),
       ];
    }
}
