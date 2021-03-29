<?php

declare(strict_types=1);

namespace Boekuwzending\Endpoints;

use Boekuwzending\Client;
use Boekuwzending\Exception\AuthorizationFailedException;
use Boekuwzending\Exception\RequestFailedException;
use Boekuwzending\Resource\Matrix;
use Boekuwzending\Resource\Shipment;

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
     * @param bool $withPdfLabelData
     * @return Shipment
     * @throws AuthorizationFailedException
     * @throws RequestFailedException
     */
    public function create(Shipment $shipment, $withPdfLabelData = false): Shipment
    {
        $query = $withPdfLabelData ? ['withLabelPdfData' => 1] : [];

        $data = $this->client->request(
            '/shipments',
            Client::METHOD_POST,
            $this->serializer->serialize($shipment),
            $query
        );

        return $this->serializer->deserialize($data, Shipment::class);
    }

    /**
     * @param Shipment $shipment
     * @return Matrix|null
     * @throws AuthorizationFailedException
     * @throws RequestFailedException
     */
    public function getMatrix(Shipment $shipment): ?Matrix
    {
        $data = $this->client->request(
            '/shipments/matrix',
            Client::METHOD_POST,
            $this->serializer->serialize($shipment)
        );

        if (empty($data)) {
            return null;
        }

        return $this->serializer->deserialize($data, Matrix::class);
    }

    /**
     * @param string $id
     * @return string
     * @throws AuthorizationFailedException
     * @throws RequestFailedException
     */
    public function downloadLabels(string $id): string
    {
        $data = $this->client->request(
            sprintf('/shipments/%s/labels/download', $id),
            Client::METHOD_GET
        );

        return $data;
    }
}
