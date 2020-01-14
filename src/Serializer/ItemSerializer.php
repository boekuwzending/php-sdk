<?php

declare(strict_types=1);

namespace Boekuwzending\Serializer;

use Boekuwzending\Resource\Item;

/**
 * Class ItemSerializer.
 */
class ItemSerializer implements SerializerInterface
{
    /**
     * @inheritDoc
     */
    public function serialize($data): array
    {
        /** @var Item $data */

        $response = [
            'quantity' => $data->getQuantity(),
            'type' => $data->getType(),
            'dimensions' => [
                'length' => $data->getLength(),
                'height' => $data->getHeight(),
                'width' => $data->getWidth(),
            ],
            'weight' => $data->getWeight(),
            'description' => $data->getDescription(),
            'value' => $data->getValue(),
            'tariffNumber' => $data->getTariffNumber(),
            'countryOfOrigin' => $data->getCountryOfOrigin(),
        ];

        if (null !== $data->isStackable()) {
            $response['stackable'] = $data->isStackable();
        }

        return $response;
    }

    /**
     * @inheritDoc
     */
    public function deserialize(array $data, string $dataType)
    {
        throw new \LogicException('Not yet implemented: ItemSerializer::deserialize');
    }
}
