<?php

namespace Boekuwzending\Serializer;

use Boekuwzending\Resource\Order;
use Boekuwzending\Resource\OrderOverview;
use Exception;
use RuntimeException;

/**
 * Class OrderOverviewSerializer
 */
class OrderOverviewSerializer implements SerializerInterface
{
    /**
     * @param Order $data
     *
     * @return array
     */
    public function serialize($data): array
    {
        throw new RuntimeException('Cannot serialize an OverOverview');
    }

    /**
     * @param array $data
     * @param string $dataType
     * @return OrderOverview
     * @throws Exception
     */
    public function deserialize(array $data, string $dataType): OrderOverview
    {
        $order = new OrderOverview($data['id']);

        $order->setExternalId($data['externalId']);
        $order->setReference($data['reference']);
        $order->setArchived($data['archived']);

        return $order;
    }
}
