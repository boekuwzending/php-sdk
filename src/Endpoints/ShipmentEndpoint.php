<?php

declare(strict_types=1);

namespace Boekuwzending\Endpoints;

use Boekuwzending\Client;
use Boekuwzending\Exception\AuthorizationFailedException;
use Boekuwzending\Exception\RequestFailedException;
use Boekuwzending\Resource\Shipment;
use Boekuwzending\Serializer\Serializer;

/**
 * Class ShipmentsEndpoint.
 */
class ShipmentEndpoint extends AbstractEndpoint
{
    /**
     * @param string $id
     *
     * @return Shipment
     * @throws AuthorizationFailedException
     * @throws RequestFailedException
     */
    public function get(string $id): Shipment
    {
        $response = $this->client->request('/shipments/' . $id, Client::METHOD_GET);

        return $this->serializer->deserialize($response, Shipment::class);
    }

    /**
     * @param Shipment $shipment
     *
     * @throws AuthorizationFailedException
     * @throws RequestFailedException
     */
    public function create(Shipment $shipment): void
    {
        $this->client->request(
            '/shipments',
            Client::METHOD_POST,
            $this->serializer->serialize($shipment)
        );
    }
}
