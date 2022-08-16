<?php

declare(strict_types=1);

namespace Boekuwzending\Endpoints;

use Boekuwzending\Client;
use Boekuwzending\Exception\AuthorizationFailedException;
use Boekuwzending\Exception\RequestFailedException;
use Boekuwzending\Resource\Order;
use Boekuwzending\Resource\OrderOverview;

/**
 * Class OrderEndpoint.
 */
class OrderEndpoint extends AbstractEndpoint
{
    /**
     * @throws AuthorizationFailedException
     * @throws RequestFailedException
     */
    public function get(string $id): Order
    {
        $response = $this->client->request('/orders/'.$id, Client::METHOD_GET);

        return $this->serializer->deserialize($response, Order::class);
    }

    /**
     * @throws AuthorizationFailedException
     * @throws RequestFailedException
     */
    public function create(Order $order): Order
    {
        $data = $this->client->request(
            '/orders',
            Client::METHOD_POST,
            $this->serializer->serialize($order)
        );

        return $this->serializer->deserialize($data, Order::class);
    }

    /**
     * @return array<OrderOverview>
     *
     * @throws AuthorizationFailedException
     * @throws RequestFailedException
     */
    public function findByExternalId(string $externalId, bool $includeArchived = true): array
    {
        $data = $this->client->request(
            '/orders',
            Client::METHOD_GET,
            [],
            [
                'externalId' => $externalId,
                'includeArchived' => $includeArchived
            ]
        );

        $orders = [];

        foreach ($data as $order) {
            $orders[] = $this->serializer->deserialize($order, OrderOverview::class);
        }

        return $orders;
    }

    /**
     * @throws AuthorizationFailedException
     * @throws RequestFailedException
     */
    public function update(Order $order): Order
    {
        $data = $this->client->request(
            '/orders/'.$order->getId(),
            Client::METHOD_PUT,
            $this->serializer->serialize($order)
        );

        return $this->serializer->deserialize($data, Order::class);
    }

    /**
     * @throws AuthorizationFailedException
     * @throws RequestFailedException
     */
    public function delete(Order $order): void
    {
        $this->client->request(
            '/orders/'.$order->getId(),
            Client::METHOD_DELETE
        );
    }
}
