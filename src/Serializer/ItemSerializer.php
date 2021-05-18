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
            'customerReference' => $data->getCustomerReference(),
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
        $item = new Item();
        $item->setQuantity($data['quantity']);
        $item->setType($data['type']);
        $item->setLength($data['dimensions']['length']);
        $item->setWidth($data['dimensions']['width']);
        $item->setHeight($data['dimensions']['height']);
        $item->setWeight($data['weight']);
        $item->setDescription($data['description']);

        if (isset($data['value'])) {
            $item->setValue($data['value']);
        }

        if (isset($data['tariffNumber'])) {
            $item->setTariffNumber($data['tariffNumber']);
        }

        if (isset($data['countryOfOrigin'])) {
            $item->setCountryOfOrigin($data['countryOfOrigin']);
        }

        if (isset($data['stackable'])) {
            $item->setStackable($data['stackable']);
        }

        return $item;
    }
}
