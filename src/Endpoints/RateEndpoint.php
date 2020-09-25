<?php

namespace Boekuwzending\Endpoints;

use Boekuwzending\Client;
use Boekuwzending\Exception\AuthorizationFailedException;
use Boekuwzending\Exception\RequestFailedException;
use Boekuwzending\Resource\Rate;
use Boekuwzending\Resource\Shipment;

/**
 * Class RateEndpoint
 */
class RateEndpoint extends AbstractEndpoint
{
    /**
     * @param Shipment $shipment
     *
     * @return Rate[]
     * @throws AuthorizationFailedException
     * @throws RequestFailedException
     */
    public function request(Shipment $shipment): array
    {
        $data = $this->client->request(
            '/rate-request',
            Client::METHOD_POST,
            $this->serializer->serialize($shipment)
        );

        $rates = [];

        foreach($data as $rate) {
            $rates[] = $this->serializer->deserialize($rate, Rate::class);
        }

        return $rates;
    }
}