<?php

declare(strict_types=1);

namespace Boekuwzending\Serializer;

use Boekuwzending\Resource\Service;
use LogicException;

/**
 * Class ServiceSerializer.
 */
class ServiceSerializer implements SerializerInterface
{
    /**
     * @param $data
     * @return array
     */
    public function serialize($data): array
    {
        throw new LogicException('Not yet implemented: ServiceSerializer::serialize');
    }

    /**
     * @param array $data
     * @param string $dataType
     * @return Service
     */
    public function deserialize(array $data, string $dataType): Service
    {
        $service = new Service();
        $service->setId($data['id']);
        $service->setKey($data['key']);
        $service->setName($data['name']);
        $service->setPickupPoint($data['pickupPoint']);
        $service->setDistributorIdentifier($data['distributorIdentifier']);

        return $service;
    }
}
