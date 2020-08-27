<?php

declare(strict_types=1);

namespace Boekuwzending\Serializer;

use Boekuwzending\Resource\Dimensions;
use Boekuwzending\Resource\PickupPoint;
use LogicException;

/**
 * Class PickupPointSerializer.
 */
class PickupPointSerializer implements SerializerInterface
{
    /**
     * @param PickupPoint $data
     * @return array
     */
    public function serialize($data): array
    {
        return [
            'identifier' => $data->getIdentifier(),
            'distributorCode' => $data->getDistributorCode(),
            'name' => $data->getName(),
            'country' => $data->getCountry(),
            'postcode' => $data->getPostcode(),
            'city' => $data->getCity(),
            'street' => $data->getStreet(),
            'number' => $data->getNumber()
        ];
    }

    /**
     * @param array $data
     * @param string $dataType
     * @return PickupPoint
     */
    public function deserialize(array $data, string $dataType): PickupPoint
    {
        $pickupPoint = new PickupPoint();
        $pickupPoint->setIdentifier($data['identifier']);
        $pickupPoint->setDistributorCode($data['distributorCode']);
        $pickupPoint->setName($data['name']);
        $pickupPoint->setCountry($data['country']);
        $pickupPoint->setPostcode($data['postcode']);
        $pickupPoint->setCity($data['city']);
        $pickupPoint->setStreet($data['street']);
        $pickupPoint->setNumber($data['number']);

        return $pickupPoint;
    }
}
