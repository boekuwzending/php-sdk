<?php

namespace Boekuwzending\Serializer;

use Boekuwzending\Resource\Dimensions;
use Boekuwzending\Resource\OrderLine;

/**
 * Class OrderLineSerializer
 */
class OrderLineSerializer implements SerializerInterface
{
    /**
     * @param OrderLine $data
     * @return array
     */
    public function serialize($data): array
    {
        $serializer = new Serializer();

        return [
            'externalId' => $data->getExternalId(),
            'quantity' => $data->getQuantity(),
            'dimensions' => $serializer->serialize($data->getDimensions()),
            'weight' => $data->getWeight(),
            'description' => $data->getDescription(),
            'value' => $data->getValue(),
            'tariffNumber' => $data->getTariffNumber(),
        ];
    }

    /**
     * @param array $data
     * @param string $dataType
     * @return OrderLine
     */
    public function deserialize(array $data, string $dataType): OrderLine
    {
        $serializer = new Serializer();

        $line = new OrderLine();
        $line->setExternalId($data['externalId']);
        $line->setQuantity($data['quantity']);
        $line->setWeight($data['weight']);
        $line->setDimensions($serializer->deserialize($data['dimensions'], Dimensions::class));
        $line->setDescription($data['description']);
        $line->setValue($data['value']);

        if(isset($data['tariffNumber'])) {
            $line->setTariffNumber($data['tariffNumber']);
        }

        return $line;
    }
}