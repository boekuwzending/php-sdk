<?php

declare(strict_types=1);

namespace Boekuwzending\Serializer;

use Boekuwzending\Resource\Dimensions;
use Boekuwzending\Resource\PickupPoint;
use Boekuwzending\Resource\Rate;
use Boekuwzending\Resource\Service;
use Boekuwzending\Resource\RateService;
use LogicException;

/**
 * Class RateSerializer.
 */
class RateSerializer implements SerializerInterface
{
    /**
     * @param Rate $data
     * @return array
     */
    public function serialize($data): array
    {
        $serializer = new Serializer();

        return [
            'service' => $serializer->serialize($data->getService()),
            'price' => $data->getPrice(),
            'tax' => $data->getTax()
        ];
    }

    /**
     * @param array $data
     * @param string $dataType
     * @return Rate
     */
    public function deserialize(array $data, string $dataType): Rate
    {
        $serializer = new Serializer();

        $rate = new Rate();
        $rate->setService($serializer->deserialize($data['service'], RateService::class));
        $rate->setPrice($data['price']);
        $rate->setTax($data['tax']);

        return $rate;
    }
}
