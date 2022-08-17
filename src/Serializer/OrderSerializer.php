<?php

namespace Boekuwzending\Serializer;

use Boekuwzending\Resource\Address;
use Boekuwzending\Resource\OrderContact;
use Boekuwzending\Resource\Order;
use Boekuwzending\Resource\OrderLine;
use DateTime;
use Exception;

/**
 * Class OrderSerializer
 */
class OrderSerializer implements SerializerInterface
{
    /**
     * @param Order $data
     * @return array
     */
    public function serialize($data): array
    {
        $serializer = new Serializer();

        $lines = [];
        foreach($data->getOrderLines() as $line) {
            $lines[] = $serializer->serialize($line);
        }

        return [
            'externalId' => $data->getExternalId(),
            'reference' => $data->getReference(),
            'createdAtSource' => $data->getCreatedAtSource()->format('Y-m-d H:i:s'),
            'orderLines' => $lines,
            'shipTo' => [
                'contact' => $serializer->serialize($data->getShipToContact()),
                'address' => $serializer->serialize($data->getShipToAddress()),
            ]
        ];
    }

    /**
     * @param array $data
     * @param string $dataType
     * @return Order
     * @throws Exception
     */
    public function deserialize(array $data, string $dataType): Order
    {
        $serializer = new Serializer();

        $lines = [];
        foreach($data['orderLines'] as $line) {
            $lines[] = $serializer->deserialize($line, OrderLine::class);
        }

        $order = new Order($data['id']);
        $order->setArchived($data['archived']);
        $order->setExternalId($data['externalId']);
        $order->setReference($data['reference']);
        $order->setCreatedAtSource(new DateTime($data['createdAtSource']));
        $order->setOrderLines($lines);
        $order->setShipToContact($serializer->deserialize($data['shipTo']['contact'], OrderContact::class));
        $order->setShipToAddress($serializer->deserialize($data['shipTo']['address'], Address::class));

        return $order;
    }
}