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

        $response = [
            'number' => $data->getNumber(),
            'numberAddition' => $data->getNumberAddition(),
            'addressLine2' => $data->getAddressLine2(),
            'postcode' => $data->getPostcode(),
            'city' => $data->getCity(),
            'country' => $data->getCountryCode(),
            'privateAddress' => $data->isPrivateAddress(),
            'forkliftOrLoadingDockAvailable' => $data->isForkliftOrLoadingDockAvailable(),
            'accessibleWithTrailer' => $data->isAccessibleWithTrailer(),
        ];

        if (!empty($data->getStreet())) {
            $response['street']  = $data->getStreet();
        }

        return $response;
    }

    /**
     * @inheritDoc
     */
    public function deserialize(array $data, string $dataType)
    {
        return new Address(
            $data['postcode'],
            $data['city'],
            $data['country'],
            $data['privateAddress'],
            $data['street'],
            $data['number'],
            $data['numberAddition'],
            $data['addressLine2'],
            $data['forkliftOrLoadingDockAvailable'],
            $data['accessibleWithTrailer']
        );
    }
}
