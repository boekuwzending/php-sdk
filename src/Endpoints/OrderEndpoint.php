<?php

declare(strict_types=1);

namespace Boekuwzending\Endpoints;

use Boekuwzending\Client;
use Boekuwzending\Exception\AuthorizationFailedException;
use Boekuwzending\Exception\RequestFailedException;
use Boekuwzending\Resource\Order;

/**
 * Class OrderEndpoint.
 */
class OrderEndpoint extends AbstractEndpoint
{
    /**
     * @param string $id
     *
     * @return Order
     * @throws AuthorizationFailedException
     * @throws RequestFailedException
     */
    public function get(string $id): Order
    {
        $response = $this->client->request('/orders/' . $id, Client::METHOD_GET);

        return $this->serializer->deserialize($response, Order::class);
    }

    /**
     * @param Order $order
     *
     * @return Order
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
}
