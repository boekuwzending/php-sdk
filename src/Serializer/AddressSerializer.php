<?php

declare(strict_types=1);

namespace Boekuwzending\Serializer;

use Boekuwzending\Resource\Address;

/**
 * Class AddressSerializer.
 */
class AddressSerializer implements SerializerInterface
{
    /**
     * @inheritDoc
     */
    public function serialize($data): array
    {
        /** @var Address $data */

        return [
            'number' => $data->getNumber(),
            'street' => $data->getStreet(),
            'numberAddition' => $data->getNumberAddition(),
            'addressLine1' => $data->getAddressLine1(),
            'addressLine2' => $data->getAddressLine2(),
            'postcode' => $data->getPostcode(),
            'city' => $data->getCity(),
            'country' => $data->getCountryCode(),
            'privateAddress' => $data->isPrivateAddress(),
            'forkliftOrLoadingDockAvailable' => $data->isForkliftOrLoadingDockAvailable(),
            'accessibleWithTrailer' => $data->isAccessibleWithTrailer(),
        ];
    }

    /**
     * @inheritDoc
     */
    public function deserialize(array $data, string $dataType)
    {
        $address = new Address();
        $address->setPostcode($data['postcode']);
        $address->setCity($data['city']);
        $address->setCountryCode($data['country']);
        $address->setNumber($data['number']);
        $address->setStreet($data['street']);

        if (isset($data['numberAddition'])) {
           $address->setNumberAddition($data['numberAddition']);
        }

        if(isset($data['addressLine1'])) {
            $address->setAddressLine2($data['addressLine1']);
        }

        if(isset($data['addressLine2'])) {
            $address->setAddressLine2($data['addressLine2']);
        }

        if(isset($data['forkliftOrLoadingDockAvailable'])) {
            $address->setForkliftOrLoadingDockAvailable($data['forkliftOrLoadingDockAvailable']);
        }

        if(isset($data['accessibleWithTrailer'])) {
            $address->setAccessibleWithTrailer($data['accessibleWithTrailer']);
        }

        return $address;
    }
}
